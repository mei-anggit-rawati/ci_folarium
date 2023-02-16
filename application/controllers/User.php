<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template');
		$this->load->database();
        $this->load->model('M_User');
		if (isset($this->session->userdata['user-diklat-pktj-tegal']) != TRUE){
			redirect(base_url());
		}
	}

	public function index() {
		$this->template->template_user('user/index');
	}

		public function formulir() {
		if ($this->input->method() === 'post') {
            $nik = $this->input->post('nik');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $tempat = $this->input->post('tempat');
            $tanggal = $this->input->post('tanggal');
			$agama = $this->input->post('agama');
			$alamat_rumah = $this->input->post('alamat_rumah');
			$jk = $this->input->post('jk');
			$tb = $this->input->post('tb');
			$bb = $this->input->post('bb');
			$goldar = $this->input->post('goldar');
			$status_menikah = $this->input->post('status_menikah');
			$nama_sutri = $this->input->post('nama_sutri');
			$job_sutri = $this->input->post('job_sutri');
			$nama_ibu = $this->input->post('nama_ibu');
			$job_ibu = $this->input->post('job_ibu');
			$jml_sdr_ank = $this->input->post('jml_sdr_ank');
			$no_telp = $this->input->post('no_telp');
			$pend_terakhir = $this->input->post('pend_terakhir');
			$kursus = $this->input->post('kursus');
			$nip = $this->input->post('nip');
			$pangkat_gol = $this->input->post('pangkat_gol');
			$jabatan = $this->input->post('jabatan');
			$instansi = $this->input->post('instansi');
			$alamat_instansi = $this->input->post('alamat_instansi');
																						
		// 	$validation->set_rules($this->M_User->rules_umana());
        // if ($validation->run()) {
            $saved = $this->M_User->formulir_simpan($nik, $nama_lengkap, $tempat, $tanggal, $agama, $alamat_rumah, $jk, $tb, $bb, $goldar, $status_menikah, $nama_sutri, $job_sutri, $nama_ibu, $job_ibu, $jml_sdr_ank, $no_telp, $pend_terakhir, $kursus, $nip, $pangkat_gol, $jabatan, $instansi, $alamat_instansi);
            if ($saved) {
                sleep(1);
                redirect("User");
            }
        // } 
        }

		// $data = [
        //     'wilayah' => $this->M_Master->wilayah(),
		// 	'instansi' => $this->M_Master->instansi(),
		// 	'hak_akses' => $this->M_Master->hak_akses(),
        // ];
		$this->template->template_user('user/formulir');
	}

		public function profil() {
		$nik = $_SESSION['nik'];

		$data = [
            'profil' => $this->M_User->profil($nik),
        ];
		$this->template->template_user('user/profil', $data);
	}

	public function diklat() {
			$tahun = $_GET['tahun'];

		$data = [
            'diklat' => $this->M_User->diklat($tahun),
        ];
		$this->template->template_user('user/diklat', $data);
	}

	public function lihat_diklat() {
		$id = $_GET['kdiklat'];
		$tipe = $_GET['tipe'];

		$data = [
            'lihat_diklat' => $this->M_User->lihat_diklat($id),
			'materi_diklat' => $this->M_User->materi_diklat($tipe),
        ];
		$this->template->template_user('user/lihat_diklat', $data);
	}

	public function daftar_diklat() {
		$diklatid = $_GET['id'];
		$nik = $_SESSION['nik'];

		$saved = $this->M_User->daftar_diklat($diklatid, $nik);
            if ($saved) {
                sleep(3);
                redirect("user/diklat_saya");
            }
	}

	public function diklat_saya() {
		$nik = $_SESSION['nik'];

	$data = [
		'diklat' => $this->M_User->diklat_saya($nik),
	];
	$this->template->template_user('user/diklat_saya', $data);
}

public function lihat_diklat_saya() {
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

	$data = [
		'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		'materi_diklat' => $this->M_User->materi_diklat($tipe),
		'hasil_test' => $this->M_User->hasil_test($id),
	];
	$this->template->template_user('user/lihat_diklat_saya', $data);
}

public function persiapan() {
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

	$data = [
		'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		'materi_diklat' => $this->M_User->materi_diklat($tipe),
		'hasil_test' => $this->M_User->hasil_test($id),
	];
	$this->template->template_user('user/test/persiapan', $data);
}
	


}