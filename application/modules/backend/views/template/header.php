
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Web_Informasi</title>

  <!-- Bootstrap core CSS -->

  <link href=" <?php echo base_url('assets/production/css/bootstrap.min.css'); ?> " rel="stylesheet">

  <link href="<?php echo base_url('assets/production/fonts/css/font-awesome.min.css') ?> " rel="stylesheet">
  <link href="<?php echo base_url('assets/production/css/animate.min.css')?> " rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url('assets/production/css/custom.css') ?> " rel="stylesheet">
  <link href="<?php echo base_url('assets/production/css/icheck/flat/green.css') ?>" rel="stylesheet">
 
  <script src="<?php echo base_url('assets/production/js/jquery.min.js') ?>"></script>
<!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- editor -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url(); ?>assets/editor/external/google-code-prettify/prettify.css" rel="stylesheet"> -->
  <!-- <link href="<?php echo base_url(); ?>assets/editor/index.css" rel="stylesheet"> -->
<!-- Datatables -->

    <link href="<?php echo base_url(); ?>assets/production/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/production/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/production/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/production/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/production/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    

    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

   
<link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.loker').autocomplete({
              
                serviceUrl: site+'frontend/autocomplete/asd',
          
    });
  });
    </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
   <script>
  $( function() {
    var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
    $( "#tgl" ).datepicker({showOn: 'focus',changeMonth: true,
    changeYear: true,dateFormat: 'yy-mm-dd',
    minDate: new Date(currentYear, currentMonth, currentDate)
 });
  } );
  $( function() {
    var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
    $( "#tgl1" ).datepicker({showOn: 'focus',changeMonth: true,
    changeYear: true,dateFormat: 'yy-mm-dd',
    minDate: new Date(currentYear, currentMonth, currentDate)
 });
  } );

  </script>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="<?=site_url('backend/Welcome/index');?>" class="site_title"><i class="fa fa-paw"></i> <span>Web_Informasi</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?php echo base_url('assets/production/images/img.jpg') ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $this->session->userdata("nama"); ?></h2>
            </div>
          </div>
          <!-- /menu prile quick info      -->

          <br/>

          <!-- sidebar menu
           -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            
            <div class="menu_section"><br><br><br>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Dashboard </a>
                 
                </li>
                <li><a><i class="fa fa-desktop"></i> Posts<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                     <li><a href="<?=site_url('backend/post/index');?>">Post</a>
                    </li>
                    <li><a href="<?=site_url('backend/category/index');?>">Category</a> 
                    </li>
                     <li><a href="<?=site_url('backend/subcategory/index');?>">Subcategory</a> 
                    </li>

                    <!--member perusahaan kategori privat jadi hanya orang yang sudah login yang bisa melihat detailnya-->
                   
                   <!-- <li><a href="index2.html">Dashboard2</a>
                    </li>
                    <li><a href="index3.html">Dashboard3</a>
                    </li>-->
                  </ul>
                </li>
               <!--  <li><a href="<?=site_url('backend/data_kontak/tampil_data_kontak');?>"><i class="fa fa-inbox"></i> Kotak saran</a>
                </li> -->
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
          
          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                
               
                 
                
                
                  <li>

                  <a href="<?php echo base_url('backend/data_login/logout'); ?>"> <i class="fa fa-sign-out pull-right" title="Log Out"></i></a>
                  </li>
                
              </li>

            
                 
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      