<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login Dashboard - Hals.Blue</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo site_url('resources/ionicons.min.css');?>">

<!-- Datetimepicker -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Hals</b>Blue</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Forgot Password??</b><br> Provide your Email to Hals Blue POS</p>
    <?php echo $this->session->flashdata('message'); ?>

    <form action="<?php echo base_url();?>admin/resendpass" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" autofocus="" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
