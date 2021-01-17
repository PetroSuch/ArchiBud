<?php

/* @var $this yii\web\View */

$this->title = 'Проекти';
?>
<!-- Projects -->
<div class="container main-wrap">
    <div class="row">
        <div data-aos="fade-down" data-aos-delay="0" class="col-lg-12">
            <div class="text-center">PROJECTS</div>
            <h2 class="text-center">Projects That We're Proud Of</h2>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div>
<div id="projects" class="filter pt-5">
    
        <div class="col-lg-12">
            <!-- Filter -->
            <div class="button-group filters-button-group">
                <a data-aos="fade-left" data-aos-delay="100" class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                <a data-aos="fade-left" data-aos-delay="200" class="button" data-filter=".design"><span>DESIGN</span></a>
                <a data-aos="fade-left" data-aos-delay="300" class="button" data-filter=".development"><span>DEVELOPMENT</span></a>
                <a data-aos="fade-left" data-aos-delay="400" class="button" data-filter=".marketing"><span>MARKETING</span></a>
                <a data-aos="fade-left" data-aos-delay="500" class="button" data-filter=".seo"><span>SEO</span></a>
            </div> <!-- end of button group -->
            <div>
                <div data-aos="zoom-in"  data-aos-delay="400" class="grid full-screen">
                   <?php foreach($projects as $key=>$value): ?>
                    <div  class="element-item development">
                        <a  href="project-view/<?=$value['id']?>"><div class="element-item-overlay"><span><?=$value['title_prj']?></span></div>

                            <img src="../../web/pics/projects/<?=$value['date']?>/<?=$value['id']?>/<?=isset($value['img'])?$value['img']:''?>" alt="alternative"></a>
                    </div>
                    <?php endforeach; ?>

                   <!--  <div class="element-item development">
                        <a class="popup-with-move-anim" href="#project-2"><div class="element-item-overlay"><span>Classic Industry</span></div><img src="../../images/prj_2.jpg" alt="alternative"></a>
                    </div>
                     <div class="element-item design development marketing">
                        <a class="popup-with-move-anim" href="#project-4"><div class="element-item-overlay"><span>Van Moose</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                     <div class="element-item development">
                        <a class="popup-with-move-anim" href="#project-1"><div class="element-item-overlay"><span>Online Banking</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design development marketing">
                        <a class="popup-with-move-anim" href="#project-3"><div class="element-item-overlay"><span>BoomBap Audio</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design development marketing">
                        <a class="popup-with-move-anim" href="#project-4"><div class="element-item-overlay"><span>Van Moose</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design development marketing seo">
                        <a class="popup-with-move-anim" href="#project-5"><div class="element-item-overlay"><span>Joy Moments</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design marketing seo">
                        <a class="popup-with-move-anim" href="#project-6"><div class="element-item-overlay"><span>Spark Events</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design marketing">
                        <a class="popup-with-move-anim" href="#project-7"><div class="element-item-overlay"><span>Casual Wear</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item development">
                        <a class="popup-with-move-anim" href="#project-2"><div class="element-item-overlay"><span>Classic Industry</span></div><img src="../../images/prj_2.jpg" alt="alternative"></a>
                    </div>
                    <div class="element-item design marketing">
                        <a class="popup-with-move-anim" href="#project-8"><div class="element-item-overlay"><span>Zazoo Apps</span></div><img src="../../images/prj_1.jpg" alt="alternative"></a>
                    </div> -->
                </div> <!-- end of grid -->
            </div> 
            <!-- end of filter -->
            
        </div> <!-- end of col -->
       
    </div> <!-- end of container -->


</div> <!-- end of filter -->
<!-- <div class="container" >
    <h2 class="text-center mt-5" data-aos="fade-down"  data-aos-delay="100">Консультація</h2>
    <div data-aos="fade-up"  data-aos-delay="400">
        <?php echo $this->render('@app/views/layouts/advice'); ?>
    </div>
</div> -->
<!-- end of projects -->
<!-- Project Lightboxes -->
<!-- Lightbox -->
<div id="project-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/prj_1.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Online Banking</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/prj_2.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Classic Industry</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-3.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>BoomBap Audio</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-4" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-4.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Van Moose</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-5" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-5.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Joy Moments</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-6" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-6.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Spark Events</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-7" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-7.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Casual Wear</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->

<!-- Lightbox -->
<div id="project-8" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-8">
            <img class="img-fluid" src="images/project-8.jpg" alt="alternative">
        </div> <!-- end of col -->
        <div class="col-lg-4">
            <h3>Zazoo Apps</h3>
            <hr class="line-heading">
            <h6>Strategy Development</h6>
            <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
            <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
            <div class="testimonial-container">
                <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                <p class="testimonial-author">General Manager</p>
            </div>
            <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a> 
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of lightbox-basic -->
<!-- end of lightbox -->
<!-- end of project lightboxes -->