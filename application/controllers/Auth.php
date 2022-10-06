<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{

		$this->load->view('template/header_login');
		$this->load->view('template/login_cms');
		$this->load->view('template/footer_login');

		if ($this->session->has_userdata('ID')) {
			redirect(base_url('cms'));
		}
	}

	public function Login()
	{

		$username = $this->input->post('USERNAME');
		$password = $this->input->post('PASSWORD');



		if($this->m_cms->login($username, $password)){
			redirect(base_url(''));
			return;
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal!');
			redirect(base_url(''));
			return;
		}

		if ($this->session->has_userdata('ID')) {
			redirect(base_url('cms'));
		}
		
	}

	public function Logout()
	{
		
		//Logout Codeigniter
		$this->session->unset_userdata('ID');

		// ======== Hapus semua cookie dan semua localstorage supaya datatable tidak nyangkut =============
 		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    foreach($cookies as $cookie) {
	        $parts = explode('=', $cookie);
	        $name = trim($parts[0]);
	        setcookie($name, '', time()-1000);
	        setcookie($name, '', time()-1000, '/');
	    }
	    $base_url = base_url();
	    echo "<script>localStorage.clear(); sessionStorage.clear(); window.location.replace('$base_url');</script>";
	    // ======== Hapus semua cookie dan semua localstorage supaya datatable tidak nyangkut =============

		//redirect(base_url(''));
	}
}
