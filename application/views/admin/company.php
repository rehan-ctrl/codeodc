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
										<h3 class="box-title">Company Details:</h3>
									</div><div class="col-md-2"><a href="<?= base_url('admin/add_company') ?>"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Company</button></a></div>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body"> 
								<div class="table-responsive result-table">
									<table class="table table-bordered table-striped example3">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>Company Name </th>
												<th>Person Name </th>
												<th>Email </th>
												<th>Contact No. </th>
												<th>Site Key</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $n=1; foreach($users as $user){ ?>
											<tr style="text-align: center;">
												<td><?= $n ?>.</td>
												<td><?= $user['company_name'] ?></td>
												<td><?= $user['firstname'].' '.$user['lastname'] ?></td>
												<td><?= $user['company_email'] ?></td>
												<td><?= $user['phone_ext'].$user['phone_number'] ?></td>
												<td><?= $user['key_code'] ?></td>
												<td><?php if($user['status'] == 0){echo "InActive";}elseif($user['status']==1){echo "Active";}elseif($user['status']==2){echo "Disabled";} ?></td>
												<td>
													<?php if($user['status']==0||$user['status']==1){ ?>
													<a href="<?= base_url('admin/disabled_company/') ?><?= $user['company_id'] ?>" class="btn btn-sm btn-danger">Disabled</a>
													<?php }else{ ?>
														<a href="<?= base_url('admin/active_company/') ?><?= $user['company_id'] ?>" class="btn btn-sm btn-success">Active</a>
													<?php } ?>
													<a href="<?= base_url('admin/edit_company/') ?><?= $user['company_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-pencil-square"></i></a>
													<?php if($user['company_id'] != 1){ ?>
													<a href="<?= base_url('admin/delete_company/') ?><?= $user['company_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-trash-o"></i></a>
													<?php } ?>
												</td>
											</tr>
											<?php $n++;} ?>
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