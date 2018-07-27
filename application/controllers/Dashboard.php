<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('global/header');
		// $this->load->view($view);
		$this->load->view('global/footer');
	}
}
