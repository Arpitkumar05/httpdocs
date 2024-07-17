<header class="main-heade">
    <div class="topstrip">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 padding">
                <div class="col-md-6 col-sm-6 col-xs-6 padding-leftnone">
                    <div class="tsocial-link">
                        <nav>
                            <a href="<?= $general_data['facebook'] ?>" target="_blank"   class="fa"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="<?= $general_data['twitter'] ?>"  target="_blank"     class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="<?= $general_data['googlePlus'] ?>"    target="_blank"           class="go"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="<?= $general_data['pinterest'] ?>"   target="_blank"            class="pi"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 padding-rightnone">
                    <div class="head-seacrh col-md-12 col-sm-12 col-xs-12">
                        <span class="top_number tcontact"><a href=""><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;<?= $general_data['contact-no'] ?></a></span>
                        <form class="searchbox">
                            <input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
                            <input type="submit" class="searchbox-submit" value="GO">
                            <span class="searchbox-icon"><i class="fa fa-search"></i></span>
                        </form>
                      <!--<span class="openmobsearch"><i class="fa fa-search  change_icon" aria-hidden="true"></i></span>-->
                    </div>
                    <!--<div class="tcontact col-md-4 col-sm-5 col-xs-10"></div>-->
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href={BASE_URL} ><?= $general_data['Sitelogo'] ?></a> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse fix-nav" id="navbar-collapse-4">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if ($header_menu <> ""): foreach ($header_menu as $Hmenu):
                            if ($page_seo['id'] == $Hmenu['id']): $active = 'active';
                            else: $active = '';
                            endif;
                            if ($Hmenu['id'] == '9'): $helpDesk = 'helpbtn';
                            else: $helpDesk = '';
                            endif;
                            ?>
                            <li   class="<?= $active ?>   <?= $helpDesk ?>   "><a href="{BASE_URL}<?php echo stripslashes($Hmenu['slug']); ?>"><?php echo stripslashes($Hmenu['name']); ?></a></li>
                        <?php endforeach;
                    endif;
                    ?>
                </ul>

            </div>
            <div class="mobile-fade"></div>
            <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container --> 
    </nav>
</header>