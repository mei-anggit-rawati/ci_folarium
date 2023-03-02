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
			'jml_pendaftar' => $this->M_Master->jml_pendaftar($id),
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
			'berkas' => $this->M_Master->berkas($id),
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
		'diklat2' => $this->M_Master->kode_diklat(),
		'diklat3' => $this->M_Master->kode_diklat(),
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

	public function edit_tipe_diklat() {
		if ($this->input->method() === 'post') {
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$singkat = $this->input->post('singkat');

		$this->M_Master->tipe_edit($id, $tipe, $nama, $singkat);
		//echo json_encode('oke');
        sleep(1);
        return redirect("Master/tipe_diklat");
		}
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

	public function ubah_status_diklat() {
		$kdiklat = $this->input->post('kdiklat');
		$tipe = $this->input->post('tipe');
		$status = $this->input->post('status');
		$tgl_sertif = $this->input->post('tgl_sertif');
		$nama_dir = $this->input->post('nama_dir');
		$nip_dir = $this->input->post('nip_dir');

	$this->M_Master->ubah_status_diklat($status, $tgl_sertif, $nama_dir, $nip_dir, $tipe, $kdiklat);
        sleep(1);
        redirect("Master/lihat_diklat?kdiklat=".$kdiklat."&tipe=".$tipe);
	}

	public function tambah_mapel_diklat() {
		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$teori = $this->input->post('teori');
		$praktek = $this->input->post('praktek');
		$this->M_Master->tambah_mapel_diklat($tipe, $nama, $teori, $praktek);
        sleep(1);
        return redirect("Master/materi?diklat=00");
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

	public function wilayah() {
		if ($this->input->method() === 'post') {
            $daerah = $this->input->post('daerah');
            $provinsi = $this->input->post('provinsi');
            $saved = $this->M_Master->wilayah_tambah($daerah, $provinsi);
            if ($saved) {
                sleep(1);
                redirect("Master/wilayah");
            }
        } 

		$data = [
            'wilayah' => $this->M_Master->wilayah(),
        ];
		$this->template->template_super_admin('master/pendukung/wilayah', $data);
	}

	public function instansi() {
		if ($this->input->method() === 'post') {
            $instansi = $this->input->post('instansi');
            $saved = $this->M_Master->instansi_tambah($instansi);
            if ($saved) {
                sleep(1);
                redirect("Master/instansi");
            }
        } 

		$data = [
            'instansi' => $this->M_Master->instansi(),
        ];
		$this->template->template_super_admin('master/pendukung/instansi', $data);
	}

	public function rilis_jadwal() {
		$tgl_skrg = date('Y-m-d');
		if ($this->input->method() === 'post') {
			$config['upload_path']          = './uploads/jadwal';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 20000;
			$config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('berkas'))
			{
					$error = array('error' => $this->upload->display_errors());
					redirect("Master/rilis_jadwal", $error);
			}
			else
			{
				//SELECT `id`, `nama`, `file`, `tahun`, `tanggal`, `flag` FROM `info_jadwal` WHERE 1

				$data['file'] = $this->upload->data("file_name");
				$data['nama'] = $this->input->post('tipe');
				$data['tahun'] = $this->input->post('tahun');
				$data['tanggal'] = $tgl_skrg;
				$this->db->insert('info_jadwal', $data);
				redirect("Master/rilis_jadwal");
			}
		}

		$data = [
			'diklat' => $this->M_Master->kode_diklat(),
            'rilis_jadwal' => $this->M_Master->rilis_jadwal(),
        ];
		$this->template->template_super_admin('master/portal/jadwal', $data);
	}
	public function hapus_file_jadwal()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_file_jadwal($id);
        sleep(1);
        return redirect("Master/rilis_jadwal");
    }

	public function galeri() {
		if ($this->input->method() === 'post') {
		$config['upload_path']          = './uploads/galeri';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas'))
		{
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('form_upload', $error);
				redirect("Master/galeri", $error);
				//$this->template->template_super_admin('master/portal/galeri', $error);
		}
		else
		{
			$data['file'] = $this->upload->data("file_name");
			$data['nama'] = $this->input->post('nama');
			$this->db->insert('info_galeri', $data);
			redirect("Master/galeri");
		}
	}

		$data = [
            'galeri' => $this->M_Master->galeri(),
        ];
		$this->template->template_super_admin('master/portal/galeri', $data);
	}
	public function hapus_file_galeri()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_file_galeri($id);
        sleep(1);
        return redirect("Master/galeri");
    }

	public function info_sertif() {
		$tgl_skrg = date('Y-m-d');
		if ($this->input->method() === 'post') {
			$config['upload_path']          = './uploads/sertifikat';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 20000;
			$config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('berkas'))
			{
					$error = array('error' => $this->upload->display_errors());
					redirect("Master/rilis_jadwal", $error);
			}
			else
			{
				//SELECT `id`, `nama`, `file`, `tahun`, `tanggal`, `flag` FROM `info_jadwal` WHERE 1

				$data['file'] = $this->upload->data("file_name");
				$data['nama'] = $this->input->post('tipe');
				$data['tahun'] = $this->input->post('tahun');
				$data['tanggal'] = $tgl_skrg;
				$this->db->insert('info_sertif', $data);
				redirect("Master/info_sertif");
			}
		}

		$data = [
			'diklat' => $this->M_Master->kode_diklat(),
            'sertif' => $this->M_Master->sertif(),
        ];
		$this->template->template_super_admin('master/portal/sertif', $data);
	}
	public function hapus_file_sertif()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_file_sertif($id);
        sleep(1);
        return redirect("Master/info_sertif");
    }
	public function alumni() {
		if ($this->input->method() === 'post') {
            $tipe = $this->input->post('tipe');
			$nama = $this->input->post('nama');
			$uraian = $this->input->post('uraian');

            $saved = $this->M_Master->alumni_tambah($tipe, $nama, $uraian);
            if ($saved) {
                sleep(1);
                redirect("Master/alumni");
            }
        } 

		$data = [
			'diklat' => $this->M_Master->kode_diklat(),
            'alumni' => $this->M_Master->alumni(),
        ];
		$this->template->template_super_admin('master/portal/alumni', $data);
	}
	public function hapus_kata_alumni()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_kata_alumni($id);
        sleep(1);
        return redirect("Master/alumni");
    }

	public function tipe_edit_form()
    {
        $id = $_GET['id'];
        $data = $this->M_Master->tipe_edit_form($id);
		echo json_encode($data);
    }

	public function tambah_soal() {
		$matkul = $this->input->post('matkul');
		$tipe = $this->input->post('tipe');
		$soal = $this->input->post('soal');
		$bobot = $this->input->post('bobot');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$kunci = $this->input->post('kunci');
		$this->M_Master->tambah_soal($matkul, $soal, $bobot, $opsi_a, $opsi_b, $opsi_c, $opsi_d, $opsi_e, $kunci);
        sleep(1);
        return redirect("Master/soal?materi=".$matkul."&tipe=".$tipe."");
	}

	public function edit_dosen() {
		if ($this->input->method() === 'post') {
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tempat_lhr = $this->input->post('tempat_lhr');
		$tanggal_lhr = $this->input->post('tanggal_lhr');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$pangkat = $this->input->post('pangkat');
		$jabatan = $this->input->post('jabatan');
		$instansi = $this->input->post('instansi');
		$a_instansi = $this->input->post('a_instansi');
		$a_rumah = $this->input->post('a_rumah');

		$this->M_Master->edit_dosen($id, $nik, $nip, $nama, $tempat_lhr, $tanggal_lhr, $email, $no_hp, $pangkat, $jabatan, $instansi, $a_instansi, $a_rumah);
		//echo json_encode('oke');
        sleep(1);
        return redirect("Master/dosen");
		}
	}

	public function tambah_dosen() {
		if ($this->input->method() === 'post') {
		$nik = $this->input->post('nik');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tempat_lhr = $this->input->post('tempat_lhr');
		$tanggal_lhr = $this->input->post('tanggal_lhr');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$pangkat = $this->input->post('pangkat');
		$jabatan = $this->input->post('jabatan');
		$instansi = $this->input->post('instansi');
		$a_instansi = $this->input->post('a_instansi');
		$a_rumah = $this->input->post('a_rumah');

		$this->M_Master->tambah_dosen($nik, $nip, $nama, $tempat_lhr, $tanggal_lhr, $email, $no_hp, $pangkat, $jabatan, $instansi, $a_instansi, $a_rumah);
		//echo json_encode('oke');
        sleep(1);
        return redirect("Master/dosen");
		}
	}
	public function hapus_dosen()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_dosen($id);
        sleep(1);
        return redirect("Master/dosen");
    }

	public function materi_detail() {
		$id = $_GET['id'];
		$data = $this->M_Master->materi_detail($id);
		echo json_encode($data);
	}

	public function edit_materi() {
		if ($this->input->method() === 'post') {
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$mapel = $this->input->post('mapel');
		$teori = $this->input->post('teori');
		$praktek = $this->input->post('praktek');

		$this->M_Master->edit_materi($id, $tipe, $mapel, $teori, $praktek);
		//echo json_encode('oke');
        sleep(1);
        return redirect("Master/materi?diklat=00");
		}
	}

	public function hapus_materi()
    {
        $id = $_GET['id'];
        $this->M_Master->hapus_materi($id);
        sleep(1);
        return redirect("Master/materi?diklat=00");
    }

	public function soal_detail() {
		$id = $_GET['id'];
		$data = $this->M_Master->soal_detail($id);
		echo json_encode($data);
	}

	public function edit_soal() {
		if ($this->input->method() === 'post') {
		$matkul = $this->input->post('matkul');
		$tipe = $this->input->post('tipe');

		$id = $this->input->post('id');
		$soal = $this->input->post('soal');
		$bobot = $this->input->post('bobot');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$kunci = $this->input->post('kunci');
		$this->M_Master->edit_soal($id, $soal, $bobot, $opsi_a, $opsi_b, $opsi_c, $opsi_d, $opsi_e, $kunci);
        
		//echo json_encode('oke');
        sleep(1);
        return redirect("Master/soal?materi=".$matkul."&tipe=".$tipe."");
		}
	}

	public function hapus_soal()
    {
        $id = $_GET['id'];
		$matkul = $_GET['materi'];
		$tipe = $_GET['tipe'];

        $this->M_Master->hapus_soal($id);
        sleep(1);
        return redirect("Master/soal?materi=".$matkul."&tipe=".$tipe."");
    }

	public function nilai_test()
	{
	$id = $_GET['id'];

		$data = [
			'daftar_nilai' => $this->M_Master->daftar_nilai($id),
			'judul' => $this->M_Master->daftar_nilai($id),
		];

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'orientation' => 'P',
			]);
		$content = $this->load->view('master/diklat/nilai_test', $data, TRUE);
		$mpdf->WriteHTML($content);
		$mpdf->Output('Nilai_Test_Diklat.pdf', 'I');
	}

}