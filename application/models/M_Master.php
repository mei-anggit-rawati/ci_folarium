<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Master extends CI_Model
{

    function index()
    {
        // $query = $this->db->query("SELECT A.thn, A.status, SUM(B.ABK) AS ABK
        // FROM tabform AS A 
        // LEFT JOIN tablokb09 AS B ON A.thn=B.THNFORM 
        // ORDER BY A.thn ASC");
        // return $query->result();
    }

    function hak_akses()
    {
        $query = $this->db->query("SELECT * FROM tb_hak_akses ORDER BY id ASC");
        return $query->result();
    }
    function umana()
    {
        $query = $this->db->query("SELECT A.id, A.nama, D.nama as `level`, B.daerah, B.provinsi, C.nama as instansi 
        FROM tb_user AS A 
        LEFT JOIN tb_wilayah AS B ON A.kode_wilayah=B.id 
        LEFT JOIN tb_instansi AS C ON A.kode_instansi=C.id 
        LEFT JOIN tb_hak_akses AS D ON A.level=D.id 
        ORDER BY A.level, A.id ASC");
        return $query->result();
    }
  
    function umana_detail($id)
    {
        $query = $this->db->query("SELECT A.id, A.user, A.allow, A.nama, D.nama as `level`, B.daerah, B.provinsi, C.nama as instansi 
        FROM tb_user AS A 
        LEFT JOIN tb_wilayah AS B ON A.kode_wilayah=B.id 
        LEFT JOIN tb_instansi AS C ON A.kode_instansi=C.id 
        LEFT JOIN tb_hak_akses AS D ON A.level=D.id 
        WHERE A.id = '$id'
        ORDER BY A.level, A.id ASC");
        return $query->result();
    }

    function wilayah()
    {
        $query = $this->db->query("SELECT * FROM tb_wilayah ORDER BY id ASC");
        return $query->result();
    }

    function instansi()
    {
        $query = $this->db->query("SELECT * FROM tb_instansi ORDER BY id ASC");
        return $query->result();
    }
    function rules_umana()
    {
        return [
            [
                'field' => 'nik',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'level',
                'rules' => 'required'
            ],
        ];
    }

    function umana_tambah($nik, $nama, $level, $instansi, $wilayah)
    {

        $insert = 'INSERT INTO `tb_user`(`nik`, `user`, `pass`, `nama`, `level`, `kode_wilayah`, `kode_instansi`, `allow`) 
            VALUES (
            "' . $nik . '",
            "' . $nik . '",
            "' . $nik . '",
            "' . $nama . '",
            "' . $level . '",
            "' . $wilayah . '",
            "' . $instansi . '",
            "1"
            )';
        return $this->db->query($insert);
    }
    function umana_hapus($id)
    {
        $this->db->delete('tb_user', ['id' => $id]);
    }

    function diklat_list($tahun)
    {
        $query = $this->db->query("SELECT A.id, A.tipe, B.nama as nama_diklat, A.angkatan, A.mulai, A.sampai, A.tempat 
        FROM tb_diklat AS A
        LEFT JOIN tb_kode_diklat AS B ON A.tipe=B.tipe
        WHERE tahun = '$tahun' AND `status` = 1
        ");
        return $query->result();
    }

    function lihat_diklat($id)
    {
        $query = $this->db->query("SELECT * 
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

        function peserta_diklat($id)
    {
        $query = $this->db->query("SELECT B.nama_diklat, E.nama as agama, C.id, C.nik, C.nip, C.nama_lengkap, D.nama as pendidikan, C.pangkat_gol, C.jabatan,
        C.instansi, C.alamat_instansi
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_diklat AS B ON A.id_diklat=B.id
        LEFT JOIN tb_riwayat_hidup AS C ON A.nik_peserta=C.nik
        LEFT JOIN tb_pendidikan AS D ON C.pend_terakhir=D.id
        LEFT JOIN tb_agama AS E ON C.agama=E.id
        WHERE A.id_diklat = '$id'
        ");
        return $query->result();
    }

        function profil($id)
    {
        $query = $this->db->query("SELECT 
        A.nik, A.nama_lengkap, A.tempat_lahir, A.tgl_lahir, A.no_telp, A.alamat_rumah, E.nama as agama, A.status_nikah, 
        A.nm_sutri, A.job_sutri, A.nm_ibu, A.job_ibu, A.fsk_tb, a.fsk_bb, A.fsk_goldar, A.nip, A.pangkat_gol, A.jabatan, 
        A.instansi, A.alamat_instansi, B.nama as pendidikan, D.email
        FROM tb_riwayat_hidup AS A 
        LEFT JOIN tb_pendidikan AS B ON A.pend_terakhir=B.id
        LEFT JOIN tb_agama AS E ON A.agama=E.id
        LEFT JOIN tb_user AS D ON A.nik=D.nik
        WHERE A.id = '$id'
        ");
        return $query->result();
    }

    function dosen()
    {
        $query = $this->db->query("SELECT * FROM tb_dosen");
        return $query->result();
    }

    function dosen_detail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_dosen WHERE id = '$id'");
        return $query->result();
    }

    function materi($tipe)
    {
        if ($tipe == 00) {
            $where = '';
        } else {
            $where = "WHERE A.tipe = '$tipe'";
        }
        $query = $this->db->query("SELECT A.id, A.tipe, B.nama, A.mapel, A.teori, A.praktek 
        FROM tb_mapel AS A
        LEFT JOIN tb_kode_diklat AS B ON A.tipe=B.tipe
         $where ");
        return $query->result();
    }

    function kode_diklat()
    {
        $query = $this->db->query("SELECT * FROM tb_kode_diklat WHERE flag=0");
        return $query->result();
    }

    function soal($mapel)
    {
        $query = $this->db->query("SELECT * FROM tb_soal WHERE matkul_id = '$mapel'");
        return $query->result();
    }

        function tipe_diklat()
    {
        $query = $this->db->query("SELECT * FROM tb_kode_diklat WHERE flag=0");
        return $query->result();
    }

    function tipe_tambah($tipe, $nama, $singkat)
    {
        // $sql = $this->db->query("SELECT tipe FROM tb_kode_diklat ORDER BY id DESC LIMIT 1")->result();
        // foreach ($sql as $key) {
        //     $tipe = $key->tipe;
        // }
        // $tipe = 2;

        $insert = 'INSERT INTO `tb_kode_diklat`(`tipe`, `nama`, `singkat`) 
            VALUES (
            "' . $tipe . '",
            "' . $nama . '",
            "' . $singkat . '"
            )';
        return $this->db->query($insert);
    }

        function hapus_tipe($id)
    {
        $this->db->delete('tb_kode_diklat', ['id' => $id]);
    }

    function diklat_tambah($tipe, $tahun, $sertifikat, $angkatan, $sk, $mulai, $selesai, $lokasi)
    {
        $insert = 'INSERT INTO `tb_diklat`(`no_sertifikat`, `tipe`, `angkatan`, `sk`,`tahun`,
         `mulai`, `sampai`, `tempat`, `status`) 
            VALUES (
            "' . $sertifikat . '",
            "' . $tipe . '",
            "' . $angkatan . '",
            "' . $sk . '",
            "' . $tahun . '",
            "' . $mulai . '",
            "' . $selesai . '",
            "' . $lokasi . '",
            "1"
            )';
        return $this->db->query($insert);
    }
    function hapus_diklat($id)
    {
        $this->db->delete('tb_diklat', ['id' => $id]);
    }

    function tambah_materi_diklat($materi, $dosen, $tipe)
    {
        $insert = 'INSERT INTO `tb_materi_diklat`(`id_dosen`, `id_mapel`, `tipe`) 
            VALUES (
            "' . $dosen . '",
            "' . $materi . '",
            "' . $tipe . '"
            )';
        return $this->db->query($insert);
    }

    function hapus_materi_diklat($id)
    {
        $this->db->delete('tb_materi_diklat', ['id' => $id]);
    }
}