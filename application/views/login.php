<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo  $title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>AdminLTE/css/AdminLTE.min.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>iCheck/square/blue.css" />

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#">Admin
      </div>
      <div class="login-box-body">
        <?php
            if($this->input->get('gagal')){
                echo $this->input->get('error').'<div class="alert alert-danger">Username / password tidak tepat</div>';
            }
            if($this->input->get('akses')){
                echo '<div class="alert alert-danger">Status akun anda tidak aktip</div>';
            }
        ?>
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo  current_url() ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" required="" class="form-control" name="username" placeholder="Username" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input required="" type="password" class="form-control" name="password" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>

        <div style="display: none" class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo js_url ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo plugin_url ?>bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo plugin_url ?>iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>