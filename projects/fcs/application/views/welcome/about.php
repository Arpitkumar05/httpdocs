<div class="structure-band">
  <div class="body-bit">
   <?php if($banner) :?>
      <section class="banner">
		<div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                	<div class="banner-slide">
                    	<div class="banner-img">
                          
                        	<img src=<?php echo correct_image(stripslashes($banner['image']), 'original'); ?> class="img-responsive" alt="Banner" />
                        </div>
                            
                            <?php if($banner['title']):  ?>
                        <div class="container">
                            <div class="banner-text">
                                <h1> <?php  echo $banner['title']  ;?></h1>
                            </div>
                        </div>
                            
                            <?php  endif ; ?>
                    </div>
                </div>
            </div>
         </div>
    </section>
      <?php  endif ; 
      
      
        if($about):?>
    <section class="productcivil">
    	<div class="container">
			 
            <div class="col-md-12 col-sm-12 col-xs-12 aboutinpage">
                <?php  $i = 1 ;                foreach ($about as $AB) :
                     if($i % 2 == 1) : ?>
                         <div class="col-md-12 col-sm-12 col-xs-12 about_a">
                  	<div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="aboutA-img">
                        	<img src=<?php echo correct_image(stripslashes($AB['image']), 'original'); ?> alt="about" class="img-responsive" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="about-atext">
                        <?php echo stripslashes($AB['content'])  ;   ?>
                        </div>
                    </div>
                  </div> 
                         
                        <?php  else:   ?>
                         
                                <div class="col-md-12 col-sm-12 col-xs-12 about_b">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<div class="about-atext aboutBB">
                            <div class="text-abo aboutBBoxtext">
                            	<img src=<?php echo correct_image(stripslashes($AB['image']), 'original'); ?> alt="about" class="img-responsive aboutright-img" />
                                  <?php echo stripslashes($AB['content'])  ;   ?>
                            </div>
                        </div>
                    </div>
                  </div>
                    <?php endif;
                    
                    
                    
              $i++ ;  endforeach;
                   ?>
                
                
                
                
                
               
            </div>       	
        </div>
    </section>
    <?php endif;   ?>
  </div>
</div>