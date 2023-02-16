<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template');
		$this->load->database();
        $this->load->model('M_Master');
		if (isset($this->session->userdata['super-admin-diklat-pktj-tegal']) != TRUE){
			redirect(base_url());
		}
	}

	public function index() {
		$this->template->template_super_admin('master/index');
	}

	public function hak_akses() {
		$data = [
            'hak_akses' => $this->M_Master->hak_akses(),
        ];

		$this->template->template_super_admin('master/settings/hak_akses', $data);
	}

	public function umana() {
		$data = [
            'umana' => $this->M_Master->umana(),
        ];

		$this->template->template_super_admin('master/settings/umana', $data);
	}

	public function umana_detail() {
		$id = $_GET['id'];
		$data = $this->M_Master->umana_detail($id);
		echo json_encode($data);
	}

	public function umana_tambah() {
		if ($this->input->method() === 'post') {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $level = $this->input->post('level');
            $instansi = $this->input->post('instansi');
			$wilayah = $this->input->post('wilayah');
			$validation->set_rules($this->M_Master->rules_umana());
        if ($validation->run()) {
            $saved = $this->M_Master->umana_tambah($nik, $nama, $level, $instansi, $wilayah);
            if ($saved) {
                sleep(1);
                redirect("Master/umana");
            }
        } 
        }

		$data = [
            'wilayah' => $this->M_Master->wilayah(),
			'instansi' => $this->M_Master->instansi(),
			'hak_akses' => $this->M_Master->hak_akses(),
        ];
		$this->template->template_super_admin('master/settings/umana_form', $data);
	}

	public function umana_hapus()
    {
        $id = $_GET['id'];
        $this->M_Master->umana_hapus($id);
        sleep(1);
        return redirect("Master/umana");
    }

		public function diklat() {
		$tahun = $_GET['tahun'];
		$data = [
            'diklat' => $this->M_Master->diklat_list($tahun),
        ];
		$this->template->template_super_admin('master/diklat/diklat_list', $data);
	}

		public function lihat_diklat() {
		$id = $_GET['kdiklat'];
		$tipe = $_GET['tipe'];

		$data = [
            'lihat_diklat' => $this->M_Master->lihat_diklat($id),
			'materi_diklat' => $this->M_Master->materi_diklat($tipe),
			'materi' => $this->M_Master->materi($tipe),
			'dosen' => $this->M_Master->dosen(),
        ];
		$this->template->template_super_admin('master/diklat/diklat_lihat', $data);
	}

	public function peserta_diklat() {
		$id = $_GET['id'];

		$data = [
            'peserta_diklat' => $this->M_Master->peserta_diklat($id),
        ];
		$this->template->template_super_admin('master/diklat/diklat_peserta', $data);
	}

	public function detail_peserta() {
		$id = $_GET['id'];
		$data = [
            'profil' => $this->M_Master->profil($id),
        ];
		$this->template->template_super_admin('master/diklat/detail_peserta', $data);
	}

	public function dosen() {
		$data = [
            'dosen' => $this->M_Master->dosen(),
        ];
		$this->template->template_super_admin('master/dosen/dosen_list', $data);
	}

	public function dosen_detail() {
		$id = $_GET['id'];
		$data = $this->M_Master->dosen_detail($id);
		echo json_encode($data);
	}

	public function materi() {
	$tipe = $_GET['diklat'];
	$data = [
		'diklat' => $this->M_Master->kode_diklat(),
        'materi' => $this->M_Master->materi($tipe),
        ];
		$this->template->template_super_admin('master/materi/materi_list', $data);
	}

	public function soal() {
	$mapel = $_GET['materi'];
	$tipe = $_GET['tipe'];
	$data = [
		'soal' => $this->M_Master->soal($mapel),
        'materi' => $this->M_Master->materi($tipe),
        ];
		$this->template->template_super_admin('master/materi/soal_list', $data);
	}

		public function tipe_diklat() {
		$data = [
            'tipe' => $this->M_Master->tipe_diklat(),
        ];
		$this->template->template_super_admin('master/diklat/tipe_diklat', $data);
	}

	public function tambah_tipe_diklat() {
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$singkat = $this->input->post('singkat');
	$this->M_Master->tipe_tambah($tipe, $nama, $singkat);
        sleep(1);
        return redirect("Master/tipe_diklat");
	}

		public function hapus_tipe()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_tipe($id);
        sleep(1);
        return redirect("Master/tipe_diklat");
    }

	 function form_diklat() {
		if ($this->input->method() === 'post') {
            $tipe = $this->input->post('tipe');
            $tahun = $this->input->post('tahun');
            $sertifikat = $this->input->post('sertifikat');
			$angkatan = $this->input->post('angkatan');
			$sk = $this->input->post('sk');
            $mulai = $this->input->post('mulai');
			$selesai = $this->input->post('selesai');
			$lokasi = $this->input->post('lokasi');
			$tahun = date('Y');
            $saved = $this->M_Master->diklat_tambah($tipe, $tahun, $sertifikat, $angkatan, $sk, $mulai, $selesai, $lokasi);
            if ($saved) {
                sleep(1);
                redirect("Master/diklat?tahun=".$tahun);
            }
		}
    

		$data = [
            'diklat' => $this->M_Master->kode_diklat(),
			 'dosen' => $this->M_Master->dosen(),
        ];
		$this->template->template_super_admin('master/diklat/form_diklat', $data);
	
}

	    function get_materi(){
        // $category_id = $this->input->post('id',TRUE);
		$tipe = $_GET['id'];
        $data = $this->M_Master->materi($tipe);
        echo json_encode($data);
    }

	public function hapus_diklat()
    {
		$tahun = date('Y');
        $id = $_GET['id'];
        $this->M_Master->hapus_diklat($id);
        sleep(1);
        return redirect("Master/diklat?tahun=".$tahun);
    }

	public function tambah_materi_diklat() {
		$kdiklat = $this->input->post('kdiklat');
		$tipe = $this->input->post('tipe');
		$materi = $this->input->post('materi');
		$dosen = $this->input->post('dosen');
	$this->M_Master->tambah_materi_diklat($materi, $dosen, $tipe, $kdiklat);
        sleep(1);
        redirect("Master/lihat_diklat?kdiklat=".$kdiklat."&tipe=".$tipe);
	}

	public function hapus_materi_diklat()
    {
        $id = $_GET['id'];
		$kdiklat = $_GET['kdiklat'];
		$tipe = $_GET['tipe'];
        $this->M_Master->hapus_materi_diklat($id);
        sleep(1);
		redirect("Master/lihat_diklat?kdiklat=".$kdiklat."&tipe=".$tipe);
    }


}