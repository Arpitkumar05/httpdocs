
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
                    <li>Contact</li>
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
         <p align="center"> <img src="images/thankyou.png"></p>
        </div>
    </div>
</main>
<!-- /Main -->
<?php include 'footer.php';?>