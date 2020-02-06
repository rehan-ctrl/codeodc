<?php include("includes/css.php");?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<div class="row">
									<div class="col-md-12">
										<h3 class="box-title">View User Details:</h3>
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive result-table">
									<table class="table table-bordered">
									<thead></thead>
									<tbody>
										<tr>
											<th>Registration No.</th>
											<td>BEA-10<?= $user->user_id ?></td>
										</tr>
										<tr>
											<th>Full Name</th>
											<td>Mr. <?= $user->firstname.' '.$user->lastname ?></td>
										</tr>
										<tr>
											<th>Email-Id</th>
											<td><?= $user->email ?></td>
										</tr>
										<tr>
											<th>Contact No.</th>
											<td><?= $user->phone ?></td>
										</tr>
										<tr>
											<th>Address :</th>
											<td> <?= $user->street_address ?>, <?= $user->street_address_2 ?></td>
										</tr>
										<tr>
											<th>City</th>
											<td><?= $user->city ?></td>
										</tr>
										<tr>
											<th>Country</th>
											<td><?= $user->country ?></td>
										</tr>
										<tr>
											<th>Zip / Pin Code</th>
											<td><?= $user->zip ?></td>
										</tr>
										<tr>
											<th>Company Name</th>
											<td><?= $user->company ?></td>
										</tr>
										<tr>
											<th>User Pic:</th>
											<td><img src="<?= base_url('documents') ?>/<?= $user->profile_picture ?>" width="60px"></td>
										</tr>
									</tbody>
									<tfoot>
									<tr>
										<td><a href="<?= base_url('admin/users') ?>"><button class="btn btn-lg btn-success">Back <i class="fa fa-forward" aria-hidden="true"></i></button></a></td>
									</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include("includes/footer.php");?>
</div>
<?php include("includes/js.php");?>
</body>
</html>