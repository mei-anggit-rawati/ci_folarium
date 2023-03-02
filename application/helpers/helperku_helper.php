<?php
date_default_timezone_set("Asia/Jakarta");


function a_tgl($date)
{
    if ($date > 0) {
        $Bulan = array(
            "Jan", "Feb", "Mar", "Apr",
            "Mei", "Jun", "Jul", "Agu", "Sep",
            "Okt", "Nov", "Des"
        );
        $Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        return $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu . " WIB";
        // return $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
    } else {
        return $result = '-';
    }
}

function tgl($date)
{
    if ($date > 0) {
        $Bulan = array(
            "Januari", "Februari", "Maret", "April",
            "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        );
        // $Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
        // return $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
    } else {
        return $result = '-';
    }
}

function tgl_waktu($date)
{
    if ($date > 0) {
        $Bulan = array(
            "Januari", "Februari", "Maret", "April",
            "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        );
        // $Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;
        // return $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";

    } else {
        return $result = '-';
    }
}

function getStatusDiklat() {
	return array(0=>"Belum Mulai",1=>"Dalam Proses",2=>"Sudah Selesai");
}
function getAgama() {
	return array(1=>"Islam",2=>"Kristen",3=>"Budha",4=>"Hindu",5=>"Konghucu");
}
function getJK() {
	return array(1=>"Pria",2=>"Wanita");
}
function getNikah() {
	return array(1=>"Sudah Menikah",2=>"Belum Menikah");
}
function getBerkas() {
	 return array(1=>"Pas Foto Terbaru",2=>"Scan KTP",3=>"Scan Ijazah Asli",4=>"Scan Transkip Asli",5=>"Scan Surat Pengantar");
}
function getPendidikan() {
    return array(1=>"SD",2=>"SMP",3=>"SLTA SEDERAJAT",4=>"D3",5=>"S1",6=>"S2",7=>"S3");
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}