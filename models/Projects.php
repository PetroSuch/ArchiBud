<?php
use yii\db\ActiveRecord;
namespace app\models;
use app\models\ImgRender;

class Projects extends \yii\db\ActiveRecord
{
   public static function tableName()
    {
        return 'projects';
    }

    public function getProjects(){
        $projects = Projects::find()->orderBy(['id' => SORT_DESC])->all();
        $img = ImgRender::find()->all();
        $img_arr = [];

        foreach ($img as $key => $value) {
           if(empty($img_arr[$value->idref]) && $value->type == 'render'){
            $img_arr[$value->idref] = $value->img;
           }
        }

        $res = [];
       
        foreach ($projects as $key => $value) {
            $json = [];
            if(isset($img_arr[$value->id])){
                $json['img'] = $img_arr[$value->id];
            }
            $project_info = [];
            foreach ($value as $k => $v) {
                $project_info[$k] = $v;
            }

            $res_merg = array_merge((array) $project_info,$json);
            array_push($res, $res_merg);
        }
        return $res;;
    }

    public function slug($title){
        $url = strtolower($title);
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);
        $url = str_replace('\'', '', $url);
        $match = '/[^a-z0-9]+/';
        $replace = '-';
        $url = preg_replace($match, $replace, $url);
        $url = trim($url, '-');
        $slug_find = Projects::find()->where(['slug'=>$url])->all();
        if(count($slug_find) != 0){
            for ($i=0; $i < 100000; $i++) { 
                $url = $url.'-'.rand(10,100000);
                if(count(Projects::find()->where(['slug'=>$url])->all()) == 0){
                    break;
                }
            }
        }
        return $url;
    }

}
