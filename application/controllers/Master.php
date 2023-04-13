<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template');
		$this->load->library('curl');

	}

	public function index() {
		
		$this->template->template_super_admin('master/index');
	}

	public function pegawai() {
		// url endpoint untuk mengambil data pegawai
        $url = "http://localhost/ci_folarium/api/getPegawaiAll.php";

        // melakukan request ke API endpoint menggunakan library curl
        $response = $this->curl->simple_get($url);

        // mengubah format data dari JSON ke array asosiatif
		$data = [
            'pegawai' => json_decode($response, true),
        ];

		$this->template->template_super_admin('master/pegawai', $data);
	}

	public function jabatan() {
		// url endpoint untuk mengambil data pegawai
        $url = "http://localhost/ci_folarium/api/getJabatan.php";

        // melakukan request ke API endpoint menggunakan library curl
        $response = $this->curl->simple_get($url);

        // mengubah format data dari JSON ke array asosiatif
		$data = [
            'jabatan' => json_decode($response, true),
        ];

		$this->template->template_super_admin('master/jabatan', $data);
	}

	public function kontrak() {
		// url endpoint untuk mengambil data pegawai
        $url = "http://localhost/ci_folarium/api/getKontrak.php";

        // melakukan request ke API endpoint menggunakan library curl
        $response = $this->curl->simple_get($url);

        // mengubah format data dari JSON ke array asosiatif
		$data = [
            'kontrak' => json_decode($response, true),
        ];

		$this->template->template_super_admin('master/kontrak', $data);
	}



}