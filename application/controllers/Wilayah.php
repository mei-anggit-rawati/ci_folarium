<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template');
		$this->load->database();
        $this->load->model('M_Master');
		if (isset($this->session->userdata['admin-wilayah-diklat-pktj-tegal']) != TRUE){
			redirect(base_url());
		}
	}

	public function index() {
		$this->template->template_super_admin('wilayah/index');
	}

	


}