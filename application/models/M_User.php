<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    function index()
    {
        // $query = $this->db->query("SELECT A.thn, A.status, SUM(B.ABK) AS ABK
        // FROM tabform AS A 
        // LEFT JOIN tablokb09 AS B ON A.thn=B.THNFORM 
        // ORDER BY A.thn ASC");
        // return $query->result();
    }



    function formulir_simpan($nik, $nama_lengkap, $tempat, $tanggal, $agama, $alamat_rumah, $jk, $tb, $bb, $goldar, $status_menikah, $nama_sutri, $job_sutri, $nama_ibu, $job_ibu, $jml_sdr_ank, $no_telp, $pend_terakhir, $kursus, $nip, $pangkat_gol, $jabatan, $instansi, $alamat_instansi)
    {
        $insert = 'INSERT INTO `tb_riwayat_hidup`(`userid`, `nik`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `agama`,
         `no_telp`, `nip`, `pangkat_gol`, `jabatan`, `instansi`, `alamat_instansi`, `alamat_rumah`, `fsk_jk`, 
         `fsk_tb`, `fsk_bb`, `fsk_goldar`, `pend_terakhir`, `kursus`, `status_nikah`, `nm_sutri`, `job_sutri`,
          `nm_ibu`, `job_ibu`, `jml_sdr_ank`) 
            VALUES (
            "'. $_SESSION['id_user']  .'", 
            "'. $nik  .'",
            "'. $nama_lengkap  .'", 
            "'. $tempat  .'", 
            "'. $tanggal  .'", 
            "'. $agama  .'", 
            "'. $no_telp  .'", 
            "'. $nip  .'", 
            "'. $pangkat_gol  .'", 
            "'. $jabatan  .'", 
            "'. $instansi  .'", 
            "'. $alamat_instansi  .'", 
            "'. $alamat_rumah  .'", 
            "'. $jk  .'", 
            "'. $tb  .'", 
            "'. $bb  .'",
            "'. $goldar  .'", 
            "'. $pend_terakhir  .'", 
            "'. $kursus  .'", 
            "'. $status_menikah  .'", 
            "'. $nama_sutri  .'", 
            "'. $job_sutri  .'", 
            "'. $nama_ibu  .'", 
            "'. $job_ibu  .'", 
            "'. $jml_sdr_ank  .'" 
            )';
         $this->db->query($insert);

        $update = 'UPDATE `tb_user` SET 
        `nama` = "' . $nama_lengkap . '"
        WHERE nik =  "' . $nik . '"';
         $this->db->query($update);

    }

    function profil($nik)
    {
        $query = $this->db->query("SELECT * 
        FROM tb_riwayat_hidup AS A 
        LEFT JOIN tb_user AS B ON A.nik=B.nik 
        WHERE B.nik = '$nik'
        ");
        return $query->result();
    }
    function berkas($nik)
    {
        $query = $this->db->query("SELECT * 
        FROM tb_berkas 
        WHERE nik = '$nik'
        ");
        return $query->result();
    }

    function diklat($tahun)
    {
        $query = $this->db->query("SELECT A.id, A.angkatan, A.mulai, A.sampai, A.tempat, A.status, B.nama, A.tipe 
        FROM tb_diklat AS A
        LEFT JOIN tb_kode_diklat AS B ON A.tipe=B.tipe
        WHERE A.tahun = '$tahun' AND A.status != 0
        ");
        return $query->result();
    }

    function lihat_diklat($id)
    {
        $query = $this->db->query("SELECT A.id, A.sk, A.no_sertifikat, A.angkatan, A.mulai, A.sampai, A.tempat, A.status, B.nama, A.tipe 
        FROM tb_diklat AS A
        LEFT JOIN tb_kode_diklat AS B ON A.tipe=B.tipe  
        WHERE A.id = '$id'
        ");
        return $query->result();
    }
    function materi_diklat($tipe)
    {
        $query = $this->db->query("SELECT A.id, C.mapel as mapel, B.nama as dosen, C.teori, C.praktek
        FROM tb_materi_diklat AS A
        LEFT JOIN tb_dosen AS B ON A.id_dosen=B.id
        LEFT JOIN tb_mapel AS C ON A.id_mapel=C.id
        WHERE A.tipe = '$tipe'
        ");
        return $query->result();
    }

    function daftar_diklat($diklatid, $nik)
    {
        $insert = 'INSERT INTO `tb_peserta_diklat`(`id_diklat`, `nik_peserta`) 
            VALUES (
            "'. $diklatid  .'",
            "'. $nik  .'"
            )';
        return $this->db->query($insert);
    }

    function diklat_saya($nik)
    {
        $query = $this->db->query("SELECT A.id, C.nama, A.pre_test, A.post_test, B.tipe, B.nama_diklat, B.angkatan, B.mulai, B.sampai, B.tempat 
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_diklat AS B ON A.id_diklat=B.id
        LEFT JOIN tb_kode_diklat AS C ON B.tipe=C.tipe
        WHERE A.nik_peserta = '$nik'
        ");
        return $query->result();
    }

    function lihat_diklat_saya($id)
    {
        $query = $this->db->query("SELECT A.id_diklat, C.nama, A.nik_peserta, A.pre_test, A.post_test, A.status, 
        B.no_sertifikat, B.user, B.tipe, B.angkatan, B.nama_diklat, B.sk, B.tahun, B.mulai, B.sampai, B.tempat,
        D.nama_lengkap, D.tempat_lahir,D.tgl_lahir, B.tgl_sertif, B.nama_dir, B.nip_dir, B.status,
        CASE WHEN E.jenis = 1 THEN E.file ELSE '' END as foto
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_diklat AS B ON A.id_diklat=B.id
        LEFT JOIN tb_kode_diklat AS C ON B.tipe=C.tipe
        LEFT JOIN tb_riwayat_hidup AS D ON A.nik_peserta=D.nik
        LEFT JOIN tb_berkas AS E ON A.nik_peserta=E.nik
        WHERE A.id = '$id'
        ");
        return $query->result();
    }

    function hasil_test_pre($id)
    {
        $query = $this->db->query("SELECT A.id_diklat, A.pre_test, A.wkt_pre, MAX(B.nilai) as nilai,
        SUM(CASE WHEN B.status = 1 THEN B.skor ELSE 0 END) AS jml_bnr_pre,
        SUM(CASE WHEN B.status = 0 THEN B.skor ELSE 0 END) AS jml_slh_pre
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_jawaban_pre AS B ON A.id=B.id_peserta
        WHERE A.id = '$id'
        GROUP BY A.id
        ");
        return $query->result();
    }
    function hasil_test_post($id)
    {
        $query = $this->db->query("SELECT A.id_diklat, A.post_test, A.wkt_post, MAX(C.nilai) as nilai,
        SUM(CASE WHEN C.status = 1 THEN C.skor ELSE 0 END) AS jml_bnr_post,
        SUM(CASE WHEN C.status = 0 THEN C.skor ELSE 0 END) AS jml_slh_post
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_jawaban_post AS C ON A.id=C.id_peserta
        WHERE A.id = '$id'
        GROUP BY A.id
        ");
        return $query->result();
    }
    function update_foto_profil($nik, $foto_profil)
    {
        $update = 'UPDATE `tb_riwayat_hidup` SET 
        `foto_profil` = "' . $foto_profil . '"
        WHERE nik =  "' . $nik . '"';
        return $this->db->query($update);
    }

    function tambah_berkas($nik, $berkas, $jenis)
    {
        $insert = 'INSERT INTO `tb_berkas`(`nik`, `jenis`, `file`) 
            VALUES (
            "'. $nik  .'",
            "'. $jenis  .'",
            "'. $berkas  .'"
            )';
        return $this->db->query($insert);
    }

    function hapus_file_user($id)
    {
        $sql = $this->db->query("SELECT file FROM tb_berkas 
        WHERE id = '$id' "); 
        $sql_result = $sql->result();
        foreach ($sql_result as $row) {
            @unlink("./uploads/berkas_user/".$row->file);
        }

        $this->db->delete('tb_berkas', ['id' => $id]);
    }

    function update_profil($nik, $nama_lengkap, $tempat, $tanggal, $agama, $alamat_rumah, $jk, $tb, $bb, $goldar, $status_menikah, $nama_sutri, $job_sutri, $nama_ibu, $job_ibu, $jml_sdr_ank, $no_telp, $pend_terakhir, $kursus)
    {
        $insert = "UPDATE `tb_riwayat_hidup` SET 
        `nama_lengkap`='$nama_lengkap',
        `tempat_lahir`='$tempat',
        `tgl_lahir`='$tanggal',
        `agama`='$agama',
        `no_telp`='$no_telp',
        `alamat_rumah`='$alamat_rumah',
        `fsk_jk`='$jk',
        `fsk_tb`='$tb',
        `fsk_bb`='$bb',
        `fsk_goldar`='$goldar',
        `pend_terakhir`='$pend_terakhir',
        `kursus`='$kursus',
        `status_nikah`='$status_menikah',
        `nm_sutri`='$nama_sutri',
        `job_sutri`='$job_sutri',
        `nm_ibu`='$nama_ibu',
        `job_ibu`='$job_ibu',
        `jml_sdr_ank`='$jml_sdr_ank' 
        WHERE `nik`='$nik'";
        return $this->db->query($insert);
    }

    function update_instansi($nik, $nip, $pangkat_gol, $jabatan, $instansi, $alamat_instansi)
    {
        $insert = "UPDATE `tb_riwayat_hidup` SET 
        `nip`='$nip',
        `pangkat_gol`='$pangkat_gol',
        `jabatan`='$jabatan',
        `instansi`='$instansi',
        `alamat_instansi`='$alamat_instansi'
        WHERE `nik`='$nik'";
        return $this->db->query($insert);
    }

    function list_soal($tipe)
    {
        $query = $this->db->query("SELECT A.id, A.soal, A.opsi_a, A.opsi_b, A.opsi_c, A.opsi_d, A.opsi_d,
        A.opsi_e
        FROM tb_soal AS A
        LEFT JOIN tb_mapel AS B ON A.matkul_id=B.id
        WHERE B.tipe='$tipe'
        ");
        return $query->result();
    }

    function selesai_test($id_soal, $id_peserta, $pilihan)
    {
        foreach($pilihan as $kode_soal=>$jawaban)
        {

        $insert = 'INSERT INTO `tb_jawaban`(`id_peserta`, `id_soal`, `jawaban`) 
            VALUES (
            "'. $id_peserta  .'",
            "'. $kode_soal  .'",
            "'. $jawaban  .'"
            )';
        return $this->db->query($insert);
            }
    }

    function validasi_profil($nik){
    	$result = $this->db->query("SELECT * FROM tb_riwayat_hidup WHERE nik = '$nik'");
        return $result;
    }
}