<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	/*
		***	Controller : app.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('app/login',$d);
			}
			else
			{
				$dt['username'] = $this->input->post('username');
				$dt['password'] = $this->input->post('password');
				$this->app_login_model->getLoginData($dt);
			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			header('location:'.base_url().'dashboard_admin');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */