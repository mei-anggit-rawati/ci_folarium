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
																						

            $saved = $this->M_User->formulir_simpan($nik, $nama_lengkap, $tempat, $tanggal, $agama, $alamat_rumah, $jk, $tb, $bb, $goldar, $status_menikah, $nama_sutri, $job_sutri, $nama_ibu, $job_ibu, $jml_sdr_ank, $no_telp, $pend_terakhir, $kursus, $nip, $pangkat_gol, $jabatan, $instansi, $alamat_instansi);
            if ($saved) {
                sleep(1);
                redirect("User/profil");
            }
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

		$validasi_profil = $this->M_User->validasi_profil($nik);
        if($validasi_profil->num_rows() > 0){
			$data = [
				'profil' => $this->M_User->profil($nik),
				'berkas' => $this->M_User->berkas($nik),
			];
			$this->template->template_user('user/profil', $data);
		} else {
			redirect("User/formulir");
		}

		
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
		'hasil_pre' => $this->M_User->hasil_test_pre($id),
		'hasil_post' => $this->M_User->hasil_test_post($id),
	];
	$this->template->template_user('user/lihat_diklat_saya', $data);
}

public function persiapan() {
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

	$data = [
		'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		'materi_diklat' => $this->M_User->materi_diklat($tipe),
		
	];
	$this->template->template_user('user/test/persiapan', $data);
}

public function pre() {
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

	$data = [
		'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		'materi_diklat' => $this->M_User->materi_diklat($tipe),
		'list_soal' => $this->M_User->list_soal($tipe),
	];
	$this->template->template_user('user/test/pre', $data);
}

public function post() {
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

	$data = [
		'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		'materi_diklat' => $this->M_User->materi_diklat($tipe),
		'list_soal' => $this->M_User->list_soal($tipe),
	];
	$this->template->template_user('user/test/post', $data);
}
	
public function update_foto_profil() {
	$config['upload_path']          = './uploads/foto_profil';
	$config['allowed_types']        = 'jpg|png|jpeg';
	$config['max_size']             = 20000;
	$config['encrypt_name']			= TRUE;
	$this->load->library('upload', $config);
	if (!$this->upload->do_upload('berkas'))
	{
			$error = array('error' => $this->upload->display_errors());
			redirect("User/profil", $error);
	}
	else
	{
		$foto_profil = $this->upload->data("file_name");
		$nik = $_SESSION['nik'];
		$this->M_User->update_foto_profil($nik, $foto_profil);
		redirect("User/profil");
	}
}


public function tambah_berkas() {
	$config['upload_path']          = './uploads/berkas_user';
	$config['allowed_types']        = 'jpg|png|jpeg|pdf';
	$config['max_size']             = 20000;
	$config['encrypt_name']			= TRUE;
	$this->load->library('upload', $config);
	if (!$this->upload->do_upload('berkas'))
	{
			$error = array('error' => $this->upload->display_errors());
			redirect("User/profil", $error);
	}
	else
	{
		$berkas = $this->upload->data("file_name");
		$nik = $_SESSION['nik'];
		$jenis = $this->input->post('jenis');
		$this->M_User->tambah_berkas($nik, $berkas, $jenis);
		redirect("User/profil");
	}
}

public function hapus_file_user()
{
	$id = $_GET['id'];
	$this->M_User->hapus_file_user($id);
	sleep(1);
	return redirect("User/profil");
}

public function update_profil() {	
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
																		
		$saved = $this->M_User->update_profil($nik, $nama_lengkap, $tempat, $tanggal, $agama, $alamat_rumah, $jk, $tb, $bb, $goldar, $status_menikah, $nama_sutri, $job_sutri, $nama_ibu, $job_ibu, $jml_sdr_ank, $no_telp, $pend_terakhir, $kursus);
		if ($saved) {
			sleep(1);
			redirect("User/profil");
		} else {
			redirect("User/profil");
		}
}

