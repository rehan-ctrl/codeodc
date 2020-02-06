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
								<h3 class="box-title"> Edit Lead / Prospect / Customer</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form action="<?= base_url('admin/admin_edit_lead') ?>" method="post">
									<input type="hidden" name="id" value="<?= $lead->lead_id ?>">
									<div class="form-group">
										<div class="col-sm-6 mb-5">
											<label>Lead Source:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control lead-source" name="lead_source" required>
													<option><?= $lead->lead_source ?></option>
													<option>Blogging</option>
													<option>Organic Search</option>
													<option>Email Marketing</option>
													<option>Digital Advertising</option>
													<option>Media Coverage</option>
													<option>Social Media</option>
													<option>Website</option>
													<option>Direct Marketing</option>
													<option>Traditional Advertising</option>
													<option>Sponsorships</option>
													<option>Affiliate </option>
													<option>Events / Shows</option>
													<option>Inbound Phone Calls</option>
													<option>Outbound Sales</option>
													<option>Referrals</option>
													<option>Speaking Engagements</option>
													<option>Traditional / Offline Networking</option>
												</select>
											</div>
										</div>
										<?php if(!empty($lead->referral)){ $rf=$lead->referral;
											$query1=$this->db->query("SELECT * from referral where referral_id='$rf'");
											$dt=$query1->row();
										?>
										<div class="referral-names">
											<div class="col-sm-6 mb-5">
												<label>Referral Name:</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-suitcase"></i>
													</div>
												<select class="form-control" name="referral_name">
													<?php if($query1->num_rows() > 0){ ?>
													<option value="<?= $dt->referral_id ?>"><?= $dt->referral_name ?></option>
													<?php } ?>
													<?php  $n=1; foreach($referral as $row){ ?>
													<option value="<?= $row['referral_id'] ?>"><?= $row['referral_name'] ?></option>
													<?= $n++;} ?>
												</select>
												</div>
											</div>
										</div>
										<?php } ?>
										<div class="clearfix"></div>
										<div class="col-sm-6 mb-5">
											<label>Type:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="lead_type">
													<option><?= $lead->lead_type ?></option>
													<option>Prospect</option>
													<option>Customer</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Customer Type:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="customer_type">
													<option><?= $lead->customer_type ?></option>
													<option>Individual</option>
													<option>Company</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Leads Strength:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="position">
													<option><?= $lead->position ?></option>
													<option>Hot</option>
													<option>Warm</option>
													<option>Cool</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Company Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="company_name" class="form-control" value="<?= $lead->company_name ?>" placeholder="Company Name">
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Company Type:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="company_type" required>
													<option selected><?= $lead->company_type ?></option>
													<option>Aerospace </option>
													<option>Transport </option>
													<option>Computer </option>
													<option>Telecommunication </option>
													<option>Agriculture </option>
													<option>Construction </option>
													<option>Education </option>
													<option>Pharmaceutical </option>
													<option>Food </option>
													<option>Health care </option>
													<option>Hospitality </option>
													<option>Entertainment </option>
													<option>News Media </option>
													<option>Energy </option>
													<option>Manufacturing </option>
													<option>Music </option>
													<option>Mining </option>
													<option>Worldwide web</option>
													<option>Electronics </option>

												</select>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-sm-6 mb-5">
											<label>First Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="first_name" value="<?= $lead->firstname ?>" class="form-control" placeholder="First Name">
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Last Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="last_name" value="<?= $lead->lastname ?>" class="form-control" placeholder="Last Name">
											</div>
										</div>
										
										<div class="col-sm-6 mb-5">
											<label>Contact No 1:</label>
											<div class="row">
												<div class="col-md-2">
												<input type="text" name="contact1" value="<?= $lead->country_code_1 ?>" placeholder="Country code" class="form-control">
											</div>
											<div class="col-md-10">
												<input type="text" name="contact_1" value="<?= $lead->contact_1 ?>" placeholder="Number" class="form-control">
											</div>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Contact No 2:</label>
											<div class="row">
												<div class="col-md-2">
												<input type="text" name="contact2" value="<?= $lead->country_code_2 ?>" placeholder="Country code" class="form-control">
											</div>
											<div class="col-md-10">
												<input type="text" name="contact_2" value="<?= $lead->contact_2 ?>" placeholder="Number" class="form-control">
											</div>
											</div>
										</div>
										
										<div class="col-sm-6 mb-5">
											<label>Landline:</label>
											<div class="row">
												<div class="col-md-2">
												<input type="text" name="landline1" value="<?= $lead->landline_code ?>" placeholder="Area code" class="form-control">
											</div>
											<div class="col-md-8">
												<input type="text" name="landline" value="<?= $lead->landline ?>" placeholder="Number" class="form-control">
											</div>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Email Address <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" value="<?= $lead->email ?>" name="email_address" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Website </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="website" value="<?= $lead->website ?>" class="form-control" required>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-xs-6 mb-5">
											<label for="address" class="required">House No. and Street Name <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea type="text" placeholder="House No. and Street Name" rowspan="1" class="form-control" name="street_address"><?= $lead->address_1 ?></textarea>
											</div>
										</div>

										<div class="col-xs-6 mb-5">
											<label for="address" class="required">Suburb <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="street_address_2" value="<?= $lead->address_2 ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="city" class="required">Town / City <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="city" value="<?= $lead->city ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="postal_code" class="required">Pin code / Zip / Postal Code <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="postal_code" value="<?= $lead->zip ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>State:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="state" value="<?= $lead->state ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Country:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="country" value="<?= $lead->country ?>" class="form-control">
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
		$('.lead-source').change(function(){
			its=$('.lead-source').val();
			if(its == 'Referrals')
			{
				$('.referral-names').fadeIn();
			}
			else{
				$('.referral-names').fadeOut();
			}
		})
	</script>
</body>

</html>
