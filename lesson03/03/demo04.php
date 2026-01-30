<?php

namespace lesson03\example3\demo04;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
trait FilterTrait
{
    protected function filter($content)
    {
        return strip_tags($content);
    }
}

trait UploadTrait
{
    protected function upload($file){
        $fileName = uniqid() . '.' . $file->getExtension();
        $file->saveAs(Yii::getAlias('@web/uploads') . DIRECTORY_SEPARATOR . $fileName);
        return $fileName;
    }
}

class Post extends ActiveRecord
{
    use UploadTrait, FilterTrait;

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            $this->filter_model = $this->filter($this->content);
            $this->image = $this->upload($this->image);
            return true;
        }
        return false;
    }
}

class Page extends ActiveRecord
{
    use filterTrait;

    public function beforeSave($insert){
        if(parent::beforeSave($insert)) {
            $this->filter_content = $this->filter($this->content);
            return true;
        }
        return false;
    }
}

class Article extends ActiveRecord
{
    use filterTrait, UploadTrait;
    public function beforeSave($insert){
        if(parent::beforeSave($insert)) {
            if(empty($this->created_at)) {
                $this->created_at = time();
            }
            $this->filter_content = $this->filter($this->content);
            if($this->image && $this->image instanceof UploadedFile){
                $this->image = $this->upload($this->image);
            }
            return true;
        }
        return false;
    }
}