public function update_instansi() {	
	$nik = $this->input->post('nik');
	$nip = $this->input->post('nip');
	$pangkat_gol = $this->input->post('pangkat_gol');
	$jabatan = $this->input->post('jabatan');
	$instansi = $this->input->post('instansi');
	$alamat_instansi = $this->input->post('alamat_instansi');
																	
	$saved = $this->M_User->update_instansi($nik, $nip, $pangkat_gol, $jabatan, $instansi, $alamat_instansi);
	if ($saved) {
		sleep(1);
		redirect("User/profil");
	} else {
		redirect("User/profil");
	}
}

public function selesai_pretest() {	
	$id_soal = $this->input->post('id_soal');
	$id_peserta = $this->input->post('id_peserta');
	$pilihan = $this->input->post('pilihan');
	$jml_soal = $this->input->post('jml_soal');
	$waktu = date('Y-m-d H:i:s');


	foreach($pilihan as $kode_soal=>$jawaban)
	{
		$query = $this->db->query("SELECT jawaban,id FROM tb_soal WHERE id = '$kode_soal'")->result();
		foreach ($query as $row) {
			if ($row->jawaban == $jawaban) {
				$status = 1; //benar
			} else {
				$status = 0; //salah
			}

		$jml_benar += $status;
		$nilai = ($jml_benar/$jml_soal)*100;


	$insert = 'INSERT INTO `tb_jawaban_pre`(`id_peserta`, `id_soal`, `jawaban`, `status`, `skor`, `nilai`) 
		VALUES (
		"'. $id_peserta  .'",
		"'. $kode_soal  .'",
		"'. $jawaban  .'",
		"'. $status  .'",
		"1",
		"'. $nilai  .'"
		)';
	$this->db->query($insert);
		}
	}
	$update = "UPDATE `tb_peserta_diklat` SET `pre_test`='1', `wkt_pre`='$waktu' WHERE `id`='$id_peserta'";
	$this->db->query($update);
	redirect("User");
}

public function selesai_posttest() {	
	$id_soal = $this->input->post('id_soal');
	$id_peserta = $this->input->post('id_peserta');
	$pilihan = $this->input->post('pilihan');
	$jml_soal = $this->input->post('jml_soal');
	$waktu = date('Y-m-d H:i:s');

	foreach($pilihan as $kode_soal=>$jawaban)
	{
		$query = $this->db->query("SELECT jawaban FROM tb_soal WHERE id = '$kode_soal'")->result();
		foreach ($query as $row) {
			if ($row->jawaban == $jawaban) {
				$status = 1; //benar
			} else {
				$status = 0; //salah
			}

		$jml_benar += $status;
		$nilai = ($jml_benar/$jml_soal)*100;

	$insert = 'INSERT INTO `tb_jawaban_post`(`id_peserta`, `id_soal`, `jawaban`, `status`, `skor`, `nilai`) 
		VALUES (
		"'. $id_peserta  .'",
		"'. $kode_soal  .'",
		"'. $jawaban  .'",
		"'. $status  .'",
		"1",
		"'. $nilai  .'"
		)';
	$this->db->query($insert);
		}
	}
	$update = "UPDATE `tb_peserta_diklat` SET `post_test`='1', `wkt_post`='$waktu' WHERE `id`='$id_peserta'";
	$this->db->query($update);
	redirect("User");
}

public function sertifikat()
	{
	$id = $_GET['kdiklat'];
	$tipe = $_GET['tipe'];

		$data = [
			'lihat_diklat' => $this->M_User->lihat_diklat_saya($id),
		];

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'orientation' => 'L',
			'margin_left' => 0,
			'margin_right' => 0,
			'margin_top' => 0,
			'margin_bottom' => 0,
			'margin_header' => 0,
			'margin_footer' => 0
			]);
		$content = $this->load->view('user/sertifikat', $data, TRUE);
		$mpdf->WriteHTML($content);
		$mpdf->Output('Sertifikat.pdf', 'I');
	}

}