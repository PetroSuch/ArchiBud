<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $name;
    public $tempName;
    public $type;
    public $size;
    public $image;
    public $image_type;

    public function load_img($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }
    public function save_img($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
    public function output_img($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }
    public function getWidth() {
        return imagesx($this->image);
    }
    public function getHeight() {
        return imagesy($this->image);
    }
    public function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize_img($width,$height);
    }
    public function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize_img($width,$height);
    }
    public function resize_img($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);

        $new_image = imagecreatetruecolor($width, $height);//create the background 130x130
        $whiteBackground = imagecolorallocate($new_image, 255, 255, 255); 
        imagefill($new_image,0,0,$whiteBackground); // fill the background with white
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

    public function upload($path)
    {
        //$uploaddir = Yii::getAlias('@web/pics');
        $upload_img = new UploadedFile();
        $upload_img->name = $this->name;
        $upload_img->tempName = $this->tempName;
        $upload_img->size = $this->size;
        $upload_img->type = $this->type;
        return move_uploaded_file($this->tempName,$path);
    }

    public function createFolder($path){
        if (!is_dir($path)){
            return  mkdir($path,0775, true);
        }else{return false;}
    }

    public function loadFile($file){
        $this->name = $file['name'];
        $this->tempName = $file['tmp_name'];
        $this->size = $file['size'];
        $this->type = $file['type'];
    }

    public function unlink_file($path){
        if(is_file($path)){
            return unlink($path);
        }
    }

    public  function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            return true;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        return rmdir($dirPath);
    }
}