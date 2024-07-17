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
                <h1 class="title">Service Offerings</h1>
            </div>
            <!-- /Page Title -->
            <!-- Breadcrumbs -->
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li><i class="fa fa-fw fa-home"></i> <a href="index.php">Home</a></li>
                    <li>Service Offerings</li>
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
		</br></br></br>
		    <div class="col-md-3 contact-form fadeIn wow">
               
            </div>
            <div class="col-md-8 contact-form fadeIn wow">
               	Download
												<a href="images/Rimus Technologies Service Offerings V1.2.pdf" target="_blank" class="logo" > 
													RIMUS Service offerings
												</a> 
												|
												<a href="images/Rimus Technologies Project Portfolio V1.2.pdf" target="_blank" class="logo" > 
													RIMUS Technologies Project Portfolio
												</a> 
												|
												<a href="images/RIMUS Testing Service Offerings.pdf" target="_blank" class="logo" > 
													RIMUS Testing Service offerings
												</a> 
												</br></br></br>		
            </div>
     
         </div>
		 
        </div>
    </div>
</main>
<!-- /Main Content: RequestAQuote Form -->
<?php include 'footer.php';?>