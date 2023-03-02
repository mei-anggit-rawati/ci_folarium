<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

function __construct(){
        parent::__construct();
        
		$this->load->database();
        $this->load->model('M_Master');
    }
    
	function index(){
        $data = [
            'rilis_jadwal' => $this->M_Master->rilis_jadwal(),
            'galeri' => $this->M_Master->galeri(),
            'alumni' => $this->M_Master->alumni(),
        ];
        $this->load->view('home/home', $data);
    }
	
}