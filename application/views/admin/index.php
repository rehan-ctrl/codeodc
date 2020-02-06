<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Cassixcom">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Cassix CRM</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('application/views/admin/') ?>css/my-login.css">
</head>

<body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="<?= base_url('application/views/admin/images/cassixcrm-logo.png') ?>" height="40" alt="logo">
          </div>
          <div class="card fat">
            <div class="card-body">
              <h4 class="card-title">Login</h4>
              <form method="POST" class="my-login-validation" novalidate="" action="<?= base_url('admin/login') ?>">
                <?php if(!empty($this->session->flashdata('msg'))){ ?>
                <div class="alert alert-danger">
                <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="email">E-Mail Address</label>
                  <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                  <div class="invalid-feedback">
                    Email is invalid
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password
                  </label>
                  <input id="password" type="password" class="form-control" name="password" required data-eye>
                    <div class="invalid-feedback">
                      Password is required
                    </div>
                </div>

                <div class="form-group">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                    <label for="remember" class="custom-control-label">Remember Me</label>
                  </div>
                </div>

                <div class="form-group m-0">
                  <button type="submit" class="btn btn-primary btn-block">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="footer">
            Copyright &copy; 2020 &mdash; <a href="https://cassixcom.com" target="_blank">Cassixcom</a> 
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="<?= base_url('application/views/admin/') ?>js/my-login.js"></script>
</body>
</html>
