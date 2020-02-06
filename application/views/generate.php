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
      <?php if(empty($this->session->userdata('generate_session'))){ ?>
      <form action="<?= base_url('basic/create_generate_session') ?>" method="post">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-info">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>
        <div class="form-group has-feedback">
         <label class="text-white">Password :</label>
          <input type="password" class="form-control" name="password" placeholder="*********" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-xs-12 col-md-4 col-md-offset-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <?php }else{ ?> 
      <form action="<?= base_url('basic/set_key') ?>" method="post">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-info">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>
        <div class="form-group has-feedback">
         <label class="text-white">Generated Key (if u want you can create your own):</label>
          <input type="text" class="form-control" name="key" value="<?= $this->session->flashdata('generate_key') ?>" required>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-xs-12 col-md-4 col-md-offset-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <?php } ?>
    </div>
  </div> 
</body>
</html>