
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php foreach ($title as $row) { ?>
    <title><?php echo $row->nama_lokasi ?></title>
      <?php } ?>
    <!-- Css Files -->
    <link href="<?php echo base_url(); ?>assets/education-html/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/slick-slider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/prettyphoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/build/mediaelementplayer.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/color.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/color-two.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/color-three.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/color-four.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/education-html/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <body>
	
    <!--// Main Wrapper \\-->
    <div class="wm-main-wrapper">
        
        <!--// Header \\-->
		<header id="wm-header" class="navbar navbar-fixed-top wm-header-three">

                 <!--// TopStrip \\-->
           <!--  <div class="wm-topstrip " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="wm-right-section">
                                <ul class="wm-stripinfo">
                                    <li><i class="wmicon-location"></i> Jl Mayor Bismo no 27 Kota, Kediri</li>
                                    <li><i class="wmicon-technology4"></i> (0354) 683128</li>
                                    <li><a href="mailto:info@poltek-kediri.ac.id"><i class="wmicon-letter"></i>  <span style="color:#3498db;"> info@poltek-kediri.ac.id</span></li>

                                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--// TopStrip \\-->

            <!--// MainHeader \\-->
            <div class="wm-main-header wm-bgcolor-three ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><a href="<?=site_url('lowongan-terbaru');?>" class="wm-logo"><img src="<?php echo base_url(); ?>assets/education-html/images/logo-8.png" alt=""></a></div>
                        <div class="col-md-10">
                            <div class="wm-right-section">
                                <!--// Navigation \\-->
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header">
                                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                      </button>
                                    </div>
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                      <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?=site_url('lowongan-terbaru');?>">Home</a>
                                        <!-- <ul class="wm-dropdown-menu">
                                            <li><a href="index.html">Education Home V1</a></li>
                                            <li><a href="index-two.html">Education Home V2</a></li>
                                            <li><a href="index-three.html">Education Home V3</a></li>
                                            <li><a href="index-four.html">Education Home V4</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="<?=site_url('daftar-lowongan');?>">Daftar Lowongan</a>
                                       <!--  <ul class="wm-dropdown-menu">
                                            <li><a href="courses-grid.html">Courses Grid</a></li>
                                            <li><a href="courses-list.html">Daftar Lowongan</a></li>
                                            <li><a href="courses-detail.html">Courses Detail</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="<?=site_url('tentang-kami');?>">Tentang Kami</a>
                                        <!-- <ul class="wm-dropdown-menu">
                                            <li><a href="event-grid.html">Event Grid</a></li>
                                            <li><a href="event-detail.html">Event Detail</a></li>
                                        </ul> -->
                                    </li>
                                    
                                    <li class="wm-megamenu-li"><a href="<?=site_url('kontak');?>">Kontak Kami</a>
                                        
                                    </li>
                                  </ul>
                                    </div>
                                </nav>
                                <!--// Navigation \\-->
                                <!-- <span class="wm-header-number">(0354) 683128</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--// MainHeader \\-->

		</header>
		<!--// Header \\-->



	