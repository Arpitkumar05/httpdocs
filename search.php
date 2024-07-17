<?php include 'header.php';?>
<!-- Section: Page Header -->
<section class="section-page-header">
    <div class="container">
        <div class="row">
            <!-- Page Title -->
            <div class="col-md-8">
                <h1 class="title">Search Results</h1>
            </div>
            <!-- /Page Title -->
        </div>
    </div>
</section>
<div class="container" style="min-height:145px">
    <div class="row">
        <div class="col-md-8">
            <form action="search.php">
            <input type="text" name="q" id="tipue_search_input" autocomplete="off" placeholder="Search..." class="gray">
            </form>
            <div id="tipue_search_content"></div>
        </div>
    </div>
</div>
<!-- /Section: Page Header -->
<?php include 'footer.php'; ?>