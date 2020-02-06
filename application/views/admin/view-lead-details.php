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
										<h3 class="box-title">View Lead Details:</h3>
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
											<th>Lead No.</th>
											<td><?= $lead->lead_id ?></td>
										</tr>
										<tr>
											<th>Lead Type</th>
											<td><?= $lead->lead_type ?></td>
										</tr>
										<tr>
											<th>Customer Type</th>
											<td><?= $lead->customer_type ?></td>
										</tr>
										<tr>
											<th>Lead Position</th>
											<td><?= $lead->position ?></td>
										</tr>
										<tr>
											<th>Full Name</th>
											<td>Mr. <?= $lead->firstname.' '.$lead->lastname ?></td>
										</tr>
										<tr>
											<th>Company Name</th>
											<td><?= $lead->company_name ?></td>
										</tr>
										<tr>
											<th>Company Type</th>
											<td><?= $lead->company_type ?></td>
										</tr>
										<tr>
											<th>First Name</th>
											<td><?= $lead->firstname ?></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><?= $lead->lastname ?></td>
										</tr>
										
										<tr>
											<th>Contact No 1</th>
											<td><?= $lead->contact_1 ?></td>
										</tr>
										<tr>
											<th>Contact No 2</th>
											<td><?= $lead->contact_2 ?></td>
										</tr>
										<tr>
											<th>Email-Id</th>
											<td><?= $lead->email ?></td>
										</tr>
										<tr>
											<th>Website</th>
											<td><?= $lead->website ?></td>
										</tr>
										<tr>
											<th>Address :</th>
											<td> <?= $lead->address_1 ?>, <?= $lead->address_2 ?></td>
										</tr>
										<tr>
											<th>Suburb :</th>
											<td> <?= $lead->address_2 ?></td>
										</tr>
										<tr>
											<th>City</th>
											<td><?= $lead->city ?></td>
										</tr>
										<tr>
											<th>City</th>
											<td><?= $lead->state ?></td>
										</tr>
										<tr>
											<th>Country</th>
											<td><?= $lead->country ?></td>
										</tr>
										<tr>
											<th>Zip / Pin Code</th>
											<td><?= $lead->zip ?></td>
										</tr>
										
									</tbody>
									<tfoot>
									<tr>
										<td><a href="<?= base_url('admin/leads') ?>"><button class="btn btn-lg btn-success">Back <i class="fa fa-forward" aria-hidden="true"></i></button></a></td>
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