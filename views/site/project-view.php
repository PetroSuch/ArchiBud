<?php
$this->title = $project->title_prj;
?>
	
<div class="project-wrap-bg">
	<div class="main-bg parallax-slider" style="background-image: url('../web/pics/projects/<?=$project->date.'/'.$project->id.'/'.$img[1]->img?>');"></div>
	<div class="mask-bg d-flex align-items-center">
		<h1 class="container"><?=$project->title_prj?></h1>
	</div>
</div>

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
			<div class="project-view-details">
				<p class="name-detail">Тип</p>
				<p class="val-detail"><?=$project->type_prj?></p>
			</div>
			<div class="project-view-details">
				<p class="name-detail">Рік</p>
				<p class="val-detail"><?=$project->year_prj?></p>
			</div>
			<div class="project-view-details">
				<p class="name-detail">Площа</p>
				<p class="val-detail"><?=$project->square_prj?> м<sup>2</sup></p>
			</div>

		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
			<div class="project-view-details">
				<p class="name-detail">Локація</p>
				<p class="val-detail"><?=$project->location_prj?></p>
			</div>
			<div class="project-view-details">
				<p class="name-detail">Статус</p>
				<p class="val-detail"><?=$project->status_prj?></p>
			</div>
			<div class="project-view-details">
				<p class="name-detail">Команда</p>
				<p class="val-detail"><?=$project->author_prj?></p>
			</div>
			
		</div>
		<div class="col-lg-12">
			<p><?=$project->descr_prj?></p>
			
		</div>
		<?php
			if($project->video_prj != null){
				echo '<div class="col-lg-12 d-flex justify-content-center video-responsive">
						'.$project->video_prj.'
					  </div>';
			}
		?>
		
	</div>
</div>
<div class="d-flex flex-column align-items-center plan-floors">
	<h3 class="text-center mb-3 ">Плани поверхів проекту</h3>
	<?php
		foreach ($img as $key => $value) {
			if($value->type == 'plan'){
				echo '<image src="../web/pics/projects/'.$project->date.'/'.$project->id.'/'.$value->img.'"></image>';
			}
		}
	?>
</div>
<div class="d-flex flex-column align-items-center plan-floors pb-3">
	<h3 class="text-center mt-3">Рендери проекту</h3>
	<?php
		foreach ($img as $key => $value) {
			if($value->type == 'render'){
				echo '<image class="mt-3" src="../web/pics/projects/'.$project->date.'/'.$project->id.'/'.$value->img.'"></image>';
			}
		}
	?>
</div>
<!-- <div class="project-carousel container mb-5 mt-5">
	<h3 class="text-center mb-3">Рендери проекту</h3>
	<div  id="slider">
		<?php
			foreach ($img as $key => $value) {
				echo '<div class="d-flex justify-content-center"><img style="width:auto;height:100%;" src="../web/pics/projects/'.$project->date.'/'.$project->id.'/'.$value->img.'"></img></div>';
			}

		?>
	</div>
	<span class="slick-prev">
		<i class="fas fa-chevron-right"></i>
	</span>
	<span class="slick-next">
		<i class="fas fa-chevron-left"></i>
	</span>
</div> -->