<div class="structure-band">
    <div class="body-bit">
        <section class="banner">
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    <?php if ($slider <> ""):


                        foreach ($slider as $S):
                            ?>


                            <div class="swiper-slide">
                                <div class="banner-slide">
                                    <div class="banner-img">
                                        <img src=<?php echo correct_image(stripslashes($S['image']), 'original'); ?> class="img-responsive" alt="Banner" />
                                    </div>
        <?php if ($S['title']) : ?>
                                        <div class="container">
                                            <div class="banner-text">
                                                <h1> <?= $S['title'] ?></h1>
                                            </div>
                                        </div>
        <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="swiper-button-prev banner-slider-prev"></div>
                <div class="swiper-button-next banner-slider-next"></div>
            </div>
        </section>
<?php if ($home_about): ?>
            <section class="about about_Homespace">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 about-box">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aboutpic">




                                <img src=<?php echo correct_image(stripslashes($home_about['image']), 'original'); ?> class="img-responsive" alt="about" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="abouttext">
    <?= $home_about['content'] ?>
                                <div class="view-more about-more"><a href="{BASE_URL}<?php echo stripslashes($header_menu[1]['slug']); ?>">Read more</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
        if ($home_service):
            ?>
            <section class="services gray_bg">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="center-head">

    <?php echo stripslashes($page_heading[0]['heading']); ?>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12 padding">
    <?php foreach ($home_service as $Hsrv) : ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="serbrif">
                                    <div class="sicon"><img src=<?php echo correct_image(stripslashes($Hsrv['image']), 'original'); ?> class="img-responsive" alt="service" /></div>
                                    <div class="stext">
                                        <h3><?= $Hsrv['name'] ?></h3>
                                        <p><?= $Hsrv['home_page_content'] ?></p>
                                    </div>
                                    <div class="gopage"><a href="{BASE_URL}<?php echo stripslashes($header_menu[3]['slug']); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                                </div>
                            </div>

    <?php endforeach; ?>



                    </div>
                </div>
            </section>
        <?php endif;

        if ($home_product):
            ?>
            <section class="services settop-padding">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="center-head">
    <?php echo stripslashes($page_heading[1]['heading']); ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding product_in">

    <?php foreach ($home_product as $Hpro) : ?>  
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="producyt_block">
                                    <a href="{BASE_URL}<?php echo stripslashes($header_menu[2]['slug']); ?>">
                                      
                                        <div class="prod-img"><img src=<?php echo correct_image(stripslashes($Hpro['image']), 'original'); ?> class="img-responsive" alt="product" /></div>
                                       <div class="proct_layer">
                                            <h3><?= $Hpro['name'] ?> </h3>
                                            <p><?= $Hpro['content'] ?></p> <span class="eye-icon"><img src="{ASSET_FRONT_URL}image/view.png" /></span>
                                        </div>
                                    </a>
                                </div>
                            </div>

    <?php endforeach; ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="view-more"><a href="{BASE_URL}<?php echo stripslashes($header_menu[2]['slug']); ?>">View More</a></div>
                    </div>
                </div>
            </section>
        <?php
        endif;
        if ($testimonial):
            ?>

            <section class="services testimonial_bg">
                <div class="test_blackbg">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="center-head">
    <?php echo stripslashes($page_heading[2]['heading']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 padding product_in">
                            <div class="swiper-container custmer-slide">
                                <div class="swiper-wrapper">
    <?php
    $i = 0;
    foreach ($testimonial as $TML) :
        if ($i % 2 == '0') :  ?>
                                    
                                            <div class="swiper-slide">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php endif; ?>
                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="custobox">
                                	<div class="col-md-3 col-sm-12 col-xs-12"><div class="custoimg"><img src=<?php echo correct_image(stripslashes($TML['image']), 'original'); ?> class="img-circle img-responsive" /></div></div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                    	<div class="custext">
                                    		<p><?= $TML['content'] ?></p>
                                            <h2><?= $TML['name'] ?><span>- <?= $TML['designation'] ?></span></h2>
                                    	</div>
                                    </div>
                                </div>
                            </div> 
                                                    
                                        <?php
                                        if ($i % 2 == '1') :?>    
                                                </div></div>
        <?php endif;
        $i++;
    endforeach;
     if ($i % 2 == '1') : ?>
      </div></div>        
  <?php    endif;
?>
   
                                    
                                </div>
                                <div class="swiper-button-next custmer-slide-button-next hoverbtn"></div>
                                <div class="swiper-button-prev custmer-slide-button-prev hoverbtn"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php endif; 
if($partner):

?>
        
        <section class="services settop-padding">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="center-head">
                       <?php echo stripslashes($page_heading[3]['heading']); ?>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 padding">
                    <div class="swiper-container clint_slide">   
                        <div class="swiper-wrapper">
                            
                            <?php  foreach ($partner as $PTR):?>                            
                            <div class="swiper-slide">
                                <div class="clien_logo">
                                    <a href="{BASE_URL}<?php echo stripslashes($header_menu[6]['slug']); ?>"><img style="max-width: 90px;" src="<?php echo correct_image(stripslashes($PTR['image']), 'original'); ?>" /></a>
                                </div>
                            </div>
                       <?php  endforeach; 

                       ?>
                          
                        </div>

                        <div class="swiper-pagination clint_slidepagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif;  ?>
    </div>
</div>