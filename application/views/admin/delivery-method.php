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
					<div class="col-md-7">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"> Our Delivery Method </h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Delivery Method Type</th>
											<th>Details</th>
											<th>View</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $n=1; foreach($delivery_method as $row){  ?>
										<tr>
											<td><?= $n ?>.</td>
											<td><?= $row['delivery_type'] ?></td>
											<td><?= substr($row['delivery_details'], 0, 28).'...' ?> </td>
											<td>
												<a href="" data-toggle="modal" class="view-dm" row-id="<?= $row['dm_id'] ?>" data-target="#myModalview"><i class="fa fa-eye"></i></a>
											</td>
											<td>
												<a href="" data-toggle="modal" class="edit-dm" row-id="<?= $row['dm_id'] ?>" data-target="#myModaledit"><i class="fa fa-pencil-square"></i></a>
											</td>
											<td>
												<a href="<?= base_url('admin/delete_delivery_method/') ?><?= $row['dm_id'] ?>"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<?php $n++;} ?>
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<div class="col-md-5">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Add Delivery Method Type </h3>
							</div>
							<div class="box-body">
								<form method="post" action="<?= base_url('admin/add_delivery_method') ?>">
									<div class="form-group">
										<label>Delivery Method Type :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" class="form-control" name="delivery_type" placeholder="Delivery Method Type">
										</div>
									</div>
									<div class="form-group">
										<label>Delivery Method Details :<span class="text-red">(Editor)</span></label>
										<div class="input-group">
											<textarea type="text" name="delivery_details" class="form-control ckeditor" placeholder="Delivery Method Details" rows="15" style="width: 380px"></textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<input type="submit" class="btn btn-success btn-md" value="Submit">
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
		<!-- View Details Popup Form-->
		<div id="myModalview" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">View Delivery Method Type </h4>
					</div>
					<div class="modal-body">
						<div class="view-return"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- View Details Popup Form-->
		<!-- Edit Details Popup Form-->
		<div id="myModaledit" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Delivery Method Type </h4>
					</div>
						<div class="return"></div>
				</div>
			</div>
		</div>
		<!-- Edit Details Popup Form-->
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$('.view-dm').click(function(){
			row_id=$(this).attr('row-id');
			$.ajax({
				url:'<?= base_url('admin/view_dm/') ?>'+row_id,
				type:'get',
				cache:false,
				success:function(data)
				{
					$('.view-return').html(data).show();
				}
			})
		})
		$('.edit-dm').click(function(){
			row_id=$(this).attr('row-id');
			$.ajax({
				url:'<?= base_url('admin/edit_delivery_method/') ?>'+row_id,
				type:'get',
				cache:false,
				success:function(data)
				{
					$('.return').html(data).show();
				}
			})
		})
	</script>
</body>

</html>
