<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$this->load->view('homepage/header');
		$this->load->view('homepage/content');
		$this->load->view('homepage/footer');

	}
}