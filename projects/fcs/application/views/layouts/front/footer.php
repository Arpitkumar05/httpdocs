<footer class="bottom-footer">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 footerarea">
            <div class="col-md-3 col-sm-3 col-xs-12 foot_form">
                <div class="foot-form footlink">
                    <h2  id="success"  >  <div  class="get-img"><img src="{ASSET_FRONT_URL}image/get.png" /></div>Quick Contact</h2>
                    <div class="colum-form">
                        <form id="home_page_contact_form" method="post">
                    

                         
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 right">
                                        
                                            <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ">
                                                <input id="fname" type="text" name="fname" class="form-control required" placeholder="Name">

                                            </div>
                                        
                                    </div>
                                </div>
                          
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 right">
                                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset ">
                                            <input id="email" type="email" name="email" class="form-control required email" placeholder="Email" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 right">
                                         <textarea id="message"   type="text"  name="message" class="form-control required ui-input-text ui-shadow-inset ui-body-inherit ui-corner-all ui-textinput-autogrow" row="1" placeholder="Type here..." style="height: 49px;"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary squerbtn ui-btn ui-shadow ui-corner-all" name="SaveChanges" id="SaveChanges" value="Submit">Submit</button>
                                </div>
                            </div>
                  
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 hidden-xs foot_link">
            <div class="footlink">
                <h2>Company</h2>
                <div class="FFlink">
                    <ul>
                        <?php foreach ($footer_company as $FC): if ($FC['link_type'] == 'manual') : ?> 
                                <li><a href="<?= $FC['slug'] ?>" class="ui-link"><?= $FC['title'] ?></a></li>
                            <?php else: ?>
                                <li><a href="{BASE_URL}<?= $FC['slug'] ?>" class="ui-link"><?= $FC['title'] ?></a></li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 hidden-xs foot_link">
            <div class="footlink">
                <h2>Services</h2>
                <div class="FFlink">
                    <ul>
                        <?php foreach ($footer_services as $FS): if ($FS['link_type'] == 'manual') : ?> 
                                <li><a href="<?= $FS['slug'] ?>" class="ui-link"><?= $FS['title'] ?></a></li>
                            <?php else: ?>
                                <li><a href="{BASE_URL}<?= $FS['slug'] ?>" class="ui-link"><?= $FS['title'] ?></a></li>
    <?php endif;
endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="footlink footlinknobrder">
                <h2>Stay Connected</h2>
                <div class="FFlink">
                    <ul class="socialFA">
                        <li><a href="<?= $general_data['facebook'] ?>" target="_blank"class="ui-link"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                        <li><a href="<?= $general_data['twitter'] ?>" target="_blank" class="ui-link"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                        <li><a href="<?= $general_data['googlePlus'] ?>" target="_blank" class="ui-link"><span><i class="fa fa-google-plus" aria-hidden="true"></i></span></a></li>
                        <li><a href="<?= $general_data['pinterest'] ?>" target="_blank" class="ui-link"><span><i class="fa fa-pinterest" aria-hidden="true"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 footerarea">
        <div class="copyright col-md-12 col-sm-12 col-xs-12">
            <p>Copyright &copy;<?= date("Y") ?> By Fortabyte Cyber Solutions, LLC. All rights reserved. </p>
        </div>
    </div>
</div>
</footer>

<script> 
$(document).ready(function(){
  $('#home_page_contact_form').validate({ 

   submitHandler: function(form) {  
   
       
          $.ajax({
           
            type: 'post',
            url: FULLSITEURL+CURRENTCLASS+'/fcontact',
            data: $(form).serialize(),
           success: function(data){ 
         jQuery('#success').removeClass('footlinkt ');
         $("#success").fadeOut(function() {
  $(this).text("we will contact you soon").fadeIn();
});
              
              $('#fname').val("");
             
              $('#email').val("");
            
              $('#message').val("");
            }
          });
      }

  });
}); 
</script>
