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
								<h3 class="box-title"> Referral </h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Referral Name</th> 
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $n=1; foreach($referral as $row){ ?>
										<tr>
											<td><?= $n ?>.</td>
											<td> <?= $row['referral_name'] ?></td> 
											<td>
												<a href="" data-toggle="modal" class="edit-referral" row-id="<?= $row['referral_id'] ?>" data-target="#myModal"><i class="fa fa-pencil-square"></i></a>
											</td>
											<td>
												<a href="<?= base_url('admin/delete_referral/') ?><?= $row['referral_id'] ?>"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr> 
										<?= $n++;} ?>
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<div class="col-md-5">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Add Referral </h3>
							</div>
							<div class="box-body">
								<form method="post" action="<?= base_url('admin/add_referral') ?>">
									<div class="form-group">
										<label>Referral Name:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="referral_name" class="form-control" placeholder="Referral Name">
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
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit referral </h4>
					</div>
					<div class="return"></div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$('.edit-referral').click(function(){
			row_id=$(this).attr('row-id');
			$.ajax({
				url:'<?= base_url('admin/edit_referral/') ?>'+row_id,
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