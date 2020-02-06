<?php
class Basic extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$query=$this->db->query("SELECT * from admin_user where id='1'");
		$data['admin']=$query->row();
		$this->load->view('index', $data);
	}
	public function admin_login()
	{
		$query0=$this->db->query("SELECT * from admin_user where id='1'");
		$details=$query0->row();
		if($details->status!=0){
			$query=$this->db->query("SELECT * from admin_user where id='1'");
			$data['admin']=$query->row();
			$this->load->view('admin/index', $data);
		}
		else
		{
			redirect(base_url());
		}
	}
	public function adminlogin()
	{
		$this->load->library('encrypt');
		$email=$this->input->post('email', true);
		$password=$this->input->post('password', true);
		$query=$this->db->query("SELECT * from users where email='$email'");
		if($query->num_rows()>0)
		{
			$data=$query->row();
			$this_password=$data->password;

			$epassword=$this->encrypt->decode($this_password);
			if($epassword == $password)
			{
				$this->session->set_userdata('user_login', $data->user_id);
				$this->session->set_userdata('user_type', $data->user_type);
				redirect(base_url('admin/dashboard'));
			}
			else
			{
				$this->session->set_flashdata('msg', 'Email or password incorrect.');
				redirect(base_url('admin'));
			}
		}
		else
		{
			$this->session->set_flashdata('msg', 'Email or password incorrect.');
			redirect(base_url('admin'));
		}
	}
	public function auth()
	{
		$key=$this->input->post('key');
		$query=$this->db->query("SELECT * from admin_user where id=1");
		$detail=$query->row();
		if(empty($detail->key_code))
		{
			redirect(base_url('generate'));
		}
		else
		{
			$query1=$this->db->query("SELECT * from admin_user where key_code='$key'");
			if($query1->num_rows()==1)
			{
				$this->db->query("UPDATE admin_user set key_code='', status=1 where id=1");
				$this->session->set_userdata('user_login', '1');
				$this->session->set_userdata('user_type', 'Admin');
				redirect(base_url('admin/edit_user?user=1'));
			}
			else
			{
				$this->session->set_flashdata('msg', 'Key is invalid.');
				redirect(base_url());
			}
		}
	}
	public function generate()
	{
		$unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,25));
		$this->session->set_flashdata('generate_key', $unique_id);
		$this->load->view('generate');
	}
	public function create_generate_session()
	{
		$unique_id=str_shuffle(substr('abcdefghijklmnopqrstuvwxyz1234567890', 0,25));
		$password=$this->input->post('password');
		if($password == 's1s2s3s4*')
		{
			$this->session->set_flashdata('generate_key', $unique_id);
			$this->session->set_userdata('generate_session', 'success');
			redirect(base_url('generate'));
		}
		else
		{
			$this->session->set_flashdata('msg', 'Password incorrect');
			redirect(base_url('generate'));
		}
	}
	public function set_key()
	{
		$key=$this->input->post('key');
		$this->db->query("UPDATE admin_user set key_code='$key' where id=1");
		$this->session->set_flashdata('msg', 'Key generated.');
		$this->session->unset_userdata('generate_session');
		redirect(base_url());
	}
}