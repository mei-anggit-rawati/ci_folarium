<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct(){
        parent::__construct();
		$this->load->model('M_Login','M_Login');
    }
    
	function index(){
        if (isset($this->session->userdata['super-admin-diklat-pktj-tegal']) == TRUE){
			redirect(base_url('Master'));
		} elseif (isset($this->session->userdata['admin-wilayah-diklat-pktj-tegal']) == TRUE) {
           redirect(base_url('Wilayah'));
        } elseif (isset($this->session->userdata['user-diklat-pktj-tegal']) == TRUE) {
           redirect(base_url('User'));
        } else{
           $this->load->view('login');
        }
    }

    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
                
        $validasi_email = $this->M_Login->query_validasi_email($username);
        if($validasi_email->num_rows() > 0){
            $validate_ps=$this->M_Login->query_validasi_password($username,$password);
            if($validate_ps != false){
                $x = $validate_ps->row_array();
                if($x['allow']=='1'){

                    $session['id_user'] = $x['id'];
                    $session['nik'] = $x['nik'];
                    $session['user'] = $x['user'];
                    $session['nama'] = $x['nama'];
                    $session['email'] = $x['email'];
                    $session['level'] = $x['level'];
                    $session['kode_wilayah'] = $x['kode_wilayah'];
                    $session['kode_instansi'] = $x['kode_instansi'];
                    $session['nm_level'] = $x['nm_level'];
                    $session['nm_instansi'] = $x['nm_instansi'];
                    $session['nm_daerah'] = $x['nm_daerah'];
                    $session['nm_provinsi'] = $x['nm_provinsi'];

                    $id=$x['id'];
                    if($x['level']=='1'){ // Super Admin
                        $session['super-admin-diklat-pktj-tegal'] = TRUE;
	 					$this->session->set_userdata($session);
                        redirect(base_url('Master'));

                    }else if($x['level']=='2'){ // Admin Wilayah
                       $session['admin-wilayah-diklat-pktj-tegal'] = TRUE;
	 					$this->session->set_userdata($session);
                        redirect(base_url('Wilayah'));

                    }else if($x['level']=='3'){ // User peserta
                       $session['user-diklat-pktj-tegal'] = TRUE;
	 					$this->session->set_userdata($session);
                        redirect(base_url('User'));
                    }
                } else {
                    $this->session->set_flashdata('msg','Akun sudah dinonaktifkan.');
                }
            }else{
                $this->session->set_flashdata('msg','Password yang kamu masukan salah.');
            }

        }else{
            $this->session->set_flashdata('msg','
            <h5>Uupps! <br> Akun tidak ditemukan.</h5>
            ');
        }
        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
	
}