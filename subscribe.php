<?php include 'header.php';
if (isset($_POST['email'])) {
    recieveMailRimus($_POST['email']);
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
           
            <!-- /Breadcrumbs -->
        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- Main Content : Subscribed to RIMUS -->
<main class="main-container">
    <div class="container">
        <div class="row">
            <p align="center"> <img src="images/thankyou.png"></p>
        </div>
    </div>
</main>
<!-- /Main Content : Subscribed to RIMUS -->

<?php } 
include 'footer.php'; ?>