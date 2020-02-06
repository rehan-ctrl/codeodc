<?php include("includes/css.php")?>
 
<body class="hold-transition login-page">
  <div class="login-box">
     <div class="login-logo">
      <?php $photo='';if(empty($admin->site_logo)){$photo='http://cassixcom.com/images/cassiXcom-logo.png';}else{$photo=base_url('documents/').$admin->site_logo;} ?>
        <a href=""><img src="<?= base_url('application/views/admin/images/cassixcrm-logo.png') ?>" height="40"></a>
      </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: #07307c"> 
      <div class="login-logo">
       <h3 class="text-white">User Credentials</h3> 
      </div>
      <form action="<?= base_url('admin/login') ?>" method="post">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-danger">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>
        <div class="form-group has-feedback">
         <label class="text-white">Email :</label>
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
           <label class="text-white">Password :</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
        <div class="text-center">
              <h4>&copy; <?= date('Y') ?> Designed and developed by <a href="https://cassixcom.com" target="_blank">Cassixcom</a></h4>
            </div>
      </div>
  <!-- /.login-box -->
 
</body>
</html>