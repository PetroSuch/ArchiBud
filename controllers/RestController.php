<?php
namespace app\controllers;
use Yii;
use yii\rest\ActiveController;
use app\models\User;
use app\models\UploadForm;
use app\models\Projects;
use app\models\ImgRender;
use yii\web\UploadedFile;


class RestController extends ActiveController
{

	public function behaviors()
	{
	    $behaviors = parent::behaviors();

	    // remove authentication filter
	    $auth = $behaviors['authenticator'];
	    unset($behaviors['authenticator']);

	    // add CORS filter
	    $behaviors['corsFilter'] = [
	        'class' => \yii\filters\Cors::className(),
	    ];

	    // re-add authentication filter
	    $behaviors['authenticator'] = $auth;
	    // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
	    $behaviors['authenticator']['except'] = ['options'];

	    return $behaviors;
	}	
    public $modelClass = 'app\models\User';

	public function actions(){
	    $actions = parent::actions();
	    unset($actions['index'],$actions['delete'],$actions['create'],$actions['update']);
	    return $actions;
	}

	public function actionSendEmail(){
		$data = Yii::$app->getRequest()->getBodyParams();
		return Yii::$app->mailer->compose()
						->setFrom($data['email'])
						->setTo('p.such@nltu.lviv.ua')
						->setSubject('Питання з сайту '.$data['name'])
						->setTextBody($data['message'])
						->send();
		return 'send-email';
	}

	public function actionGetProject($id)
	{
		$res = [];
		$res['project'] = Projects::findOne($id);
		$res['img'] = ImgRender::find()->where(['idref'=>$id])->all();
		$img_render = array_filter($res['img'],function($k){
			return $k['type'] == 'render';
		});
		$img_plan = array_filter($res['img'],function($k){
			return $k['type'] == 'plan';
		});
		 usort($img_plan, function( $a, $b ) {
		    return strtotime($a["date"]) - strtotime($b["date"]);
		});
		//return $img_plan;
		$res['img_render'] = $img_render;
		$res['img_plan'] = $img_plan;
		return $res;
	}

	public function actionDeleteProject(){
		if (Yii::$app->user->isGuest) {
			return true;
		}
		$img_model = new UploadForm();
		$data = Yii::$app->getRequest()->getBodyParams();
		$res = [];
		if(isset($data['id'])){
			$prj = Projects::findOne($data['id']);
			if(isset($prj)){
				$res['del_file'] = $img_model->deleteDir('pics/projects/'.$prj->date.'/'.$prj->id);
				$res['del_prj'] = $prj->delete();
			}
		}
		return $res;
	}
	public function actionSave(){
		if (Yii::$app->user->isGuest) {
			return true;
		}
		//return $_POST['json'];
		//return Yii::$app->getRequest()->getBodyParams();
		$data = Yii::$app->getRequest()->getBodyParams();
		if(isset($data['id'])){
			$model = Projects::findOne($data['id']);
		}else{
			$model = new Projects();
		}
		//return $_FILES;

		if(isset($data['del_files'])){
			$del_files = json_decode($data['del_files']);
			if(count($del_files) > 0){
				foreach ($del_files as $key => $value) {
					$upload_model = new UploadForm();
					$date = $model->date;
					$id = $model->id;
					$id_file = $value->id;
					$file = $value->file;
					$modelImg = ImgRender::findOne($id_file);
					if(isset($modelImg)){
						$modelImg->delete();
					}
					$upload_model->unlink_file("pics/projects/$date/$id/$file");

				}
			}
			//return $del_files;
		}

		//return true;

		if(isset($data['json'])){
			$json = json_decode($data['json']);
			$model->load($json);
			$date = date('Y-m');

			foreach ($json as $key => $value) {
				if($model->hasAttribute($value->name)){
					$model[$value->name] = $value->value;
				}
			}
			$model->date = $date;
			//$model->slug = $model->slug($model->title_prj);
			//return [$text,$model->title_prj,$model->slug];
			//return $json;
			//return $model->attribuvates;
			//return $_FILES;

			if($model->validate()){
				$model->save();
				$idref = $model->getPrimaryKey();
				//return count($_FILES);
				if(isset($_FILES) && count($_FILES)>0){
					foreach ($_FILES as $key => $value) {						
						$type = explode('_', $key)[0];
						$filename = time().'_'.rand().'_'.$type;

						$model_upload = new UploadForm();
			    		$model_upload->loadFile($_FILES[$key]);
			    		$model_upload->createFolder("pics/projects/$date/");
						$model_upload->createFolder("pics/projects/$date/$idref");
						$resultUpload = $model_upload->upload("pics/projects/$date/$idref/$filename.jpg");
						if($resultUpload){
							$img_model = new ImgRender();
							$img_model->idref = $idref;
							$img_model->type = $type;
							$img_model->date = date('Y-m-d H:m:s');
							$img_model->img = "$filename.jpg";
							$img_model->save();
						}
					}
					
				}
				///return $idref;
			}
			return ['valid'=>$model->validate(),'id'=>$model->id];
		}
		/*return $model->attributes;
		return Yii::$app->request->post();*/
	}

	
}