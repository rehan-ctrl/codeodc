<?php include("admin/includes/css.php")?>
 
<body class="hold-transition login-page">
  <div class="login-box">
     <div class="login-logo">
        <a href="index.php"><img src="<?= base_url('images/logo.png') ?>" height="100"></a>
      </div>
    <!-- /.login-logo -->
    <div class="login-box-body"> 
      <div class="login-logo">
       <h3 class="text-white">Super Admin Credentials</h3> 
      </div>
      <form action="<?= base_url('authentication') ?>" method="post">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-info">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>
        <div class="form-group has-feedback">
         <label class="text-white">Key :</label>
          <input type="text" class="form-control" name="key" placeholder="Please enter your key" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-xs-12 col-md-4 col-md-offset-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->  
      
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
 
</body>
</html>