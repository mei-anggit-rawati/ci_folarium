<html>
    <head>
        <title>Nilai Test Diklat</title>
<style>
body, html {
  width: 100%;
  text-align: center;
}

#tabel {
    width: 100%;
}

table, th, td {
    text-align: center;
    border: 1px solid;
}


    </style>
</head>
<body>
<?php
foreach ($judul as $judul) :
endforeach; ?>
<h4>DAFTAR NILAI PRE TEST DAN POST TEST<br>
<?php echo $judul->nama ?><br>
<?php echo $judul->tempat ?>, <?php echo tgl($judul->mulai) ?> s.d <?php echo tgl($judul->sampai) ?></h4>
<br>
<table id="tabel" >
                        <thead>
                            <tr align="center">
                                <th rowspan="2">NO</th>
                                <th rowspan="2">NIK</th>
                                <th rowspan="2">NAMA</th>
                                <th colspan="2">NILAI</th>
                                <th rowspan="2">DISPERSI</th>
                            </tr>
                            <tr align="center">
                                <th>PRE TEST</th>
                                <th>POST TEST</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($daftar_nilai as $daftar_nilai) :
                            $no++;
                            $dispersi = ($daftar_nilai->post-$daftar_nilai->pre);
                            ?>
                            <tr>
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $daftar_nilai->nik_peserta ?>
                                </td>
                                <td align="center">
                                    <?php echo $daftar_nilai->nama_lengkap ?>
                                </td>
                                <td align="center">
                                <?php echo $daftar_nilai->pre ?>
                                </td>
                                <td align="center">
                                    <?php echo $daftar_nilai->post ?>
                                </td>
                                <td align="center">
                                    <?php echo $dispersi ?>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

</body>
<html>
