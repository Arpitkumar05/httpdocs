
<?php include 'header.php';
        if (isset($_POST['email'])) {
            requestContact($_POST);
        }
?>
<!-- Section: Page Header -->

<section class="section-page-header">
    <div class="container">
        <div class="row">

            <!-- Page Title -->
            <div class="col-md-8">
                <h1 class="title">Get a quote</h1>
             
            </div>
            <!-- /Page Title -->

            <!-- Breadcrumbs -->
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li><i class="fa fa-fw fa-home"></i> <a href="#">Home</a></li>
                    <li>Get a quote</li>
                </ul>
            </div>
            <!-- /Breadcrumbs -->

        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- Main -->
<main class="main-container">
    <div class="container">

        <div class="row">

         <!-- Section Content -->
            
                
                <!-- Contact Form -->
                <div class="col-md-8 col-md-offset-2 contact-form fadeIn wow">
				 <h3 align="center" class="title">Want RIMUS to build your next solution?</h3>
				 <h5 align="center"> Write us through below form. We will get back to you within next 24 hrs.</h5>
                    <form action="getaquote.php" method="post">

                        <input type="hidden" name="form" value="Contact">

                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Your Name... *" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="email" name="email" class="form-control" placeholder="E-mail address... *" required>
                            </div>
							<div class="form-group col-md-4">
                                <input type="phone" name="phone" class="form-control" placeholder="Phone... *" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea name="message" class="form-control" placeholder="Requirement... "></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn-theme"><i class="fa fa-fw fa-paper-plane-o"></i> Send Message</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /Contact Form -->


        </div>

    </div>


</main>
<!-- /Main -->
<?php include 'footer.php';?>

<!-- Scroll To Top -->
<div id="scroll-to-top" class="scroll-to-top">
    <i class="icon fa fa-angle-up"></i>
</div>
<!-- /Scroll To Top -->

<!-- Modal: Result Message -->
<div class="modal fade" id="result" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <h4 class="modal-title">Sending message</h4>
            </div>

            <div class="modal-body">

                <div class="result-icon">
                    <div class="icon-border">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" preserveAspectRatio="none">
                            <circle cx="8" cy="8" r="6.215" transform="rotate(90 8 8)"></circle>
                        </svg>
                        <i class="icon fa fa-check"></i>
                    </div>
                </div>

                <p class="modal-result h4 text-center"></p>
            </div>

        </div>
    </div>
</div>
<!-- /Modal: Result Message -->

<!-- SCRIPTS -->
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/general.js"></script>
<!-- /SCRIPTS -->


</body>

</html>
