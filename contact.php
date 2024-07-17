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
                <h1 class="title">Contact Us</h1>
            </div>
            <!-- /Page Title -->
            <!-- Breadcrumbs -->
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li><i class="fa fa-fw fa-home"></i> <a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <!-- /Breadcrumbs -->
        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- Main Content: RequestAQuote Form -->
<main class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 contact-form fadeIn wow">
                <h3 align="center" class="title">Want RIMUS to build your next solution?</h3>
                <h5 align="center"> Write us through below form. We will get back to you within next 24 hrs.</h5>
                <!-- RequestAQuote Form -->
                <form method="POST" action ="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="form" value="Contact">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Your Name... *" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="E-mail address... *" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" name="phone" maxlength="30" class="form-control" placeholder="Phone... *" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control"  placeholder="Requirement... "></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-theme" name="submit"><i class="fa fa-fw fa-paper-plane-o"></i> Send Message</button>
                        </div>
                    </div>
                </form>
                <!-- /RequestAQuote Form -->
            </div>
		 <div class="col-md-4 fadeIn wow" data-wow-duration="1.3s" data-wow-delay="0.7s">
                </br></br></br>
                <h3 class="title">Contact Information</h3>
              
                <ul class="contact-information">
                    <li><i class="icon fa fa-fw fa-globe"></i><span>India</span> Science & Technology Entrepreneur Park <text style="margin-left: 100px;">C - 20/1, Sector- 62</text></br><text style="margin-left: 100px;">Noida - 201309</text></br><i class="icon fa fa-fw fa-phone"></i><span>Phone</span> +91-9810178508</li>
                    <li><i class="icon fa fa-fw fa-globe"></i><span>USA</span>  <text style="margin-left: 100px;"> </text></br><i class="icon fa fa-fw fa-phone"></i><span>Phone</span> </li>
                    <li><i class="icon fa fa-fw fa-globe"></i><span>Singapore</span> 14 Robinson road, #8-01A, Far east<text style="margin-left: 100px;"> Finance building, Singapore 048545</text></br><i class="icon fa fa-fw fa-phone"></i><span>Phone</span>+65 63 0306 02</li>
					<li><i class="icon fa fa-fw fa-envelope"></i><span>E-mail</span> contactus@rimus-tech.com</li>
                    
                </ul>

            </div>
        </div>
    </div>
</main>
<!-- /Main Content: RequestAQuote Form -->
<?php include 'footer.php';?>