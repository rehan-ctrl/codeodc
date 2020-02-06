<?php include("includes/css.php")?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"> Edit Profile</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form action="<?= base_url('admin/edit_profile') ?>" method="post" enctype="multipart/form-data">
									<div class="error"></div>
									<div class="form-group">
										<?php if($this->session->userdata('user_type') == 'Admin'){ ?>
										<div class="col-sm-6 mb-5">
											<label>Site Logo:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="file" name="logo" class="form-control">
											</div>
										</div>

										<div class="col-sm-6 mb-5">
											<label for="telephone" class="required">Sidebar Color <span class="reqs"> </span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="color" name="sidebar" value="<?= $admin->site_color ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Header Color <span class="reqs"> </span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="color" value="<?= $admin->site_color_2 ?>" name="header" class="form-control" required>
											</div>
										</div>
										<div class="clearfix"></div>
										<?php } ?>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Change password </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="password" class="form-control password">
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Confirm password </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="conpassword" class="form-control conpassword">
											</div>
										</div>
										<div class="col-sm-12 mt-20">
											<button type="submit" class="btn btn-primary btn-lg">Update <i class="fa fa-forward" aria-hidden="true"></i></button>

										</div>
									</div>
								</form>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$('form').submit(function(){
					password=$('.password').val();
					conpassword=$('.conpassword').val();
					if(password!=conpassword)
					{
						$('.error').html(`<div class="alert alert-danger">Both password doesn't match.</div>`).show();
						return false;
					}
				})
	</script>
</body>

</html>
