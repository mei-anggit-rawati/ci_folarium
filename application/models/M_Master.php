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
        $query = $this->db->query("SELECT A.id, A.tipe, B.nama as nama_diklat, A.angkatan, A.mulai, A.sampai, A.tempat, A.status 
        FROM tb_diklat AS A
        LEFT JOIN tb_kode_diklat AS B ON A.tipe=B.tipe
        WHERE A.tahun = '$tahun'
        ORDER BY A.id DESC 
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
    function jml_pendaftar($id)
    {
        $query = $this->db->query("SELECT COUNT(id) as jml_pendaftar 
        FROM tb_peserta_diklat 
        WHERE id_diklat = '$id'
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
        A.nik, A.nama_lengkap, A.tempat_lahir, A.tgl_lahir, A.no_telp, A.alamat_rumah, A.status_nikah, 
        A.nm_sutri, A.job_sutri, A.nm_ibu, A.agama, A.pend_terakhir,A.kursus, A.jml_sdr_ank, A.foto_profil, A.job_ibu, A.fsk_jk, A.fsk_tb, a.fsk_bb, A.fsk_goldar, A.nip, A.pangkat_gol, A.jabatan, 
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
        $insert = 'INSERT INTO `tb_kode_diklat`(`tipe`, `nama`, `singkat`) 
            VALUES (
            "' . $tipe . '",
            "' . $nama . '",
            "' . $singkat . '"
            )';
        return $this->db->query($insert);
    }

    function tipe_edit($id, $tipe, $nama, $singkat)
    {
        $update = 'UPDATE `tb_kode_diklat` SET 
        `tipe` = "' . $tipe . '",
        `nama` = "' . $nama . '",
        `singkat` = "' . $singkat . '"
        WHERE id =  "' . $id . '"';
        return $this->db->query($update);
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

    function ubah_status_diklat($status, $tgl_sertif, $nama_dir, $nip_dir, $tipe, $kdiklat)
    {
        $update = 'UPDATE `tb_diklat` SET 
        `tgl_sertif` = "' . $tgl_sertif . '",
        `nama_dir` = "' . $nama_dir . '",
        `nip_dir` = "' . $nip_dir . '",
        `status` = "' . $status . '"
        WHERE id =  "' . $kdiklat . '"';
        return $this->db->query($update);
    }

    function hapus_materi_diklat($id)
    {
        $this->db->delete('tb_materi_diklat', ['id' => $id]);
    }

    function wilayah_tambah($daerah, $provinsi)
    {

        $insert = 'INSERT INTO `tb_wilayah`(`provinsi`, `daerah`) 
            VALUES (
            "' . $provinsi . '",
            "' . $daerah . '"
            )';
        return $this->db->query($insert);
    }
    function instansi_tambah($instansi)
    {

        $insert = 'INSERT INTO `tb_instansi`(`nama`) 
            VALUES (
            "' . $instansi . '"
            )';
        return $this->db->query($insert);
    }

    function rilis_jadwal()
    {
        $query = $this->db->query("SELECT A.id, B.nama, A.file, A.tahun, A.tanggal
        FROM info_jadwal AS A 
        LEFT JOIN tb_kode_diklat AS B ON A.nama=B.tipe
        WHERE A.flag=0");
        return $query->result();
    }
    function hapus_file_jadwal($id)
    {
        $sql = $this->db->query("SELECT file FROM info_jadwal 
        WHERE id = '$id' "); 
        $sql_result = $sql->result();
        foreach ($sql_result as $row) {
            @unlink("./uploads/jadwal/".$row->file);
        }

        $this->db->delete('info_jadwal', ['id' => $id]);
    }

    function galeri()
    {
        $query = $this->db->query("SELECT * FROM info_galeri WHERE flag=0");
        return $query->result();
    }
    function hapus_file_galeri($id)
    {
        $sql = $this->db->query("SELECT file FROM info_galeri 
        WHERE id = '$id' "); 
        $sql_result = $sql->result();
        foreach ($sql_result as $row) {
            @unlink("./uploads/galeri/".$row->file);
        }

        $this->db->delete('info_galeri', ['id' => $id]);
    }

    function sertif()
    {
        $query = $this->db->query("SELECT A.id, B.nama, A.file, A.tahun, A.tanggal
        FROM info_sertif AS A 
        LEFT JOIN tb_kode_diklat AS B ON A.nama=B.tipe
        WHERE A.flag=0");
        return $query->result();
    }
    function hapus_file_sertif($id)
    {
        $sql = $this->db->query("SELECT file FROM info_sertif 
        WHERE id = '$id' "); 
        $sql_result = $sql->result();
        foreach ($sql_result as $row) {
            @unlink("./uploads/sertifikat/".$row->file);
        }

        $this->db->delete('info_sertif', ['id' => $id]);
    }
    function alumni()
    {
        $query = $this->db->query("SELECT A.id, B.nama, A.nama as alumni, A.note
        FROM info_alumni AS A 
        LEFT JOIN tb_kode_diklat AS B ON A.diklat=B.tipe
        WHERE A.flag=0");
        return $query->result();
    }
    function alumni_tambah($tipe, $nama, $uraian)
    {

        $insert = 'INSERT INTO `info_alumni`(`diklat`, `nama`, `note`) 
            VALUES (
            "' . $tipe . '",
            "' . $nama . '",
            "' . $uraian . '"
            )';
        return $this->db->query($insert);
    }
    function hapus_kata_alumni($id)
    {
        $this->db->delete('info_alumni', ['id' => $id]);
    }

    function tipe_edit_form($id)
    {
        $query = $this->db->query("SELECT * FROM tb_kode_diklat WHERE id='$id'");
        return $query->result();
    }

    function tambah_mapel_diklat($tipe, $nama, $teori, $praktek)
    {
        $insert = 'INSERT INTO `tb_mapel`(`tipe`, `mapel`, `teori`, `praktek`) 
            VALUES (
            "' . $tipe . '",
            "' . $nama . '",
            "' . $teori . '",
            "' . $praktek . '"
            )';
        return $this->db->query($insert);
    }

    function tambah_soal($matkul, $soal, $bobot, $opsi_a, $opsi_b, $opsi_c, $opsi_d, $opsi_e, $kunci)
    {
        $tgl_skrg = date('Y-m-d');
        $insert = 'INSERT INTO `tb_soal`(`matkul_id`, `bobot`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, 
        `opsi_d`, `opsi_e`, `jawaban`, `created_on`, `updated_on`) 
            VALUES (
            "' . $matkul . '",
            "' . $bobot . '",
            "' . $soal . '",
            "' . $opsi_a . '",
            "' . $opsi_b . '",
            "' . $opsi_c . '",
            "' . $opsi_d . '",
            "' . $opsi_e . '",
            "' . $kunci . '",
            "' . $tgl_skrg . '",
            "' . $tgl_skrg . '"
            )';
        return $this->db->query($insert);
    }

    function edit_dosen($id, $nik, $nip, $nama, $tempat_lhr, $tanggal_lhr, $email, $no_hp, $pangkat, $jabatan, $instansi, $a_instansi, $a_rumah)
    {

        $update = 'UPDATE `tb_dosen` SET 
        `nik` = "' . $nik . '",
        `nip` = "' . $nip . '",
        `nama` = "' . $nama . '",
        `tempat_lhr` = "' . $tempat_lhr . '",
        `tanggal_lhr` = "' . $tanggal_lhr . '",
        `email` = "' . $email . '",
        `no_hp` = "' . $no_hp . '",
        `pangkat` = "' . $pangkat . '",
        `jabatan` = "' . $jabatan . '",
        `instansi` = "' . $instansi . '",
        `a_instansi` = "' . $a_instansi . '",
        `a_rumah` = "' . $a_rumah . '"
        WHERE id =  "' . $id . '"';
        return $this->db->query($update);
    }

    function tambah_dosen($nik, $nip, $nama, $tempat_lhr, $tanggal_lhr, $email, $no_hp, $pangkat, $jabatan, $instansi, $a_instansi, $a_rumah)
    {

        $insert = 'INSERT INTO `tb_dosen`(`nama`, `nik`, `tempat_lhr`, `tanggal_lhr`, `email`, `no_hp`, `nip`, `pangkat`, `jabatan`, `instansi`, `a_instansi`, `a_rumah`) 
            VALUES (
            "' . $nama . '",
            "' . $nik . '",
            "' . $tempat_lhr . '",
            "' . $tanggal_lhr . '",
            "' . $email . '",
            "' . $no_hp . '",
            "' . $nip . '",
            "' . $pangkat . '",
            "' . $jabatan . '",
            "' . $instansi . '",
            "' . $a_instansi . '",
            "' . $a_rumah . '"
            )';
        return $this->db->query($insert);
    }
    function hapus_dosen($id)
    {
        $this->db->delete('tb_dosen', ['id' => $id]);
    }
    function materi_detail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_mapel WHERE id = '$id'");
        return $query->result();
    }

    function edit_materi($id, $tipe, $mapel, $teori, $praktek)
    {
        $update = 'UPDATE `tb_mapel` SET 
        `tipe` = "' . $tipe . '",
        `mapel` = "' . $mapel . '",
        `teori` = "' . $teori . '",
        `praktek` = "' . $praktek . '"
        WHERE id =  "' . $id . '"';
        return $this->db->query($update);
    }

    function hapus_materi($id)
    {
        $this->db->delete('tb_mapel', ['id' => $id]);
        $this->db->delete('tb_soal', ['matkul_id' => $id]);
    }

    function soal_detail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_soal WHERE id = '$id'");
        return $query->result();
    }

    function edit_soal($id, $soal, $bobot, $opsi_a, $opsi_b, $opsi_c, $opsi_d, $opsi_e, $kunci)
    {
        $update = 'UPDATE `tb_soal` SET 
        `soal` = "' . $soal . '",
        `bobot` = "' . $bobot . '",
        `opsi_a` = "' . $opsi_a . '",
        `opsi_b` = "' . $opsi_b . '",
        `opsi_c` = "' . $opsi_c . '",
        `opsi_d` = "' . $opsi_d . '",
        `opsi_e` = "' . $opsi_e . '",
        `jawaban` = "' . $kunci . '"
        WHERE id =  "' . $id . '"';
        return $this->db->query($update);
    }

    function hapus_soal($id)
    {
        $this->db->delete('tb_soal', ['id' => $id]);
    }
    function berkas($id)
    {
        $query = $this->db->query("SELECT * 
        FROM tb_berkas AS A
        LEFT JOIN tb_riwayat_hidup AS B ON A.nik=B.nik
        WHERE B.id = '$id'
        ");
        return $query->result();
    }

    function daftar_nilai($id)
    {
        $query = $this->db->query("SELECT A.nik_peserta, B.nama_lengkap, MAX(D.nilai) AS pre, MAX(E.nilai) AS post, F.tempat, F.mulai, F.sampai, G.nama
        FROM tb_peserta_diklat AS A
        LEFT JOIN tb_riwayat_hidup AS B ON A.nik_peserta=B.nik
        LEFT JOIN tb_jawaban_pre AS C ON A.id=C.id_peserta
        
        LEFT JOIN tb_jawaban_pre AS D ON A.id=D.id_peserta
        LEFT JOIN tb_jawaban_post AS E ON A.id=E.id_peserta
        
        LEFT JOIN tb_diklat AS F ON A.id_diklat=F.id
        LEFT JOIN tb_kode_diklat AS G ON F.tipe=G.tipe
        
        WHERE A.id_diklat = '$id'
        GROUP BY A.id
        ORDER BY B.nama_lengkap ASC
        ");
        return $query->result();
    }


}