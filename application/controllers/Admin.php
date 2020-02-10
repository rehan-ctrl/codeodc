<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('user_login')))
		{
			// $this->session->set_flashdata('message', '');
		redirect(base_url('admin'));
		}
	}
	public function login()
	{
		$this->load->view('admin/index');
	}
	public function dashboard()
	{
		$companyid=$this->session->userdata('user_company_id');
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
		$query=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid'");
		$data['cool']=$query->num_rows();

		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid'");
		$data['warm']=$query1->num_rows();

		$query2=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid'");
		$data['hot']=$query2->num_rows();

		$query3=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Won' and lead_company_id='$companyid' and date_time between '$today1' and '$seven1'");
		$data['finish']=$query3->num_rows();

		$query3_1=$this->db->query("SELECT * from leads where position='Finish' and leads_status='Lost' and lead_company_id='$companyid' and date_time between '$today1' and '$seven1'");
		$data['lost']=$query3_1->num_rows();

		///////////////////////

		$query4=$this->db->query("SELECT * from leads where next_action='Phone Call' and leads_status='Ongoing' and lead_company_id='$companyid' order by warm_follow_up_date");
		$data['list_phone']=$query4->result_array();

		$query5=$this->db->query("SELECT * from leads where next_action='Proposal' and leads_status='Ongoing' and lead_company_id='$companyid' order by warm_follow_up_date");
		$data['list_proposal']=$query5->result_array();

		$query6=$this->db->query("SELECT * from leads where next_action='Meeting' and leads_status='Ongoing' and lead_company_id='$companyid' and lead_company_id='$companyid' order by warm_follow_up_date");
		$data['list_meeting']=$query6->result_array();
		
		$this->load->view('admin/dashboard', $data);
		}
		else
		{
		$user_id=$this->session->userdata('user_login');
		$query=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid' and assign_to='$user_id'");
		$data['cool']=$query->num_rows();

		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid' and assign_to='$user_id'");
		$data['warm']=$query1->num_rows();

		$query2=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid' and assign_to='$user_id'");
		$data['hot']=$query2->num_rows();

		$query3=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid' and leads_status='Won' and date_time between '$today1' and '$seven1' and assign_to='$user_id'");
		$data['finish']=$query3->num_rows();

		$query3_1=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid' and leads_status='Lost' and date_time between '$today1' and '$seven1' and assign_to='$user_id'");
		$data['lost']=$query3_1->num_rows();

		$query4=$this->db->query("SELECT * from leads where next_action='Phone Call' and lead_company_id='$companyid' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_phone']=$query4->result_array();

		$query5=$this->db->query("SELECT * from leads where next_action='Proposal' and lead_company_id='$companyid' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_proposal']=$query5->result_array();

		$query6=$this->db->query("SELECT * from leads where next_action='Meeting' and lead_company_id='$companyid' and assign_to='$user_id' and leads_status='Ongoing' order by warm_follow_up_date");
		$data['list_meeting']=$query6->result_array();

		$this->load->view('admin/dashboard', $data);
		}
	}
	public function referral()
	{
		$companyid=$this->session->userdata('user_company_id');
		$referral=$this->db->query("SELECT * from referral where referral_company_id='$companyid'");
		$data['referral']=$referral->result_array();
		$this->load->view('admin/referral', $data);
	}
	public function add_referral()
	{
		$companyid=$this->session->userdata('user_company_id');
		$referral_name=$this->input->post('referral_name', true);
		$created=date('d-m-Y');
		$this->db->insert('referral', array('referral_name'=>$referral_name, 'referral_company_id'=>$companyid, 'created'=> $created));
		$this->session->set_flashdata('message', 'Referral added successfully.');
		redirect(base_url('admin/referral'));
	}
	function edit_referral()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query=$this->db->query("SELECT * from referral where referral_id='$id' and referral_company_id='$companyid'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->input->post('id');
		$referral_name=$this->input->post('referral_name', true);
		$this->db->query("UPDATE referral set referral_name='$referral_name' where referral_id='$id' and referral_company_id='$companyid'");
		$this->session->set_flashdata('message', 'Referral updated successfully');
		redirect(base_url('admin/referral'));
	}
	function delete_referral()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$this->db->query("DELETE from referral where referral_id='$id' and referral_company_id='$companyid'");
		$this->session->set_flashdata('message', 'Referral deleted successfully');
		redirect(base_url('admin/referral'));
	}
	public function company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
		$query=$this->db->query("SELECT * from admin_user");
		$data['users']=$query->result_array();
		$this->load->view('admin/company', $data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Company added successfully');
		redirect(base_url('admin/dashboard'));
		}
	}
	function add_company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
		$this->load->view('admin/add-company');
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_add_company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
		$this->load->library('encrypt');
		$unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,20));
		$company_unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,15));

		
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
		$company_email_address=$this->input->post('company_email_address', true);
		$password=$this->input->post('password', true);
		$epassword=$this->encrypt->encode($password);
		$created=date('d-m-Y');

		$generate=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,25));
		$this->db->query("INSERT INTO `admin_user`(`company_unique_id`, `company_name`, `address_1`, `address_2`, `city`, `zip`, `state`, `country`, `firstname`, `lastname`, `phone_ext`, `phone_number`, `landline_ext`, `landline_number`, `company_email`, `login_email`, `key_code`) VALUES ('$company_unique_id','$company_name','$street_address','$street_address_2','$city','$postal_code','$state','$country','$firstname','$lastname','$phone1','$phone','$landline1','$landline','$company_email_address','$email_address','$generate')");
		$insert_id=$this->db->insert_id();
		$user_type=$this->input->post('user_type', 'Admin');
		$user_is=$this->input->post('user_is', 1);

		$this->db->query("INSERT INTO `users`(`unique_id`, `user_type`, `firstname`, `lastname`, `company`, `country`, `state`, `street_address`, `street_address_2`, `city`, `zip`, `phone`, `email`, `password`, `created`, `country_code`, `landline_code`, `landline`, `user_is`, `user_company_id`) VALUES ('$unique_id','Admin','$firstname','$lastname','$company_name','$country','$state','$street_address','$street_address_2','$city','$postal_code','$phone','$email_address','$epassword','$created','$phone1','$landline1','$landline','1','$insert_id')");
		
		$this->session->set_flashdata('message', 'Company added successfully');
		redirect(base_url('admin/company'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function disabled_company()
	{
		if($this->session->userdata('user_login') == 1){
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$this->db->query("UPDATE admin_user set status=2 where company_id='$id'");
		$this->session->set_flashdata('message', 'Company disabled successfully');
		redirect(base_url('admin/company'));
		}
	}
	public function active_company()
	{
		if($this->session->userdata('user_login') == 1){
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$this->db->query("UPDATE admin_user set status=1 where company_id='$id'");
		$this->session->set_flashdata('message', 'Company active successfully');
		redirect(base_url('admin/company'));
		}
	}
	public function edit_company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
		$company_id=$id=$this->uri->segment(3);
		$query=$this->db->query("SELECT * from admin_user where company_id='$company_id'");
		$data['company']=$query->row();
		$this->load->view('admin/edit-company', $data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_edit_company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
		$company_id=$this->uri->segment(3);

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
		$company_email_address=$this->input->post('company_email_address', true);
		$password=$this->input->post('password', true);

		$this->db->query("UPDATE `admin_user` SET `company_name`='$company_name',`address_1`='$street_address',`address_2`='$street_address_2',`city`='$city',`zip`='$postal_code',`state`='$state',`country`='$country',`firstname`='$firstname',`lastname`='$lastname',`phone_ext`='$phone1',`phone_number`='$phone',`landline_ext`='$landline1',`landline_number`='$landline',`company_email`='$company_email_address' WHERE company_id='$company_id'");
		if(!empty($password))
		{
		$this->load->library('encrypt');
		$epassword=$this->encrypt->encode($password);
		$this->db->query("UPDATE users set password='$epassword' where email='$email_address' and user_is=1");
		}
		$this->session->set_flashdata('message', 'Company updated successfully');
		redirect(base_url('admin/company'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function delete_company()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_login') == 1){
			$id=$this->uri->segment(3);
			$this->db->query("DELETE from admin_user where company_id='$id'");
			$this->session->set_flashdata('message', 'Company deleted successfully');
		redirect(base_url('admin/company'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function users()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query=$this->db->query("SELECT * from users where user_company_id='$companyid'");
		$data['users']=$query->result_array();
		$this->load->view('admin/users', $data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	function add_user()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$this->load->view('admin/add-user');
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_add_user()
	{
		$companyid=$this->session->userdata('user_company_id');
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
		$user_company_id=$companyid;
		$created=date('d-m-Y');

		$this->db->query("INSERT INTO `users`(`unique_id`, `user_type`, `firstname`, `lastname`, `company`, `country`, `state`, `street_address`, `street_address_2`, `city`, `zip`, `phone`, `email`, `password`, `created`, `country_code`, `landline_code`, `landline`, `user_company_id`) VALUES ('$unique_id','$user_type','$firstname','$lastname','$company_name','$country','$state','$street_address','$street_address_2','$city','$postal_code','$phone','$email_address','$epassword','$created','$phone1','$landline1','$landline','$user_company_id')");
		$this->session->set_flashdata('message', 'User added successfully');
		redirect(base_url('admin/users'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function view_user()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$user_id=$_GET['user'];
		$query=$this->db->query("SELECT * from users where user_id='$user_id' and user_company_id='$companyid'");
		$data['user']=$query->row();
		$this->load->view('admin/view-user-details', $data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function edit_user()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$user_id=$_GET['user'];
		$query=$this->db->query("SELECT * from users where user_id='$user_id' and user_company_id='$companyid'");
		$data['user']=$query->row();
		$this->load->view('admin/edit-user', $data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	public function admin_edit_user()
	{
		$companyid=$this->session->userdata('user_company_id');
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
				$this->db->query("UPDATE users set profile_picture='$image_name' where user_id='$user_id' and user_company_id='$companyid'");
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

		$this->db->query("UPDATE `users` SET `user_type`='$user_type', `firstname`='$firstname',`lastname`='$lastname',`company`='$company_name',`country`='$country',`state`='$state',`street_address`='$street_address',`street_address_2`='$street_address_2',`city`='$city',`zip`='$postal_code',`phone`='$phone', `email`='$email_address', `country_code`= '$phone1', `landline_code`='$landline1' ,`landline`='$landline' WHERE user_id='$user_id' and user_company_id='$companyid'");
		if(!empty($password))
		{
		$this->load->library('encrypt');
		$epassword=$this->encrypt->encode($password);
		$this->db->query("UPDATE users set password='$epassword' where user_id='$user_id' and user_company_id='$companyid'");
		}
		$this->session->set_flashdata('message', 'User updated successfully');
		redirect(base_url('admin/users'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	function delete_user()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$id=$this->uri->segment(3);
		if($id != 1)
		{
		$this->db->query("DELETE from users where user_id='$id' and user_company_id='$companyid' and user_is!=1");
		}
		$this->session->set_flashdata('message', 'User deleted successfully');
		redirect(base_url('admin/users'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/dashboard'));
		}
	}
	function leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query=$this->db->query("SELECT * from users where user_company_id='$companyid' and user_is!=1");
		$data['users']=$query->result_array();
		$query1=$this->db->query("SELECT * from leads where lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where assign_to='$user_id' and lead_company_id='$companyid'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/leads', $data);
	}
	function add_lead()
	{
		$companyid=$this->session->userdata('user_company_id');
		$query=$this->db->query("SELECT * from referral where referral_company_id='$companyid'");
		$data['referral']=$query->result_array();
		$this->load->view('admin/add-leads', $data);
	}
	function admin_add_lead()
	{
		$companyid=$this->session->userdata('user_company_id');
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
			'lead_company_id' => $companyid
		);
		if($db_query=$this->db->insert('leads', $data))
		{
			$this->session->set_flashdata('message', 'Lead added successfully');
		redirect(base_url('admin/leads'));
		}
		else{echo "Some error occured.";}
	}
	public function view_lead()
	{
		$companyid=$this->session->userdata('user_company_id');
		$lead_id=$_GET['lead'];
		$query=$this->db->query("SELECT * from leads where lead_id='$lead_id' and lead_company_id='$companyid'");
		$data['lead']=$query->row();
		$this->load->view('admin/view-lead-details', $data);
	}
	public function edit_lead()
	{
		$companyid=$this->session->userdata('user_company_id');
		$data['referral']='';
		$lead_id=$_GET['lead'];
		$query=$this->db->query("SELECT * from leads where lead_id='$lead_id' and lead_company_id='$companyid'");
		$data['lead']=$query->row();
		$query1=$this->db->query("SELECT * from referral where referral_company_id='$companyid'");
		if($query1->num_rows() > 0){
		$data['referral']=$query1->result_array();
		}
		$this->load->view('admin/edit-leads', $data);
	}
	function admin_edit_lead()
	{
		$companyid=$this->session->userdata('user_company_id');

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
		if($this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads'))
		{
			$this->session->set_flashdata('message', 'Lead updated successfully');
		redirect(base_url('admin/leads'));
		}
		else{echo "Some error occured.";}
	}
	function delete_lead()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$id=$this->uri->segment(3);
		$this->db->query("DELETE from leads where lead_id='$id' and lead_company_id='$companyid'");
		$this->session->set_flashdata('message', 'Lead deleted successfully');
		redirect(base_url('admin/leads'));
		}
		else
		{
			$this->session->set_flashdata('message', 'Permission denied');
		redirect(base_url('admin/leads'));
		}
	}
	function assign_to()
	{
		$companyid=$this->session->userdata('user_company_id');
		$user_id=$this->uri->segment(3);
		$lead_id=$this->uri->segment(4);
		$this->db->set('assign_to', $user_id)->where(array('lead_id' => $lead_id, 'lead_company_id' => $companyid))->update('leads');
		echo "success";
	}
	function cool_leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/cool-leads', $data);
	}
	function select_cool()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Cool' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
		}
		
		$this->session->set_flashdata('message', 'Lead updated');
		redirect(base_url('admin/cool_leads'));
	}
	function warm_leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/warm-leads', $data);
	}
	function select_warm()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Warm' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
		}
		$this->session->set_flashdata('message', 'Lead updated');
		redirect(base_url('admin/warm_leads'));
	}
	function hot_leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/hot-leads', $data);
	}
	function select_hot()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Hot' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
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
			$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
		}
		$this->session->set_flashdata('message', 'Lead updated');
		redirect(base_url('admin/hot_leads'));
	}
	function close_leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/close-leads', $data);
	}
	function select_close()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where position='Finish' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->session->userdata('user_login');
		$query=$this->db->query("SELECT * from admin_user where company_id='$companyid'");
		$data['admin']=$query->row();
		$query=$this->db->query("SELECT * from users where user_id='$id' and user_company_id='$companyid'");
		$data['user']=$query->row();
		// print_r($data);
		$this->load->view('admin/my-profile', $data);
	}
	function edit_profile()
	{
		$companyid=$this->session->userdata('user_company_id');
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
				$this->db->query("UPDATE admin_user set site_logo='$image_name' where company_id='$companyid'");
			}else{echo $this->upload->display_errors();}
		}
		else
		{
			$this->db->query("UPDATE admin_user set site_color='$site_color', site_color_2='$site_color_2' where company_id='$companyid'");
		}
		if(!empty($password))
		{
		$this->load->library('encrypt');
		$epassword=$this->encrypt->encode($password);
		$this->db->query("UPDATE users set password='$epassword' where user_id='$user_id' and user_company_id='$companyid'");
		}
		$this->session->set_flashdata('message', 'Lead updated');
		redirect(base_url('admin/my_profile'));
	}
	function admin_logout()
	{
		$this->session->unset_userdata('user_login');
		$this->session->unset_userdata('user_type');
		$this->session->set_flashdata('message', 'Logout');
		redirect(base_url('admin'));
	}
	public function dormat_leads()
	{
		$companyid=$this->session->userdata('user_company_id');
		if($this->session->userdata('user_type') == 'Admin'){
		$query1=$this->db->query("SELECT * from leads where position='Dormant' and lead_company_id='$companyid'");
		$data['leads']=$query1->result_array();
		}else{
			$user_id=$this->session->userdata('user_login');
			$query1=$this->db->query("SELECT * from leads where position='Dormant' and lead_company_id='$companyid' and assign_to='$user_id'");
			$data['leads']=$query1->result_array();
		}
		$this->load->view('admin/dormant-leads', $data);
	}
	function select_dormant()
	{
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where leads_status='Dormant' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
		$id=$this->uri->segment(3);
		$query1=$this->db->query("SELECT * from leads where leads_status='Dormant' and lead_company_id='$companyid' and lead_id='$id'");
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
		$companyid=$this->session->userdata('user_company_id');
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
		$this->db->set($data)->where(array('lead_id' => $id, 'lead_company_id' => $companyid))->update('leads');
		$this->session->set_flashdata('message', 'Lead updated');
		redirect(base_url('admin/dormat_leads'));
	}
}