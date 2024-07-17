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
      
      if($service):
      ?>
      
     <section class="inservice">
    	<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="centerinhead">
                	 <?php echo stripslashes($page_heading[0]['heading']); ?>
                </div>
            </div> 
            <div class="col-md-12 col-sm-12 col-xs-12 servicetab">
            	  <div class="panel with-nav-tabs panel-default ">
                        <div class="panel-heading ">
                            <ul class="nav nav-tabs">
                                <?php  $i =1 ; foreach($service as $S):  if($i == 1): ?>
                                
                                <li class="active"><a href="#service<?php echo $i ; ?>" data-toggle="tab"><?php echo $S['NAME']  ; ?></a></li>
                                <?php else :  ?>
                                <li><a href="#service<?php echo $i ; ?>" data-toggle="tab"><?php echo $S['NAME']  ; ?></a></li>
                                <?php endif;  $i++  ; endforeach; ?>
                               
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                 <?php  $i =1 ; foreach($service as $S):  if($i == 1): ?>
                                <div class="tab-pane fade in active" id="service1">
                                    <?php  else: ?>
                                     <div class="tab-pane fade" id="service<?php echo $i ; ?>">
                                   
                                    <?php endif;  ?>
                                         <div class="services-content">
                                    	<h3><?php echo $S['NAME']  ; ?></h3>
                                        <?php echo $S['content']  ; ?>
                                    </div>
                                         </div>
                                         <?php  $i++;  endforeach;  ?>
                            
                        </div>
                  </div>
            </div>       	
        </div>
    </section>
    <?php endif;  ?>
  </div>
</div>