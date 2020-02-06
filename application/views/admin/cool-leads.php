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
										<h3 class="box-title">Lead Details:</h3>
										</div><div class="col-md-2"><a href="<?= base_url('admin/add_lead') ?>"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Lead</button></a></div>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive result-table">
										<table class="table table-bordered table-striped example3">
											<thead>
												<tr>
													<th>S.No.</th>
													<th>Contact Name </th>
													<th>Email </th>
													<th>Contact No. </th>
													<th>Date Of Reg</th>
													<th>Address</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $n=1;$rf_id=0; foreach($leads as $lead){
														if($this->uri->segment(3)=='d'){
															$rf_id=$this->uri->segment(4);
														}
													?>
												<tr style="text-align: center;<?php if($rf_id==$lead['lead_id']){echo "background-color: yellow";} ?>">
													<td><?= $n ?>.</td>
													<td><?= $lead['firstname'].' '.$lead['lastname'] ?></td>
													<td><?= $lead['email'] ?></td>
													<td><?= $lead['country_code_1'].$lead['contact_1'] ?></td>
													<td><?= $lead['created'] ?></td>
													<td> <?= substr($lead['address_1'], 0, 15) ?>... </td>
													<td>
														<a row-id="<?= $lead['lead_id'] ?>" data-toggle="modal" data-target="#myModal" class="pl-10 pr-10 font-20 view-lead"><i class="fa fa-eye"></i></a>
														<a href="<?= base_url('admin/edit_lead?lead=') ?><?= $lead['lead_id'] ?>" class="pl-10 pr-10 font-20 faa-edit"><i class="fa fa-pencil-square"></i></a>
														<a row-id="<?= $lead['lead_id'] ?>" data-toggle="modal" data-target="#myModal1" class="pl-10 pr-10 font-20 follow-up btn btn-sm btn-primary">Manage</a>
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
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cool Leads</h4>
					</div>
					<div class="modal-body">
						<div class="return"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="myModal1" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cool Leads Edit</h4>
					</div>
					<div class="modal-body">
						<div class="return1"></div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
					</div>
				</div>
			</div>
		</div>
		<script>
		$('.view-lead').click(function(){
		lead_id=$(this).attr('row-id');
		$.ajax({
		url:'<?= base_url('admin/select_cool/') ?>'+lead_id,
		type:'get',
		cache:false,
		success:function(data){
		$('.return').html(data).show();
		}
		})
		})
		$('.follow-up').click(function(){
		lead_id=$(this).attr('row-id');
		$.ajax({
		url:'<?= base_url('admin/select_cool_edit/') ?>'+lead_id,
		type:'get',
		cache:false,
		success:function(data1){
		$('.return1').html(data1).show();
		$( ".datepicker" ).datepicker({format: 'dd-mm-yyyy'});
		}
		})
		})
		</script>
	</body>
</html>