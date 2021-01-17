<?php $this->registerCsrfMetaTags() ?>
<?php
use app\assets\ProjectSaveAsset;

ProjectSaveAsset::register($this);
?>
<div class="container-xl main-wrap">
    <div class="table-responsive">
        <div class="table-wrapper">
         <!--    <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Show</span>
                            <select class="form-control">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="filter-group">
                            <label>Location</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Berlin</option>
                                <option>London</option>
                                <option>Madrid</option>
                                <option>New York</option>
                                <option>Paris</option>								
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option>Any</option>
                                <option>Delivered</option>
                                <option>Shipped</option>
                                <option>Pending</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div> -->
            <a href="project-save">
                <button class="btn btn-primary mb-2">Добавити проект</button>
            </a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Проект</th>
                        <th>Локація</th>
                        <th>Рік</th>						
                        <th>Статус</th>						
                        <th>Площа</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($project as $key=>$value): ?>
	                    <tr>
	                        <td><?=$value->id?></td>
	                        <td>
	                        	<a href="project-view/<?=$value->id?>">
	                        		<img style="display: <?=empty($imgs[$value->id]) || $value->date  == ''?'none':'inline-block'?>;" width="50px" height="50px" src="../web/pics/projects/<?=$value->date?>/<?=$value->id?>/<?=isset($imgs[$value->id])?$imgs[$value->id]:''?>" class="avatar" alt="Avatar"> 
	                        		<img style="display: <?=empty($imgs[$value->id]) || $value->date  == ''?'inline-block':'none'?>;" width="50px" height="50px" src="../web/images/empty.jpg" class="avatar" alt="Avatar"> 
	                        		<?= $value->title_prj?>
	                        	</a>
	                        </td>
	                        <td><?= $value->location_prj?></td>
	                        <td><?= $value->year_prj?></td>                        
	                        <td><?= $value->status_prj?></td>
	                        <td><?= $value->square_prj?> м<sup>2</sup></td>
	                        <td>
	                        	<i id="delete_project" data-id="<?=$value->id?>" class="fas fa-trash mr-3"></i>
	                        	<a href="project-save/<?=$value->id?>">
		                        	<i id="edit_project" data-id="<?=$value->id?>" class="fas fa-edit"></i>
		                        </a>
	                        </td>
	                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> -->
        </div>
    </div>        
</div>     