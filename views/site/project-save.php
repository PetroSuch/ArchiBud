<?php
use app\assets\ProjectSaveAsset;

ProjectSaveAsset::register($this);

?>
	
<?php $this->registerCsrfMetaTags() ?>

<script type="text/javascript">
	var id = null;
   	<?php
	   	if(isset($id) && $id != null){
	   		echo 'var id = '.$id;
	   	}
   	?>
</script>
<div class="container main-wrap mb-5">
	<div class="row">
		<form id="project_form" class="col-lg-12">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Назва проекту</label>
		    <input type="text" name="title_prj" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Назва проекту" required="true">
		  </div>

		  <div class="form-group">
		  	<label for="exampleInputPassword1">Ключові слова</label>
		    <input  type="text" name="keyword_prj" class="form-control" id="exampleInputPassword1" placeholder="Ключові слова" required="true">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Опис</label>
		    <textarea class="form-control" name="descr_prj" id="exampleFormControlTextarea1" rows="3" required="true">1</textarea>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Відео</label>
		    <textarea class="form-control" name="video_prj" id="exampleFormControlTextarea1" rows="3" required="true">1</textarea>
		  </div>

		 <div class="form-row mt-4">
		    <div class="col">
			   <label for="exampleInputPassword1">Тип проекту</label>
			   <input type="text" name="type_prj" class="form-control" placeholder="Тип проекту" required="true">
			</div>
			<div class="col">
			  <label for="exampleInputPassword1">Статус проекту</label>
			  <input type="text" name="status_prj" class="form-control" placeholder="Статус проекту" required="true">
			</div>
		</div>
		<div class="form-row mt-4">
			<div class="col">
			   <label for="exampleInputPassword1">Площа проекту</label>
			   <input type="text" name="square_prj" class="form-control" placeholder="Площа проекту" required="true">
			</div>
			<div class="col">
			  <label for="exampleInputPassword1">Локація проекту</label>
			  <input type="text" name="location_prj" class="form-control" placeholder="Локація проекту" required="true">
			</div>
		</div>

		  <div class="form-row mt-4">
		    <div class="col">
		       <label for="exampleInputPassword1">Рік проекту</label>
		       <input type="text" name="year_prj" class="form-control" placeholder="Рік проекту" required="true">
		    </div>
		    <div class="col">
		      <label for="exampleInputPassword1">Автори проекту</label>
		      <input type="text" name="author_prj" class="form-control" placeholder="Автори проекту" required="true">
		    </div>
		  </div>
		  	<div class="row">
			  	<div class="col-lg-12 mt-4">
			  		<label for="exampleInputPassword1">Плани поверхів</label>
			  	</div>
			  	<div id="plan" class="drop-files col-lg-12 d-flex d-wrap flex-row align-items-start">
			  	  <div class="wrap-preview-img">
			  	  	  <div class="preview-img"></div>
			  	  	  <div class="btn-settings">
			  	  	  	<!-- <i id="trash_img" class="btn-files fas fa-trash-alt"></i> -->
			  	  	  	<i id="add_img" class="btn-files fas fa-upload"></i>
			  	  	  </div>
					  <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="plan_1">
				  </div>
				   <div class="wrap-preview-img d-flex align-items-center justify-content-center" data-type="plan" id="add_file_input">
			  	  	   <i id="add-files" class="btn-files fas fa-plus"></i>
				  </div>
				</div>
				<div class="col-lg-12 mt-4">
			  		<label for="exampleInputPassword1">Рендери проекту</label>
			  	</div>
			  	<div id="render" class="drop-files col-lg-12 d-flex d-wrap flex-row align-items-start">
			  	  <div class="wrap-preview-img">
			  	  	  <div class="preview-img"></div>
			  	  	  <div class="btn-settings">
			  	  	  	<!-- <i id="trash_img" class="btn-files fas fa-trash-alt"></i> -->
			  	  	  	<i id="add_img" class="btn-files fas fa-upload"></i>
			  	  	  </div>
					  <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="render_1">
				  </div>
				   <div class="wrap-preview-img d-flex align-items-center justify-content-center" data-type="render" id="add_file_input">
			  	  	   <i id="add-files" class="btn-files fas fa-plus"></i>
				  </div>
				</div>
				
			</div>

		 
		  
		  <button id="save_prj" type="button" class="btn btn-primary mt-3">Зберегти</button>
		</form>
		 <!-- <form action="/" class="dropzone mt-5" id="dropzone"></form>
		 <div id="myId"></div> -->
	</div>
</div>