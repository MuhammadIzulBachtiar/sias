<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','m');
	}
	function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		$cek = $this->m->login();
		if ($cek) {
			if ($cek=='staff') {
				redirect('staff');
			}elseif ($cek=="operator") {
				redirect('operator');
			}elseif ($cek=="kasubag") {
				redirect('kasubag');
			}else{
				redirect('kepala');
			}
		}else{
			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect($this->agent->referrer());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */