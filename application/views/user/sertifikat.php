<html>
    <head>
        <title>Sertifikat Diklat</title>
<style>
body, html {
  height: 100%;
}

.bg {
  /* The image used */
  background-image: url("<?php echo base_url(); ?>assets/img/blanko.jpeg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.konten {
    padding-top: 180px;
    padding-left: 200px;
    padding-right: 200px;
    margin: 0 auto;
    font-family: sans-serif;
    font-size: 14px;
}

#dua {
    padding-top: 20px;
}

#tiga {
    padding-top: 50px;
    font-family: Arial;
    font-size: 35px;
}

#empat {
    padding-top: 50px;
    font-size: 12px;
    text-align: Justify;
}

#lima {
    padding-top: 40px;
    width: 350px;
    text-align: right;
}

#lima2 {
    padding-top: 60px;
    text-align: center;
}

#par2 {
    padding-top: 0px;
    text-align: center;
    text-transform: uppercase;
}
#par3 {
    padding-bottom: 50px;
    font-size: 12px;
    text-align: center;
}

#par4 {
    padding-top: 50px;
    text-decoration: underline;
}

#foto {
    width: 180px;
    height: 230px;
}

    </style>
</head>
<body>
<div class="bg">

<?php
foreach ($lihat_diklat as $diklat) :
    $tgl1 = new DateTime($diklat->mulai);
	$tgl2 = new DateTime($diklat->sampai);
	$jml_hari = $tgl2->diff($tgl1)->days + 1;
endforeach; 
?>

<table class="konten" border="0">
<tr><th colspan="2"><?php echo $diklat->no_sertifikat; ?></th></tr>
<tr><th id="dua" colspan="2">Direktur Politeknik Keselamatan Transportasi Jalan, menyatakan bahwa :</th></tr>
<tr><th id="tiga" colspan="2"><?php echo $diklat->nama_lengkap; ?></th></tr>
<tr><th id="empat" colspan="2">Lahir di <?php echo $diklat->tempat_lahir; ?> pada tanggal <?php echo tgl($diklat->tgl_lahir); ?> telah berhasil dalam 
    mengikuti <?php echo $diklat->nama; ?> pada tahun <?php echo $diklat->tahun; ?> Angkatan <?php echo $diklat->angkatan; ?> selama <?php echo $jml_hari; ?> (<?php echo kekata($jml_hari); ?>) Hari
    dari tanggal <?php echo tgl($diklat->mulai); ?> s.d <?php echo tgl($diklat->sampai); ?> yang diselenggarakan oleh Politeknik Keselamatan Transportasi Jalan di <?php echo $diklat->tempat; ?>.
</th></tr>

<tr>
    <th id="lima">
    <img id="foto" src="<?php echo base_url(); ?>uploads/berkas_user/<?php echo $diklat->foto; ?>">
    </th>
    <th id="lima2">
        <p id="par1">Tegal, <?php echo tgl($diklat->tgl_sertif); ?></p>
        <p id="par2">Politeknik Keselamatan Transportasi Jalan</p>
        <p id="par3">Direktur,</p><br><br><br><br><br><br><br>
        <p id="par4"><?php echo $diklat->nama_dir; ?></p>
        <p id="par5">NIP. <?php echo $diklat->nip_dir; ?></p>
    </th>
</tr>


</table>
</div>

</body>
<html>
