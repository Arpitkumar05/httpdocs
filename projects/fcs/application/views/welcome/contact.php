
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
      <?php  endif ;   ?>
    <section class="inservice">
    	<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="centerinhead">
                	<h2>Contact Us</h2>
                    <p>Thank you for visiting the FCS Web Site! We appreciate the time spent learning more about us. For more information, 
or to arrange an initial consultation, please call our main office or fill out the form below and we will get back to you shortly.  </p>
                </div>
            </div> 
            <div class="col-md-12 col-sm-12 col-xs-12 servicetab">
            	  <div class="contact-up col-md-12 col-sm-12 col-xs-12">
                	  <div class="col-md-4 col-sm-4 col-xs-12">
                      		<div class="addressbar">
                            	<div class="conaddicon"><img src="{ASSET_FRONT_URL}image/contact.png" /></div>
                                <div class="conaddtext">
                            		<h4>Phone</h4>
                                	<p><a herf="">301-770-7000</a></p>
                            	</div>
                            </div>
                            <div class="addressbar">
                            	<div class="conaddicon"><img src="{ASSET_FRONT_URL}image/contact2.png" /></div>
                                <div class="conaddtext">
                            		<h4>Fax</h4>
                                	<p><a href="">301-770-7024</a></p>
                            	</div>
                            </div>
                            <div class="addressbar">
                            	<div class="conaddicon"><img src="{ASSET_FRONT_URL}image/contact3.png" /></div>
                                <div class="conaddtext">
                            		<h4>Email</h4>
                                	<p><a href="">info@fcs.com</a></p>
                            	</div>
                            </div>
                            <div class="addressbar">
                            	<div class="conaddicon"><img src="{ASSET_FRONT_URL}image/contact4.png" /></div>
                                <div class="conaddtext">
                            		<h4>Address</h4>
                                	<p>1803 Research Blvd.Suite 206<br>
Rockville, Maryland 20850</p>
                            	</div>
                            </div>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                      	  <div class="contact-form">
                          	  <h4>Write Your Message</h4> 
                          	  <div class="colum-form">
                                  <form id="contant" method="post" action="">
                                    <div class="row">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                           <input id="name" type="text" name="name" class="form-control required" placeholder="Full Name">
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                       
                                         <input id="email" type="email" name="email" class="form-control required email" placeholder="Email" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="phone" name="phone" minlength="7" maxlength="10" class="form-control required number"placeholder="Phone" >
                                        
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="org"  name="org"   type="text" class="form-control" placeholder="Organization" required>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea type="text" class="form-control" row="5" placeholder="Message"></textarea>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn-default btn-all" type="submit" value="">SEND</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>

                          </div>
                      </div>
                  </div>
                  <div class="contact-map col-md-12 col-sm-12 col-xs-12">
                  	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3096.3498171580713!2d-77.18195418747963!3d39.098505242675074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7cd5ae30e4e2d%3A0x27312a84c03b01af!2s1803+Research+Blvd+%23206%2C+Rockville%2C+MD+20850%2C+USA!5e0!3m2!1sen!2sin!4v1515154384312"  frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
            </div>       	
        </div>
    </section>
    
  </div>
</div>
