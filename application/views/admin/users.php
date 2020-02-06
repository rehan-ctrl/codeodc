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
									<div class="col-md-10">
										<h3 class="box-title">Admin Or User Details:</h3>
									</div><div class="col-md-2"><a href="<?= base_url('admin/add_user') ?>"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New User</button></a></div>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body"> 
								<div class="table-responsive result-table">
									<table class="table table-bordered table-striped example3">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>Admin/User Name </th>
												<th>Email </th>
												<th>Contact No. </th>   
												<th>Date Of Reg</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $n=1; foreach($users as $user){ if($user['user_id']!=1){ ?>
											<tr style="text-align: center;">
												<td><?= $n ?>.</td>
												<td><?= $user['firstname'].' '.$user['lastname'] ?></td>
												<td><?= $user['email'] ?></td>
												<td><?= $user['country_code'].$user['phone'] ?></td>  
												<td><?= $user['created'] ?></td>
												<td> <?= substr($user['street_address'], 0, 15) ?>... </td>
												<td>
													<a href="<?= base_url('admin/view_user?user=') ?><?= $user['user_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-eye"></i></a>
													<a href="<?= base_url('admin/edit_user?user=') ?><?= $user['user_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-pencil-square"></i></a>
													<?php if($user['user_id'] != 1){ ?>
													<a href="<?= base_url('admin/delete_user/') ?><?= $user['user_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-trash-o"></i></a>
													<?php } ?>
												</td>
											</tr>
											<?php $n++;}} ?>
										</tbody>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
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