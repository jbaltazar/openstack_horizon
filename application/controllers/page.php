<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
	{
		/**
		Purpose: Run all required process
		**/
		parent::__construct();
		$this->load->library("openstack");
	}

	public function index()
	{
		echo "Index Page";
	}

	public function register_user()
	{
		$config['isSave'] = false;

		if($this->input->post())
		{
			$post_data = array(
						"email" 	=> $this->input->post("email"),
						"username" 	=> $this->input->post("username"),
						"password" 	=> $this->input->post("password"),
						);

			$openstack = new openstack();
			$openstack->openstack_portal("REGISTER_USER",$post_data,null);
			$config['isSave'] = true;
		}

		$config['site_title']	= "NuCloud OpenStack Horizon";
		$config['page']			= "page/register_user";
		$config['page_title']	= "User Registration";
		$this->load->view('template/page/login_body',$config);
	}

	public function user_info()
	{
		$openstack = new openstack();
		$openstack->openstack_portal("USER_INFO","","05a2e5a2f45c4a59a78ad831ec266bf0");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
