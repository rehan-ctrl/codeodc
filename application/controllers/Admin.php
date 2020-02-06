<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('user_login')))
		{
			redirect(base_url('admin'));
		}
	}
	public function login()
	{
		$this->load->view('admin/index');
	}
	public function dashboard()
	{
		$tt= strtotime('+30 day');
		$seven= date('Y-m-d', $tt);
		$today=date('Y-m-d');

		$today1=date('Y-m-01').' 00:00:00';
		$seven1=date('Y-m-31').' 00:00:00';

		if(isset($_POST['month']))
		{
			$today1=date('Y-'.$_POST['month'].'-01').' 00:00:00';
			$seven1=date('Y-'.$_POST['month'].'-31').' 00:00:00';

			// $seven= date('Y-'.$_POST['month'].'-01');
			// $today=date('Y-'.$_POST['month'].'-31');
		}

		if($this->session->userdata('user_type') == 'Admin'){
		$query=$this->db->query("SELECT * from leads where position='Cool'");
		$data['cool']=$query->num_rows();

		$query1=$this->db->query("SELECT * from leads where position='Warm'");
		$data['warm']=$query1->num_rows();

		$query2=$this->db->query("SELECT * from leads where position='Hot'");
		$data['hot']=$query2->num_rows();

		$query3=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Won' and date_time between '$today1' and '$seven1'");
		$data['finish']=$query3->num_rows();

		$query3_1=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Lost' and date_time between '$today1' and '$seven1'");
		$data['lost']=$query3_1->num_rows();

		///////////////////////

		$query4=$this->db->query("SELECT * from leads where next_action='Phone Call' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_phone']=$query4->result_array();

		$query5=$this->db->query("SELECT * from leads where next_action='Proposal' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_proposal']=$query5->result_array();

		$query6=$this->db->query("SELECT * from leads where next_action='Meeting' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_meeting']=$query6->result_array();
		
		$this->load->view('admin/dashboard', $data);
		}
		else
		{
		$user_id=$this->session->userdata('user_login');
		$query=$this->db->query("SELECT * from leads where position='Cool' and assign_to='$user_id'");
		$data['cool']=$query->num_rows();

		$query1=$this->db->query("SELECT * from leads where position='Warm' and assign_to='$user_id'");
		$data['warm']=$query1->num_rows();

		$query2=$this->db->query("SELECT * from leads where position='Hot' and assign_to='$user_id'");
		$data['hot']=$query2->num_rows();

		$query3=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Won' and date_time between '$today1' and '$seven1' and assign_to='$user_id'");
		$data['finish']=$query3->num_rows();

		$query3_1=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Lost' and date_time between '$today1' and '$seven1' and assign_to='$user_id'");
		$data['lost']=$query3_1->num_rows();

		$query4=$this->db->query("SELECT * from leads where next_action='Phone Call' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_phone']=$query4->result_array();

		$query5=$this->db->query("SELECT * from leads where next_action='Proposal' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_proposal']=$query5->result_array();

		$query6=$this->db->query("SELECT * from leads where next_action='Meeting' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_meeting']=$query6->result_array();

		$this->load->view('admin/dashboard', $data);
		}
	}
	public function referral()
	{
		$referral=$this->db->query("SELECT * from referral");
		$data['referral']=$referral->result_array();
		$this->load->view('admin/referral', $data);
	}
	public function add_referral()
	{
		$referral_name=$this->input->post('referral_name', true);
		$created=date('d-m-Y');
		$this->db->insert('referral', array('referral_name'=>$referral_name, 'created'=> $created));
		redirect(base_url('admin/referral'));
	}
	function edit_referral()
	{
		$id=$this->uri->segment(3);
		$query=$this->db->query("SELECT * from referral where referral_id='$id'");
		$data=$query->row();
		?>
		<form method="post" action="<?= base_url('admin/update_referral') ?>">
			<input type="hidden" name="id" value="<?= $data->referral_id ?>">
			<div class="modal-body">
				<div class="form-group">
					<label>Referral Name:</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-suitcase"></i>
						</div>
						<input type="text" class="form-control" name="referral_name" value="<?= $data->referral_name ?>">
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success btn-md" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
		<?php
	}
	public function update_referral()
	{
		$id=$this->input->post('id');
		$referral_name=$this->input->post('referral_name', true);
		$this->db->query("UPDATE referral set referral_name='$referral_name' where referral_id='$id'");
		redirect(base_url('admin/referral'));
	}
	function delete_referral()
	{
		$id=$this->uri->segment(3);
		$this->db->query("DELETE from referral where referral_id='$id'");
		redirect(base_url('admin/referral'));
	}
	public function users()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query=$this->db->query("SELECT * from users");
		$data['users']=$query->result_array();
		$this->load->view('admin/users', $data);
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	function add_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$this->load->view('admin/add-user');
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_add_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$this->load->library('encrypt');
		$unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,20));

		$user_type=$this->input->post('user_type', true);
		$firstname=$this->input->post('first_name', true);
		$lastname=$this->input->post('last_name', true);
		$company_name=$this->input->post('company_name', true);
		$country=$this->input->post('country', true);
		$state=$this->input->post('state', true);
		$street_address=$this->input->post('street_address', true);
		$street_address_2=$this->input->post('street_address_2', true);
		$city=$this->input->post('city', true);
		$postal_code=$this->input->post('postal_code', true);
		$phone1=$this->input->post('phone1', true);
		$phone=$this->input->post('phone', true);
		$landline1=$this->input->post('landline1', true);
		$landline=$this->input->post('landline', true);
		$email_address=$this->input->post('email_address', true);
		$password=$this->input->post('password', true);
		$epassword=$this->encrypt->encode($password);
		$created=date('d-m-Y');

		$this->db->query("INSERT INTO `users`(`unique_id`, `user_type`, `firstname`, `lastname`, `company`, `country`, `state`, `street_address`, `street_address_2`, `city`, `zip`, `phone`, `email`, `password`, `created`, `country_code`, `landline_code`, `landline`) VALUES ('$unique_id','$user_type','$firstname','$lastname','$company_name','$country','$state','$street_address','$street_address_2','$city','$postal_code','$phone','$email_address','$epassword','$created','$phone1','$landline1','$landline')");
		redirect(base_url('admin/users'));
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	public function view_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$user_id=$_GET['user'];
		$query=$this->db->query("SELECT * from users where user_id='$user_id'");
		$data['user']=$query->row();
		$this->load->view('admin/view-user-details', $data);
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	public function edit_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$user_id=$_GET['user'];
		$query=$this->db->query("SELECT * from users where user_id='$user_id'");
		$data['user']=$query->row();
		$this->load->view('admin/edit-user', $data);
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_edit_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$user_id=$this->uri->segment(3);

		if(!empty($_FILES['profile_picture']['name']))
		{
			$config['upload_path'] = './documents/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('profile_picture')) {
				$upload_data = $this->upload->data();
				$image_name=$upload_data['file_name'];
				$this->db->query("UPDATE users set profile_picture='$image_name' where user_id='$user_id'");
			}else{echo $this->upload->display_errors();}
		}

		$user_type=$this->input->post('user_type', true);
		$firstname=$this->input->post('first_name', true);
		$lastname=$this->input->post('last_name', true);
		$company_name=$this->input->post('company_name', true);
		$country=$this->input->post('country', true);
		$state=$this->input->post('state', true);
		$street_address=$this->input->post('street_address', true);
		$street_address_2=$this->input->post('street_address_2', true);
		$city=$this->input->post('city', true);
		$postal_code=$this->input->post('postal_code', true);
		$phone=$this->input->post('phone', true);
		$phone1=$this->input->post('phone1', true);
		$landline1=$this->input->post('landline1', true);
		$landline=$this->input->post('landline', true);
		$email_address=$this->input->post('email_address', true);
		$password=$this->input->post('password', true);

		$this->db->query("UPDATE `users` SET `user_type`='$user_type', `firstname`='$firstname',`lastname`='$lastname',`company`='$company_name',`country`='$country',`state`='$state',`street_address`='$street_address',`street_address_2`='$street_address_2',`city`='$city',`zip`='$postal_code',`phone`='$phone', `email`='$email_address', `country_code`= '$phone1', `landline_code`='$landline1' ,`landline`='$landline'   WHERE user_id='$user_id'");
		if(!empty($password))
		{
		$this->load->library('encrypt');
		$epassword=$this->encrypt->encode($password);
		$this->db->query("UPDATE users set password='$epassword' where user_id='$user_id'");
		}
		redirect(base_url('admin/users'));
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	function delete_user()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$id=$this->uri->segment(3);
		if($id != 1)
		{
		$this->db->query("DELETE from users where user_id='$id'");
		}
		redirect(base_url('admin/users'));
		}
		else
		{
			redirect(base_url('admin/dashboard'));
		}
	}
	function leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query=$this->db->query("SELECT * from users");
		$data['users']=$query->result_array();
		$query1=$this->db->query("SELECT * from leads");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/leads', $data);
	}
	function add_lead()
	{
		$query=$this->db->query("SELECT * from referral");
		$data['referral']=$query->result_array();
		$this->load->view('admin/add-leads', $data);
	}
	function admin_add_lead()
	{
		$unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,18));
		$lead_source=$this->input->post('lead_source', true);
		$referral_name=$this->input->post('referral_name', true);
		$lead_type=$this->input->post('lead_type', true);
		$customer_type=$this->input->post('customer_type', true);
		$position=$this->input->post('position', true);
		$first_name=$this->input->post('first_name', true);
		$last_name=$this->input->post('last_name', true);
		// $customer_name=$this->input->post('customer_name', true);
		$company_name=$this->input->post('company_name', true);
		$company_type=$this->input->post('company_type', true);
		$contact1=$this->input->post('contact1', true);
		$contact_1=$this->input->post('contact_1', true);
		$contact2=$this->input->post('contact2', true);
		$contact_2=$this->input->post('contact_2', true);
		$landline1=$this->input->post('landline1', true);
		$landline=$this->input->post('landline', true);
		$street_address=$this->input->post('street_address', true);
		$street_address_2=$this->input->post('street_address_2', true);
		$city=$this->input->post('city', true);
		$postal_code=$this->input->post('postal_code', true);
		$country=$this->input->post('country', true);
		$state=$this->input->post('state', true);
		$email=$this->input->post('email_address', true);
		$website=$this->input->post('website', true);

		$assign_to='';
		if($this->session->userdata('user_type') == 'User'){
			$assign_to=$this->session->userdata('user_login');
		}

		$data=array(
			'unique_id' => $unique_id,
			'lead_source' => $lead_source,
			'referral' => $referral_name,
			'lead_type' => $lead_type,
			'customer_type' => $customer_type,
			'position' => $position,
			'firstname' => $first_name,
			'lastname' => $last_name,
			'company_name' => $company_name,
			'company_type' => $company_type,
			'contact_1' => $contact_1,
			'country_code_1' => $contact1,
			'country_code_2' => $contact2,
			'landline_code' => $landline1,
			'landline' => $landline,
			'country_code_2' => $contact2,
			'contact_2' => $contact_2,
			'address_1' => $street_address,
			'address_2' => $street_address_2,
			'city' => $city,
			'zip' => $postal_code,
			'country' => $country,
			'state' => $state,
			'email' => $email,
			'website' => $website,
			'assign_to' => $assign_to,
			'created' => date('d-m-Y'),
		);
		if($db_query=$this->db->insert('leads', $data))
		{
			redirect(base_url('admin/leads'));
		}
		else{echo "Some error occured.";}
	}
	public function view_lead()
	{
		$lead_id=$_GET['lead'];
		$query=$this->db->query("SELECT * from leads where lead_id='$lead_id'");
		$data['lead']=$query->row();
		$this->load->view('admin/view-lead-details', $data);
	}
	public function edit_lead()
	{
		$data['referral']='';
		$lead_id=$_GET['lead'];
		$query=$this->db->query("SELECT * from leads where lead_id='$lead_id'");
		$data['lead']=$query->row();
		$query1=$this->db->query("SELECT * from referral");
		if($query1->num_rows() > 0){
		$data['referral']=$query1->result_array();
		}
		$this->load->view('admin/edit-leads', $data);
	}
	function admin_edit_lead()
	{
		$id=$this->input->post('id', true);
		$lead_source=$this->input->post('lead_source', true);
		$referral_name=$this->input->post('referral_name', true);
		$lead_type=$this->input->post('lead_type', true);
		$customer_type=$this->input->post('customer_type', true);
		$position=$this->input->post('position', true);
		$first_name=$this->input->post('first_name', true);
		$last_name=$this->input->post('last_name', true);
		$company_name=$this->input->post('company_name', true);
		$company_type=$this->input->post('company_type', true);
		$contact1=$this->input->post('contact1', true);
		$contact_1=$this->input->post('contact_1', true);
		$contact2=$this->input->post('contact2', true);
		$contact_2=$this->input->post('contact_2', true);
		$landline1=$this->input->post('landline1', true);
		$landline=$this->input->post('landline', true);
		$street_address=$this->input->post('street_address', true);
		$street_address_2=$this->input->post('street_address_2', true);
		$city=$this->input->post('city', true);
		$postal_code=$this->input->post('postal_code', true);
		$country=$this->input->post('country', true);
		$state=$this->input->post('state', true);
		$email=$this->input->post('email_address', true);
		$website=$this->input->post('website', true);

		$data=array(
			'lead_source' => $lead_source,
			'referral' => $referral_name,
			'lead_type' => $lead_type,
			'customer_type' => $customer_type,
			'firstname' => $first_name,
			'lastname' => $last_name,
			'company_name' => $company_name,
			'company_type' => $company_type,
			'contact_1' => $contact_1,
			'country_code_1' => $contact1,
			'country_code_2' => $contact2,
			'landline_code' => $landline1,
			'landline' => $landline,
			'country_code_2' => $contact2,
			'contact_2' => $contact_2,
			'address_1' => $street_address,
			'address_2' => $street_address_2,
			'city' => $city,
			'zip' => $postal_code,
			'country' => $country,
			'state' => $state,
			'email' => $email,
			'website' => $website,
		);
		if($this->db->set($data)->where('lead_id', $id)->update('leads'))
		{
			redirect(base_url('admin/leads'));
		}
		else{echo "Some error occured.";}
	}
	function delete_lead()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$id=$this->uri->segment(3);
		$this->db->query("DELETE from leads where lead_id='$id'");
		redirect(base_url('admin/leads'));
		}
		else
		{
			redirect(base_url('admin/leads'));
		}
	}
	function assign_to()
	{
		$user_id=$this->uri->segment(3);
		$lead_id=$this->uri->segment(4);
		$this->db->set('assign_to', $user_id)->where('lead_id', $lead_id)->update('leads');
		echo "success";
	}
	function cool_leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Cool'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Cool' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/cool-leads', $data);
	}
	function select_cool()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_id='$id'");
		$lead=$query1->row();
		?>
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
					<th>Lead Strength</th>
					<td><?= $lead->position ?></td>
				</tr>
				<tr>
					<th>Contact Name</th>
					<td><?= $lead->firstname.' '.$lead->lastname ?></td>
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
					<th>Contact 1</th>
					<td><?= $lead->country_code_1.$lead->contact_1 ?></td>
				</tr>
				<tr>
					<th>Contact 2</th>
					<td><?= $lead->country_code_2.$lead->contact_2 ?></td>
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
					<th>City</th>
					<td><?= $lead->city ?></td>
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
		</table>
		</div>
		<?php
	}
	function select_cool_edit()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_id='$id'");
		$lead=$query1->row();
		?>
		<form action="<?= base_url('admin/edit_warm') ?>" method="post">
			<input type="hidden" name="id" value="<?= $lead->lead_id ?>">
			<div class="col-sm-6 mb-5">
				<label>Lead Strength: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="position" required="">
						<option>Cool</option>
						<option disabled>Cool</option>
						<option>Warm</option>
						<option>Hot</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action date:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" class="datepicker form-control" name="follow_up_date" required>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next Action: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="next_action">
						<option><?= $lead->next_action ?></option>
						<option>Phone Call</option>
						<option>Email</option>
						<option>Meeting</option>
						<option>Proposal</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Leads Status: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="leads_status">
						<option>Ongoing</option>
						<option>Lost</option>
						<option>Won</option>
						<option>Dormant</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action time:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="time" name="follow_up_time" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Proposal value:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" name="proposal_value" value="<?= $lead->proposal_value ?>" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Follow up comments:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<textarea class="form-control" name="comments"></textarea>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<input type="submit" class="btn btn-sm btn-info" value="Submit">
			</div>
		</form>
		
		<?php
	}
	function edit_warm()
	{
		$id=$this->input->post('id');
		$position=$this->input->post('position', true);
		$follow_up_date=$this->input->post('follow_up_date', true);
		$follow_up_date=substr($follow_up_date, -4).'-'.substr($follow_up_date, 3,3).substr($follow_up_date, 0,2);
		$filter_date=$follow_up_date;
		$comments=$this->input->post('comments', true);
		$next_action=$this->input->post('next_action', true);
		$leads_status=$this->input->post('leads_status', true);
		$follow_up_time=$this->input->post('follow_up_time', true);
		$proposal_value=$this->input->post('proposal_value', true);

		if($leads_status == 'Ongoing')
		{
			$data=array(
			'position' => $position,
			'warm_follow_up_date' => $follow_up_date,
			'warm_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		else
		{
			$data=array(
			'position' => 'Finish',
			'warm_follow_up_date' => $follow_up_date,
			'warm_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		
		redirect(base_url('admin/cool_leads'));
	}
	function warm_leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Warm'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Warm' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/warm-leads', $data);
	}
	function select_warm()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_id='$id'");
		$lead=$query1->row();
		?>
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
					<th>Lead Strength</th>
					<td><?= $lead->position ?></td>
				</tr>
				<tr>
					<th>Contact Name</th>
					<td><?= $lead->firstname.' '.$lead->lastname ?></td>
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
					<th>Contact 1</th>
					<td><?= $lead->country_code_1.$lead->contact_1 ?></td>
				</tr>
				<tr>
					<th>Contact 2</th>
					<td><?= $lead->country_code_2.$lead->contact_2 ?></td>
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
					<th>City</th>
					<td><?= $lead->city ?></td>
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
		</table>
		</div>
		<?php
	}
	function select_warm_edit()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_id='$id'");
		$lead=$query1->row();
		?>
		<form action="<?= base_url('admin/edit_admin_warm') ?>" method="post">
			<input type="hidden" name="id" value="<?= $lead->lead_id ?>">
			<div class="col-sm-12 mb-5">
				<label>Warm Follow up date:</label>
				<p><?php $date= $lead->warm_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Warm Comments:</label>
				<p><?= $lead->warm_comments ?></p>
				<label>Next Action:</label>
				<p><?= $lead->next_action ?></p>
				<label>Next Action Time:</label>
				<p><?= $lead->follow_up_time ?></p>
				<?php if(!empty($lead->proposal_value)){ ?>
				<label>Proposal value:</label>
				<p><?= $lead->proposal_value ?></p>
				<?php } ?>
				
			</div>
			<div class="col-sm-6 mb-5">
				<label>Lead Strength: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="position" required="">
						<option><?= $lead->position ?></option>
						<option>Cool</option>
						<option disabled>Warm</option>
						<option>Hot</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action date:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" name="follow_up_date" class="datepicker form-control" required>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next Action: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="next_action">
						<option><?= $lead->next_action ?></option>
						<option>Phone Call</option>
						<option>Email</option>
						<option>Meeting</option>
						<option>Proposal</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Leads Status: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="leads_status">
						<option>Ongoing</option>
						<option>Lost</option>
						<option>Won</option>
						<option>Dormant</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action time:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="time" name="follow_up_time" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Proposal value:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" name="proposal_value" value="<?= $lead->proposal_value ?>" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Follow up comments:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<textarea class="form-control" name="comments"></textarea>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<input type="submit" class="btn btn-sm btn-info" value="Submit">
			</div>
		</form>
		<?php
	}
	function edit_admin_warm()
	{
		$id=$this->input->post('id');
		$position=$this->input->post('position', true);
		$follow_up_date=$this->input->post('follow_up_date', true);
		$follow_up_date=substr($follow_up_date, -4).'-'.substr($follow_up_date, 3,3).substr($follow_up_date, 0,2);
		$filter_date=$follow_up_date;
		$comments=$this->input->post('comments', true);
		$next_action=$this->input->post('next_action', true);
		$leads_status=$this->input->post('leads_status', true);
		$follow_up_time=$this->input->post('follow_up_time', true);
		$proposal_value=$this->input->post('proposal_value', true);

		if($leads_status == 'Ongoing')
		{
			$data=array(
			'position' => $position,
			'hot_follow_up_date' => $follow_up_date,
			'hot_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date,
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		else
		{
			$data=array(
			'position' => 'Finish',
			'hot_follow_up_date' => $follow_up_date,
			'hot_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		redirect(base_url('admin/warm_leads'));
	}
	function hot_leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Hot'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Hot' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/hot-leads', $data);
	}
	function select_hot()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_id='$id'");
		$lead=$query1->row();
		?>
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
					<th>Lead Strength</th>
					<td><?= $lead->position ?></td>
				</tr>
				<tr>
					<th>Contact Name</th>
					<td><?= $lead->firstname.' '.$lead->lastname ?></td>
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
					<th>Contact 1</th>
					<td><?= $lead->country_code_1.$lead->contact_1 ?></td>
				</tr>
				<tr>
					<th>Contact 2</th>
					<td><?= $lead->country_code_2.$lead->contact_2 ?></td>
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
					<th>City</th>
					<td><?= $lead->city ?></td>
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
		</table>
		</div>
		<?php
	}
	function select_hot_edit()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_id='$id'");
		$lead=$query1->row();
		?>
		<form action="<?= base_url('admin/edit_admin_hot') ?>" method="post">
			<input type="hidden" name="id" value="<?= $lead->lead_id ?>">
			<div class="col-sm-12 mb-5">
				<label>Cool Follow up date:</label>
				<p><?php $date= $lead->warm_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Cool Comments:</label>
				<p><?= $lead->warm_comments ?></p>
				<label>Warm Follow up date:</label>
				<p><?php $date= $lead->hot_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Warm Comments:</label>
				<p><?= $lead->hot_comments ?></p>
				<label>Next Action:</label>
				<p><?= $lead->next_action ?></p>
				<label>Next Action Time:</label>
				<p><?= $lead->follow_up_time ?></p>
				<?php if(!empty($lead->proposal_value)){ ?>
				<label>Proposal value:</label>
				<p><?= $lead->proposal_value ?></p>
				<?php } ?>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Lead Strength: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="position" required="">
						<option><?= $lead->position ?></option>
						<option>Cool</option>
						<option>Warm</option>
						<option disabled>Hot</option>
						<option>Finish</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action date:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" name="follow_up_date" class="datepicker form-control" required>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next Action: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="next_action">
						<option><?= $lead->next_action ?></option>
						<option>Phone Call</option>
						<option>Email</option>
						<option>Meeting</option>
						<option>Proposal</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Leads Status: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="leads_status" required="">
						<option>Ongoing</option>
						<option>Lost</option>
						<option>Won</option>
						<option>Dormant</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action time:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="time" name="follow_up_time" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Proposal value:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="text" name="proposal_value" value="<?= $lead->proposal_value ?>" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Follow up comments:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<textarea class="form-control" name="comments"></textarea>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<input type="submit" class="btn btn-sm btn-info" value="Submit">
			</div>
		</form>
		<?php
	}
	function edit_admin_hot()
	{
		$id=$this->input->post('id');
		$position=$this->input->post('position', true);
		$follow_up_date=$this->input->post('follow_up_date', true);
		$follow_up_date=substr($follow_up_date, -4).'-'.substr($follow_up_date, 3,3).substr($follow_up_date, 0,2);
		$filter_date=$follow_up_date;
		$comments=$this->input->post('comments', true);
		$next_action=$this->input->post('next_action', true);
		$leads_status=$this->input->post('leads_status', true);
		$follow_up_time=$this->input->post('follow_up_time', true);
		$proposal_value=$this->input->post('proposal_value', true);

		if($leads_status == 'Ongoing')
		{
			$data=array(
			'position' => $position,
			'finish_follow_up_date' => $follow_up_date,
			'finish_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date,
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		else
		{
			$data=array(
			'position' => 'Finish',
			'finish_follow_up_date' => $follow_up_date,
			'finish_comments' => $comments,
			'leads_status' => $leads_status,
			'next_action' => $next_action,
			'follow_up_time' => $follow_up_time,
			'proposal_value' => $proposal_value,
			'filter_date' => $filter_date
			);
			$this->db->set($data)->where('lead_id', $id)->update('leads');
		}
		redirect(base_url('admin/hot_leads'));
	}
	function close_leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Finish'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Finish' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/close-leads', $data);
	}
	function select_close()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_id='$id'");
		$lead=$query1->row();
		?>
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
					<th>Lead Strength</th>
					<td><?= $lead->position ?></td>
				</tr>
				<tr>
					<th>Contact Name</th>
					<td><?= $lead->firstname.' '.$lead->lastname ?></td>
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
					<th>Contact 1</th>
					<td><?= $lead->country_code_1.$lead->contact_1 ?></td>
				</tr>
				<tr>
					<th>Contact 2</th>
					<td><?= $lead->country_code_2.$lead->contact_2 ?></td>
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
					<th>City</th>
					<td><?= $lead->city ?></td>
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
		</table>
		</div>
		<?php
	}
	function select_close_edit()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_id='$id'");
		$lead=$query1->row();
		?>
		<form action="<?= base_url('admin/edit_hot') ?>" method="post">
			<div class="col-sm-12 mb-5">
				<label>Cool Follow up date:</label>
				<p><?php $date= $lead->warm_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Cool Comments:</label>
				<p><?= $lead->warm_comments ?></p>
				<label>Warm Follow up date:</label>
				<p><?php $date= $lead->hot_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Warm Comments:</label>
				<p><?= $lead->hot_comments ?></p>
				<label>Hot Follow up date:</label>
				<p><?php $date= $lead->finish_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Hot Comments:</label>
				<p><?= $lead->finish_comments ?></p>
				<label>Next Action Time:</label>
				<p><?= $lead->follow_up_time ?></p>
				<?php if(!empty($lead->proposal_value)){ ?>
				<label>Proposal value:</label>
				<p><?= $lead->proposal_value ?></p>
				<?php } ?>
			</div>
		</form>
		<?php
	}
	function my_profile()
	{
		$id=$this->session->userdata('user_login');
		$query=$this->db->query("SELECT * from admin_user where id='1'");
		$data['admin']=$query->row();
		$query=$this->db->query("SELECT * from users where user_id='$id'");
		$data['user']=$query->row();
		$this->load->view('admin/my-profile', $data);
	}
	function edit_profile()
	{
		$user_id=$this->session->userdata('user_login');
		$site_color=$this->input->post('sidebar', true);
		$site_color_2=$this->input->post('header', true);
		$password=$this->input->post('password', true);

		if(!empty($_FILES['logo']['name']))
		{
			$config['upload_path'] = './documents/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('logo')) {
				$upload_data = $this->upload->data();
				$image_name=$upload_data['file_name'];
				$this->db->query("UPDATE admin_user set site_logo='$image_name' where id=1");
			}else{echo $this->upload->display_errors();}
		}
		else
		{
			$this->db->query("UPDATE admin_user set site_color='$site_color', site_color_2='$site_color_2' where id=1");
		}
		if(!empty($password))
		{
		$this->load->library('encrypt');
		$epassword=$this->encrypt->encode($password);
		$this->db->query("UPDATE users set password='$epassword' where user_id='$user_id'");
		}
		redirect(base_url('admin/my_profile'));
	}
	function admin_logout()
	{
		$this->session->unset_userdata('user_login');
		$this->session->unset_userdata('user_type');
		redirect(base_url('admin'));
	}
	public function dormat_leads()
	{
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Dormant'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Dormant' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/dormant-leads', $data);
	}
	function select_dormant()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where leads_status='Dormant' and lead_id='$id'");
		$lead=$query1->row();
		?>
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
					<th>Lead Strength</th>
					<td><?= $lead->position ?></td>
				</tr>
				<tr>
					<th>Contact Name</th>
					<td><?= $lead->firstname.' '.$lead->lastname ?></td>
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
					<th>Contact 1</th>
					<td><?= $lead->country_code_1.$lead->contact_1 ?></td>
				</tr>
				<tr>
					<th>Contact 2</th>
					<td><?= $lead->country_code_2.$lead->contact_2 ?></td>
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
					<th>City</th>
					<td><?= $lead->city ?></td>
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
		</table>
		</div>
		<?php
	}
	function select_dormant_edit()
	{
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where leads_status='Dormant' and lead_id='$id'");
		$lead=$query1->row();
		?>
			<div class="col-sm-12 mb-5">
				<label>Cool Follow up date:</label>
				<label>Cool Follow up date:</label>
				<p><?php $date= $lead->warm_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Cool Comments:</label>
				<p><?= $lead->warm_comments ?></p>
				<label>Warm Follow up date:</label>
				<p><?php $date= $lead->hot_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Warm Comments:</label>
				<p><?= $lead->hot_comments ?></p>
				<label>Hot Follow up date:</label>
				<p><?php $date= $lead->finish_follow_up_date ?><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></p>
				<label>Hot Comments:</label>
				<p><?= $lead->finish_comments ?></p>
				<label>Next Action Time:</label>
				<p><?= $lead->follow_up_time ?></p>
				<?php if(!empty($lead->proposal_value)){ ?>
				<label>Proposal value:</label>
				<p><?= $lead->proposal_value ?></p>
				<?php } ?>
				<form action="<?= base_url('admin/edit_admin_dormant') ?>" method="post">
			<input type="hidden" name="id" value="<?= $lead->lead_id ?>">
			<div class="col-sm-6 mb-5">
				<label>Lead Strength: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="position" required="">
						<option><?= $lead->position ?></option>
						<option>Cool</option>
						<option>Warm</option>
						<option>Hot</option>
						<option>Finish</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next Action: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="next_action">
						<option></option>
						<option>Phone Call</option>
						<option>Email</option>
						<option>Meeting</option>
						<option>Proposal</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Leads Status: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<select class="form-control" name="leads_status">
						<option><?= $lead->leads_status ?></option>
						<option>Ongoing</option>
						<option>Lost</option>
						<option>Won</option>
						<option>Dormant</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<label>Next action time:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-suitcase"></i>
					</div>
					<input type="time" name="follow_up_time" class="form-control">
				</div>
			</div>
			<div class="col-sm-6 mb-5">
				<input type="submit" class="btn btn-sm btn-info" value="Submit">
			</div>
		</form>
			</div>
		<?php
	}
	function edit_admin_dormant()
	{
		$id=$this->input->post('id');
		$position=$this->input->post('position', true);
		$next_action=$this->input->post('next_action', true);
		$follow_up_time=$this->input->post('follow_up_time', true);
		$leads_status=$this->input->post('leads_status', true);

		$data=array(
		'position' => $position,
		'next_action' => $next_action,
		'leads_status' => $leads_status,
		'follow_up_time' => $follow_up_time,
		);
		$this->db->set($data)->where('lead_id', $id)->update('leads');
		redirect(base_url('admin/dormat_leads'));
	}
}