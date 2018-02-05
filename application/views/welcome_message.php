<!DOCTYPE html>

<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets');?>/build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets');?>/img/logo.png">
    <title>Aplikasi Simbangda Kab. Tanah Datar</title>
  </head>

<body class="login" style = "background:  url(<?php echo base_url('assets');?>/build/images/download.jpg) no-repeat center center fixed;background-size: cover; "
    <div>
      <div class="row">
      
            <div class="login_wrapper">
              <div class="animate form login_form">
                <section class="login_content">

                 <form id="login" action="<?php echo base_url()?>login/login_form" method="post" accept-charset="utf-8" >

                  <?php echo validation_errors(); ?>

                      <h1>Login Form</h1>

                  <label>Email</label>

                      <input type="text" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="Input Email">

                  <?php echo form_error('email');?>

                  <label>Password</label>

                      <input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>" placeholder="Input Password">

                  <?php echo form_error('password');?>

                      <input class="col-md-4 col-offset-6 btn submit" type="submit" value="Login"><br>
                  <div class="clearfix"></div>
                  <div class="separator">
                      <div class="clearfix"></div>
                      <br />

                      <div>
                        <h1><i class=""></i> Aplikasi SimBangda 3.0</h1>
                        <p>©2018 Pemerintah Kabupaten Tanah Datar</p>
                      </div>
                    </div>

                  </form>
                  </div>
                  </section>
              </div>
            </div>
          </div>
       
    </div>
  </body>

</html>