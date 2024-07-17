<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu" ng-controller="customersCtrl">
     <li class="logoli"><a href="{BASE_URL}siteadmin/homes"><img src="<?=correct_image($this->session->userdata('FCS_ADMIN_LOGO'),'original'); ?>" alt="User Image"></a></li>
      
      
      
    
      <?php if($this->session->userdata('FCS_ADMIN_TYPE') == 'superadmin'): ?>
      
      <li> <a href="{BASE_URL}siteadmin/homes"><i class="fa fa-dashboard fa-fw"></i>&nbsp;&nbsp;Dashboard</a> </li>
       <li><a href="{BASE_URL}adminpages/managedata"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Pages<span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level">
   
         <li><a href="{BASE_URL}adminpages/managedata"><i class="fa fa-circle-o"></i>Pages</a></li>
         <li><a href="{BASE_URL}adminpagesheading/managedata"><i class="fa fa-circle-o"></i>Page Heading</a></li>
          
         
       </ul>
      </li>
        <li> <a href="{BASE_URL}adminslider/managedata"><i class="fa fa-sliders"></i>&nbsp;&nbsp;Slider</a> </li>
        <li> <a href="{BASE_URL}adminbanner/managedata"><i class="fa fa-camera"></i>&nbsp;&nbsp;Banner</a> </li>
        <li><a href="{BASE_URL}adminhomeabout/managedata"><i class="fa fa-header"></i>&nbsp;&nbsp;Home Page<span class="fa arrow"></span> </a>
     
            
        <ul class="nav nav-second-level">
   
         <li><a href="{BASE_URL}adminhomeabout/managedata"><i class="fa fa-circle-o"></i>About Section</a></li>
       </ul>
               <li><a href="{BASE_URL}adminabout/managedata"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;About </a> </li> 
                  <li><a href="{BASE_URL}adminproducts/managedata"><i class="fa fa-product-hunt"></i>&nbsp;&nbsp;Products </a> </li> 
               <li> <a href="{BASE_URL}adminservices/managedata"><i class="fa fa-scribd"></i>&nbsp;&nbsp;Services</a> </li>
                 <li> <a href="{BASE_URL}adminconsulting/managedata"><i class="fa fa-comments-o"></i>&nbsp;&nbsp;Consulting</a> </li>
         <li> <a href="{BASE_URL}adminpartners/managedata"><i class="fa fa-american-sign-language-interpreting"></i>&nbsp;&nbsp;Partners</a> </li>
            <li> <a href="{BASE_URL}adminclients/managedata"><i class="fa fa-users"></i>&nbsp;&nbsp;Clients</a> </li>
          <li> <a href="{BASE_URL}admintestimonial/managedata"><i class="fa fa-commenting"></i>&nbsp;&nbsp;Testimonial</a> </li>
        
     
         <li> <a href="{BASE_URL}adminfooter/managedata"><i class="fa fa-foursquare"></i>&nbsp;&nbsp;Footer</a> </li>
            <li> <a href="{BASE_URL}admingeneraldata/managedata"><i class="fa fa-cogs"></i>&nbsp;&nbsp;General Data</a> </li>
        
   <!--   <li><a href="{BASE_URL}sitesubadmin/managedata"><i class="fa fa-user-secret"></i>&nbsp;&nbsp; Subadmin</a></li>
        <li><a href="{BASE_URL}adminsales/managedata"><i class="fa fa-tags"></i>&nbsp;&nbsp; Sales</a></li>
       <li><a href="{BASE_URL}adminsalesman/managedata"><i class="fa fa-street-view"></i>&nbsp;&nbsp; Salesman</a></li>
        <li><a href="{BASE_URL}admincustomer/managedata"><i class="fa fa-user"></i>&nbsp;&nbsp; Customer</a></li>
          </a></li>
          <li><a href="{BASE_URL}adminproduct/managedata"><i class="fa fa-cube"></i>&nbsp;&nbsp;Product </a>
       
      </li>
       <li><a href="{BASE_URL}admincity/managedata"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;City</a></li>
         <li><a href="{BASE_URL}adminreport/sales"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Report<span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level">
       <li><a href="{BASE_URL}adminprocate/managedata"><i class="fa fa-circle-o"></i> Category</a></li> --
         <li><a href="{BASE_URL}adminreport/sales"><i class="fa fa-circle-o"></i>Sales</a></li>
         <li><a href="{BASE_URL}adminreport/salesman"><i class="fa fa-circle-o"></i>Salesman</a></li>
            <li><a href="{BASE_URL}adminreport/customer"><i class="fa fa-circle-o"></i>customer</a></li>
         
       </ul>
      </li>   -->
    <!--
      
      <li> <a href="javascript:void(0);"> <i aria-hidden="true" class="fa fa-user-secret"></i>&nbsp;&nbsp;View properties <span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level">
         <li><a href="{BASE_URL}adminagentprotype/managedata"><i class="fa fa-circle-o"></i> View types</a></li>
         <li><a href="{BASE_URL}adminagentprocate/managedata"><i class="fa fa-circle-o"></i> View categories</a></li>
         <li><a href="{BASE_URL}adminagentproperty/managedata"><i class="fa fa-circle-o"></i> View properties</a></li>
         <li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> View viewer request</a></li>
       </ul>
      </li>
      -->
      <?php else: ?>
       <!--
      <li> <a href="javascript:void(0);"> <i aria-hidden="true" class="fa fa-user-secret"></i>&nbsp;&nbsp;Manage properties <span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level">
         <li><a href="{BASE_URL}adminagentprotype/managedata"><i class="fa fa-circle-o"></i> Manage types</a></li>
         <li><a href="{BASE_URL}adminagentprocate/managedata"><i class="fa fa-circle-o"></i> Manage categories</a></li>  
         <li><a href="{BASE_URL}adminagentproperty/managedata"><i class="fa fa-circle-o"></i> Manage properties</a></li>
         <li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> Manage viewer request</a></li>
       </ul>
      </li>
      -->
        <li><a href="{BASE_URL}adminreport/sales"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Report<span class="fa arrow"></span> </a>
        <ul class="nav nav-second-level">
    <!--     <li><a href="{BASE_URL}adminprocate/managedata"><i class="fa fa-circle-o"></i> Category</a></li> -->
         <li><a href="{BASE_URL}adminreport/sales"><i class="fa fa-circle-o"></i>Sales</a></li>
         <li><a href="{BASE_URL}adminreport/salesman"><i class="fa fa-circle-o"></i>Salesman</a></li>
            <li><a href="{BASE_URL}adminreport/customer"><i class="fa fa-circle-o"></i>customer</a></li>
         
       </ul>
      </li>
      <?php endif; ?>
      
    </ul>
  </div>
</div>
