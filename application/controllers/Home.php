<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct(){
        parent::__construct();
        
		$this->load->database();
        $this->load->model('M_Home');
    }
    
	function index(){
        $data = [
            'jadwal' => $this->M_Home->jadwal(),
        ];
        $this->load->view('home/home', $data);
    }
	
}