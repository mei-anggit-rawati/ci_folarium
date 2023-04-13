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

