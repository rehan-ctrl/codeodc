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
												<?php if($this->session->userdata('user_type') == 'Admin'){ ?>
												<th>Assigned To</th>
												<?php } ?>
												<th>Lead Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $n=1; foreach($leads as $lead){
													$rt='';if($lead['position']=='Cool'){$rt='admin/cool_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Warm'){$rt='admin/warm_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Hot'){$rt='admin/hot_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Finish'){$rt='admin/close_leads/d/'.$lead['lead_id'];}
												?>
											<tr style="text-align: center;">
												<td><?= $n ?>.</td>
												<td><?= $lead['firstname'].' '.$lead['lastname'] ?></td>
												<td><?= $lead['email'] ?></td>
												<td><?= $lead['country_code_1'].$lead['contact_1'] ?></td>  
												<td><?= $lead['created'] ?></td>
												<?php if($this->session->userdata('user_type') == 'Admin'){ ?>
												<td> 
													<select class="form-control assign-to">
													<option>Select</option>
													<?php foreach($users as $user){if($user['user_id']!=1){ ?>
													<option data-id="<?= $lead['lead_id'] ?>" value="<?= $user['user_id'] ?>"><?php $us=$user['firstname'].' '.$user['lastname'];echo substr($us, 0,15); ?></option>
													<?php }} ?>
												</select>
												</td>
												<?php } ?>
												<td><a href="<?= base_url($rt) ?>"><?= $lead['position'] ?></a></td>
												
												<td>
													<a href="<?= base_url('admin/view_lead?lead=') ?><?= $lead['lead_id'] ?>" class="pl-10 pr-10 font-20 view-lead"><i class="fa fa-eye"></i></a>
													<a href="<?= base_url('admin/edit_lead?lead=') ?><?= $lead['lead_id'] ?>" class="pl-10 pr-10 font-20 faa-edit"><i class="fa fa-pencil-square"></i></a>
													<?php
													if($this->session->userdata('user_type') == 'Admin'){ ?>
													<a href="<?= base_url('admin/delete_lead/') ?><?= $lead['lead_id'] ?>" class="pl-10 pr-10 font-20"><i class="fa fa-trash-o"></i></a>
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
<script>
	$('.assign-to').change(function(){
		user_id=$(this).val();
		lead_id=$('option:selected', this).attr('data-id');
		$.ajax({
			url:'<?= base_url('admin/assign_to/') ?>'+user_id+'/'+lead_id,
			type:'get',
			cache:false,
			success:function(data){
				alert('success');
			}
		})
	})
</script>
</body>

</html>