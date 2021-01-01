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
            <div class="col-lg-12">
                <div class="container">
                    <h2 data-aos="fade-down" class="text-center">Консультація</h2>
                    <div data-aos="fade-up" data-aos-delay="300" class="mt-5">
                        <?php echo $this->render('@app/views/layouts/advice'); ?>
                    </div>
                </div>
            </div>
            
            <div class="container">
            <div class="form-2 transparent form-2__pt-5 row">
                <div id="contact" class="form-2">
                    <h2 data-aos="fade-down" class="text-center">Надіслати повідомлення</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6" data-aos="fade-right" >
                                <div class="text-container">
                                    <div class="section-title">CONTACT</div>
                                    <h2>Get In Touch Using The Form</h2>
                                    <p>You can stop by our office for a cup of coffee and just use the contact form below for any questions and inquiries</p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="address"><i class="fas fa-map-marker-alt"></i>22nd Innovative Street, San Francisco, CA 94043, US</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:003024630820">+81 720 22 126</a></li>
                                        <li><i class="fas fa-phone"></i><a href="tel:003024630820">+81 720 22 128</a></li>
                                        <li><i class="fas fa-envelope"></i><a href="mailto:office@aria.com">office@aria.com</a></li>
                                    </ul>
                                    <h3>Follow Aria On Social Media</h3>

                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="100">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="200">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-twitter fa-stack-1x"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="300">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-pinterest fa-stack-1x"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="400">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-instagram fa-stack-1x"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="500">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack" data-aos="fade-up" data-aos-delay="600">
                                        <a href="#your-link">
                                            <span class="hexagon"></span>
                                            <i class="fab fa-behance fa-stack-1x"></i>
                                        </a>
                                    </span>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                                
                                <!-- Contact Form -->
                                <form id="contactForm" data-toggle="validator" data-focus="false">
                                    <div class="form-group">
                                        <input type="text" class="form-control-input" id="cname" required>
                                        <label class="label-control" for="cname">Name</label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control-input" id="cemail" required>
                                        <label class="label-control" for="cemail">Email</label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control-textarea" id="cmessage" required></textarea>
                                        <label class="label-control" for="cmessage">Your message</label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group checkbox">
                                        <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree with Aria's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a> 
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div data-aos="zoom-in" data-aos-delay="600" class="form-group">
                                        <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                                    </div>
                                    <div class="form-message">
                                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </form>
                                <!-- end of contact form -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div>
            </div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->

