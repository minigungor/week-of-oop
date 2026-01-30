<?php

namespace lesson03\example3\demo03;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
class FilterModel extends ActiveRecord
{
    protected function filter($content)
    {
        return strip_tags($content);
    }
}

class UploadModel extends ActiveRecord
{
    protected function upload(Uploaded $file)
    {
        $fileName = uniqid() . '.' . $file->getExtension();
        $file->saveAs(Yii::getAlias('@web/uploads/') . DIRECTORY_SEPARATOR . $fileName);
        return $fileName;
    }
}

class News extends FilterModel
{
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if(!$this->created_at) $this->created_at = time();
            $this->filter_content = $this->filter($this->content);
            return true;
        }
        return false;
    }
}

class Article extends UploadModel
{
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $this->filter_content = $this->filter($this->content);
            if($this->file && $this->file instanceof UploadedFile){
                $this->file = $this->upload($this->file);
            }
            return true;
        }
        return false;
    }
}
