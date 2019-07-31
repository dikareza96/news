<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url('assets/production/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/production/fonts/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/production/css/animate.min.css'); ?>" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url('assets/production/css/custom.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/production/css/icheck/flat/green.css'); ?>" rel="stylesheet">


  <script src="<?php echo base_url('assets/production/js/jquery.min.js'); ?>"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
        
          <form action="<?php echo base_url('backend/login/proses'); ?>" method="get">
            <h1>Login</h1>
             <?php
                  if (validation_errors() || $this->session->flashdata('result_login')) {
                      ?>
                      <div class="alert alert-error" style="background:red; color:white">
                          <strong>Peringatan!</strong>
                          <?php echo $this->session->flashdata('result_login'); ?>
                      </div>
                  <?php } ?>
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password"  name="password" required="" />
            </div>
            <div> 
               <input class="btn btn-default submit" type="submit" name="submit" value="Login">
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">

             <!-- <p class="change_link">New to site?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p> -->
              <div class="clearfix"></div>
              <br />
              <div>
                
               
<i class="fa fa-home" style="font-size: 26px;"></i><a style="font-size: 22px;" href="<?=site_url('');?>">FRONT END</a>
                <p></p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
     
    </div>
  </div>

</body>

</html>
