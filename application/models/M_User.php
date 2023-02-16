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
        return $this->db->query($insert);
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

    function diklat($tahun)
    {
        $query = $this->db->query("SELECT * 
        FROM tb_diklat  
        WHERE tahun = '$tahun' AND `status` = 1
        ");
        return $query->result();
    }

    function lihat_diklat($id)
    {
        $query = $this->db->query("SELECT * 
        FROM tb_diklat  
        WHERE id = '$id'
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
        B.no_sertifikat, B.user, B.tipe, B.angkatan, B.nama_diklat, B.sk, B.tahun, B.mulai, B.sampai, B.tempat 
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_diklat AS B ON A.id_diklat=B.id
        LEFT JOIN tb_kode_diklat AS C ON B.tipe=C.tipe
        WHERE A.id = '$id'
        ");
        return $query->result();
    }

    function hasil_test($id)
    {
        $query = $this->db->query("SELECT A.id_diklat, A.pre_test, A.post_test,
        B.jwb_benar, B.jwb_salah, B.skor, B.waktu 
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_hasil_test AS B ON A.id=B.id_diklat
        WHERE A.id = '$id'
        ORDER BY jenis ASC
        ");
        return $query->result();
    }
  
}