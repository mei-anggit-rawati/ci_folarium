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
endforeach; 
if ($diklat->status == 1) {
    $status = '<span class="badge badge-count badge-success">Dalam Proses</span>';
} else {
    $status = '<span class="badge badge-count badge-danger">Sudah Selesai</span>';
}

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-with-nav">
            <div class="card-header">
                <div class="row row-nav-line">
                    <ul class="nav nav-line nav-secondary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Detail Diklat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Hasil Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Sertifikat</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content mt-2 mb-3" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                                    <h5><?php echo $diklat->mulai; ?> s/d <?php echo $diklat->sampai; ?></h5>
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

                    </div>
                </div>


                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Jenis test</th>
                                        <th>Waktu Pengerjaan</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Salah</th>
                                        <th>Skor (Max. nilai/100)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            foreach ($hasil_pre as $hasil_pre) :
                            // $skor_tertinggi_pre = max($hasil_pre->jml_bnr_pre, $hasil_pre->jml_slh_pre);
                            // $nilai = ($skor_tertinggi_pre*10);

                            if ($hasil_pre->pre_test == 1) {
                                $status_tombol = 'style="pointer-events: none;"';
                            } else {
                                $status_tombol = '';
                            }
                            ?>
                            
                                    <tr id="<?php echo $hasil_pre->id_diklat; ?>">
                                        <td align="center">
                                            1
                                        </td>
                                        <td>
                                            PRE-TEST
                                        </td>
                                        <td align="center">
                                            <?php echo $hasil_pre->wkt_pre ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_pre->jml_bnr_pre ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_pre->jml_slh_pre ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_pre->nilai ?>  
                                        </td>
                                        <td align="center">
                                            <div class="form-button-action btn-group-horizontal">
                                                <a <?php echo $status_tombol ?> class="btn btn-success btn-xs" href="<?php echo base_url(); ?>User/persiapan?kdiklat=<?php echo $_GET['kdiklat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&exam=1"><i
                                                        class="fa fa-pencil"></i>&nbsp;KERJAKAN</a>
                                            </div>
                                        </td> 
                                        <!-- style="pointer-events: none;" -->
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php
                            foreach ($hasil_post as $hasil_post) :
                            $skor_tertinggi_post = max($hasil_post->jml_bnr_post, $hasil_post->jml_slh_post);
                            $nilai_post = ($skor_tertinggi_post*10);

                            if ($hasil_pre->pre_test == 0 AND $hasil_post->post_test == 0) {
                                $status_tombol2 = 'style="pointer-events: none;"';
                            } elseif ($hasil_pre->pre_test == 1 AND $hasil_post->post_test == 1) {
                                $status_tombol2 = 'style="pointer-events: none;"';
                            } else {
                                $status_tombol2 = '';
                            }
                            ?>

                                    <tr id="<?php echo $hasil_post->id_diklat; ?>">
                                        <td align="center">
                                            2
                                        </td>
                                        <td>
                                            POST-TEST
                                        </td>
                                        <td align="center">
                                            <?php echo $hasil_post->wkt_post ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_post->jml_bnr_post ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_post->jml_slh_post ?>
                                        </td>
                                        <td align="center">
                                        <?php echo $hasil_post->nilai ?>
                                        </td>
                                        <td align="center">
                                            <div class="form-button-action btn-group-horizontal">
                                                <a <?php echo $status_tombol2 ?> class="btn btn-success btn-xs" href="<?php echo base_url(); ?>User/persiapan?kdiklat=<?php echo $_GET['kdiklat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&exam=2"><i
                                                        class="fa fa-pencil"></i>&nbsp;KERJAKAN</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Diklat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($diklat->status == 1) {
                                $status_tombol = 'style="pointer-events: none;"';
                            } else {
                                $status_tombol = '';
                            }
                            ?>
                        <tr>
                                <td>1</td>
                                <td><?php echo $diklat->nama; ?></td>
                                <td><a <?php echo $status_tombol; ?> class="btn btn-success btn-xs" href="<?php echo base_url(); ?>User/sertifikat?kdiklat=<?php echo $_GET['kdiklat']?>&tipe=<?php echo $_GET['tipe']?>" target="_blank"><i
                                                        class="fa fa-download"></i>&nbsp;Unduh Sertifikat</a></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>


        </div>
    </div>
</div>