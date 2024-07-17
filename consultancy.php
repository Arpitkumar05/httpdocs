<?php include 'header.php';?>	
<!-- Section: Page Header -->
<section class="section-page-header">
    <div class="container">
        <div class="row">
            <!-- Page Title -->
            <div class="col-md-8">
                <h1 class="title">Services</h1> 
            </div>
            <!-- /Page Title -->
            <!-- Breadcrumbs -->
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li><i class="fa fa-fw fa-home"></i> <a href="index.php">Home</a></li>
                    <li>Services</li>
                    <li>Consultancy</li>
                </ul>
            </div>
            <!-- /Breadcrumbs -->
        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- /Main Content: Consultancy Services -->
<main class="main-container">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <h3 class="title">Consultancy Services</h3>
               
                <div class ="services-list" style="margin:0 0 25px 15px;">
				 Get free of cost advice/assistance from industry experts on,</br>
                    <img src="images/bullet.gif"> Scrum & Agile - Get your doubts specific to Agile or Scrum methodologies, terminologies or any other implementation </br>&nbsp; &nbsp;&nbsp;&nbsp;challenges answered from industry experts</br></br>
                    <img src="images/bullet.gif">Cloud Migration - Let an expert help you making a decision specific to your application or data migration to cloud. We  </br>&nbsp; &nbsp;&nbsp;will be happy to assist you in a strategic decision beneficial to your business.</br></br>
                    <img src="images/bullet.gif">Data Security - Our experts will be glad to assist you on any technical or non-technical questions specific to data  </br>&nbsp; &nbsp;&nbsp;security, related best practices & advice to choose a right tool / technology.  </br></br>
                    <img src="images/bullet.gif">Cyber Security - Submit your server URL or mobile application (Android & iOS) for vulnerability assessment. We will do  </br>&nbsp; &nbsp;&nbsp;basis assessment covering reverse engineering, SQL injection, insecure data storage, insecure communication, insecure</br>&nbsp;&nbsp;&nbsp;&nbsp;authentication, insufficent cryptography attacks.</br></br>
                    <img src="images/bullet.gif">Blockchain Technology - If you have any doubt in exploring / implementing blockchain, we are the best to give you &nbsp;&nbsp;&nbsp;&nbsp;unbiased advice, and answer all your questions.
				
				</div>
            </div>
            <div class="col-md-4 project-information">
                <h3 class="title">Resources/ Quick Links</h3>
                <ul class="details">
                    <li><a class="logo" href="casestudies.php">Case Studies<a></li>
                    
                    <li><a class="logo" href="comingsoon.php">Related Articles</a></li>			
                </ul>
            </div>
        </div></br></br></br>
        <div class="row">
            <div class="col-md-8 col-md-offset-1 contact-form fadeIn wow">
                <?php
                    if (isset($_POST['submit'])) {
                        sendMailToOwner($_POST);
                    }
                ?>
                <h3 align="center"> Write us through below form. We will get back to you within next 48 hours.</h3>
                <form method="post"  action ="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="form" value="Contact">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <select required name="service" onchange="showfield(this.options[this.selectedIndex].value)" class="form-control">
                                <option value="">Select your service</option>
                                <option value="Scrum & Agile">Scrum & Agile</option>
                                <option value="Cloud Migration">Cloud Migration</option>
                                <option value="Data Security">Data Security</option>
                                <option value="Cyber Security">Cyber Security</option>
							    <option value="Blockchain Technology">Blockchain Technology</option>
                            </select></br></br>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="E-mail address... *" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="phone" class="form-control" placeholder="Phone... *" required>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control" placeholder="Requirement... "></textarea>
                        </div>
                    </div>
					 <div class="row">
                        <div class="form-group col-md-6">
                            <p id="mobileUrl"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <p align="center">Do you want to permit this advice to publish under RIMUS blog section? 
                            <input type="checkbox" name="ch1" value=""> Yes
                            <input type="checkbox" name="ch2" value="" checked> No</br>Feel free to write to contactus@rimus-tech.com should you have additional queries.</p> 
                        </div>
                    </div>
					 
                    <div class="row">
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-theme" name="submit"><i class="fa fa-fw fa-paper-plane-o"></i> Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- /Main Content: Consultancy Services -->
<?php include 'footer.php';?>

<script type="text/javascript">
function showfield(name){
    if ('Cyber Security' === name){
        $('.cyberSecurity').css('display', 'block');
        document.getElementById('mobileUrl').innerHTML='<input name="mobileUrl" class="form-control" type="textarea" placeholder="Enter server URL or link of mobile application.." required></input>';
    } else {
        $('.cyberSecurity').css('display', 'none');
        document.getElementById('mobileUrl').innerHTML='';
    }
}
</script>