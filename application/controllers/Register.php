<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

function __construct(){
        parent::__construct();
		$this->load->model('M_Login');
      $this->load->model('M_Master');
    }
    
	function index(){
      $data = [
         'wilayah' => $this->M_Master->wilayah(),
			'instansi' => $this->M_Master->instansi(),
        ];
        $this->load->view('register', $data);
    }  
    
    	function validasi(){
      $nik = $this->input->post('idcard');
      $username = $this->input->post('usrnm');
      $nama_lengkap = $this->input->post('nm_lgkp');
      $email = $this->input->post('email');
      $instansi = $this->input->post('instansi');
      $wilayah = $this->input->post('wilayah');
      $password = $this->input->post('password');
      $confirmpassword = $this->input->post('confirmpassword');

      $validasi_nik = $this->M_Login->validasi_idcard($nik);
        if(empty($validasi_nik->num_rows())){
            $validasi_username = $this->M_Login->validasi_username($username);
            if(empty($validasi_username->num_rows())){
            $saved = $this->M_Login->register($nik, $username, $nama_lengkap, $email, $instansi, $wilayah, $password);
            if ($saved) {
                sleep(1);
                redirect("Login");
            } else {
                $this->session->set_flashdata('msg','
                  <h5>Uupps! <br>Gagal Register</h5>
                  ');
            }
          } else{
                  $this->session->set_flashdata('msg','
                  <h5>Uupps! <br> Username sudah terpakai</h5>
                  ');
            }
        }else{
            $this->session->set_flashdata('msg','
            <h5>Uupps! <br> NIK sudah terdaftar</h5>
            ');
        }

         $data = [
         'wilayah' => $this->M_Master->wilayah(),
			'instansi' => $this->M_Master->instansi(),
        ];
        $this->load->view('register', $data);
    }  
	
}