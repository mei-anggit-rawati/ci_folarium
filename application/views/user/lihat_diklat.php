<div class="page-header">
    <h4 class="page-title">Detail Diklat</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>User">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Detail Diklat</a>
        </li>
    </ul>
</div>

<?php
foreach ($lihat_diklat as $diklat) :
    if ($diklat->status == 0) {
        $status = '<span class="badge badge-count badge-default">Belum Mulai</span>';
        $status_tombol = 'disabled';
    } elseif ($diklat->status == 1) {
        $status = '<span class="badge badge-count badge-success">Dalam Proses</span>';
        $status_tombol = '';
    } else {
        $status = '<span class="badge badge-count badge-danger">Sudah Selesai</span>';
        $status_tombol = 'disabled';
    }
endforeach; 
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo $diklat->nama; ?></h5>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Nama Diklat :</label><br>
                            <h5><?php echo $diklat->nama; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Angkatan ke-</label>
                            <h5><?php echo $diklat->angkatan; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Nomor SK : </label><br>
                            <h5><?php echo $diklat->sk; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Nomor Sertifikat : </label><br>
                            <h5><?php echo $diklat->no_sertifikat; ?></h5>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Waktu Pelaksanaan : </label><br>
                            <h5><?php echo tgl($diklat->mulai); ?> s/d <?php echo tgl($diklat->sampai); ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Tempat Pelaksanaan </label><br>
                            <h5><?php echo $diklat->tempat; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                                    <label>Status Diklat : </label><br>
                                    <h5><?php echo $status; ?></h5>
                                </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table id="" class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Dosen</th>
                                <th>Jml Teori</th>
                                <th>Jml Praktek</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($materi_diklat as $materi) :
                            $no++;
                            ?>
                            <tr id="<?php echo $materi->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $materi->mapel ?>
                                </td>
                                <td>
                                    <?php echo $materi->dosen ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi->teori ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi->praktek ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-6 mb-6">
                <button class="btn btn-default">Kembali</button>
                <button <?php echo $status_tombol ?> class="btn btn-success daftar_diklat" data-diklatid="<?php echo $diklat->id ?>">Ikuti Diklat</button>
                </div>
            </div>
        </div>
    </div>
</div>

