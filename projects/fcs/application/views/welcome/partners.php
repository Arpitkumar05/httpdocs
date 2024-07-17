<div class="structure-band">
    <div class="body-bit">
        <?php if ($banner) : ?>
            <section class="banner">
                <div class="swiper-container banner-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="banner-slide">
                                <div class="banner-img">

                                    <img src=<?php echo correct_image(stripslashes($banner['image']), 'original'); ?> class="img-responsive" alt="Banner" />
                                </div>

                                <?php if ($banner['title']): ?>
                                    <div class="container">
                                        <div class="banner-text">
                                            <h1> <?php echo $banner['title']; ?></h1>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;

        if ($partner):
            ?>


            <section class="inservice">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="centerinhead">
                            <?php echo stripslashes($page_heading[0]['heading']); ?>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 servicetab">
                        <div class="col-md-12 col-sm-12 col-xs-12 part_nerbox">

                            <?php
                            $i = 1;
                            foreach ($partner as $P):

                                if ($i  % 2 == 1):
                                    ?>
                                    <div class="partnerhome col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="partner-img"><img src=<?php echo correct_image(stripslashes($P['image']), 'original'); ?> alt="logo"/></div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="partner-text">
                                                <h5><?php echo $P['name']  ; ?></h5>
                                                <?php echo stripslashes($P['content']) ; ?>
                                            </div>
                                        </div>
                                    </div>
        <?php else: ?>


                                    <div class="partnerhome col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="partner-text">
                                                <h5><?php echo $P['name']  ; ?> </h5>
                                              <?php echo stripslashes($P['content']) ; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="partner-img"><img src=<?php echo correct_image(stripslashes($P['image']), 'original'); ?> alt="logo"/></div>
                                        </div>
                                    </div>



        <?php endif;
        $i++;
    endforeach; ?>
                        </div>
                    </div>       	
                </div>
            </section>
<?php endif; ?>
    </div>
</div>
</div>
</div>