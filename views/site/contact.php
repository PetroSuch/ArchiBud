<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакти';
?>

<div id="contact" class="main-wrap">
    <div class="container">
        <div class="row">
          
            
            <div class="container">
                <!--
 




тел.: +38 (067) 177 08 74

e-mail:  -->
             <?php echo $this->render('@app/views/layouts/contact'); ?>
            <div>
                 <div class="row">
                    <div class="col-lg-12" data-aos="fade-left" >
                         <iframe src="https://www.google.com/maps/d/embed?mid=1ieULIjKLQ2eAJ38VXpD1eOSMQdWT6_Si&amp;hl=uk" width="100%" height="100%" style="border:0; min-height: 400px; margin: 0px; position: relative; overflow: hidden;"></iframe>
                    </div>
                   <!--  <div class="col-lg-12 mb-5" data-aos="fade-right" data-aos-delay="300">
                        <h3 class="text-center mt-5 mb-3">Консультація</h3>
                         <?php echo $this->render('@app/views/layouts/advice'); ?>
                    </div> --> <!-- end of col -->
                </div>
            </div>
            </div>


           <!--  <div class="col-lg-12 mb-5">
                <div class="container">
                    <h2 data-aos="fade-down" class="text-center">Консультація</h2>
                    
                </div>
                <div data-aos="fade" data-aos-delay="300" class="mt-3 container">
                    <?php echo $this->render('@app/views/layouts/advice'); ?>
                </div>
            </div> -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->

