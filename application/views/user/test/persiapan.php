<div class="page-header">
    <h4 class="page-title">PRE-TEST</h4>
</div>

<?php
foreach ($lihat_diklat as $diklat) :
endforeach; 

if ($diklat->status == 0) {
    $status = '<span class="badge badge-count badge-warning">Sedang Berlangsung</span>';
} else {
    $status = '<span class="badge badge-count badge-success">Selesai</span>';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-with-nav">
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
                                    <label>Waktu Ujian : </label><br>
                                    <h5>30 Menit</h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Total Soal</label><br>
                                    <h5>30 Soal</h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Ketentuan Pengerjaan : </label><br>
                                    <h5>- Soal berbentuk Pilihan Ganda, pilihlah jawaban yang benar dan tepat.</h5>
                                    <h5>- Waktu akan dimulai otomatis begitu klik "Mulai Mengerjakan".</h5>
                                    <h5>- Apabila sudah selesai mengerjakan, klik Submit untuk mengirim jawaban.</h5>
                                    <h5>- Apabila melebihi waktu dari waktu hitung mundur, maka jawaban yg sudah terjawab akan otomatis terkirim.</h5>
                                </div>
                                

                            </div>
                        </div>
                        <h3>Materi Pre-Test</h3>
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
                        <a class="btn btn-success btn-round ml-auto mr-2" href="<?php echo base_url(); ?>User/mengerjakan?kdiklat=<?php echo $_GET['kdiklat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&exam=<?php echo $_GET['exam']; ?>"><i
                                                        class="fa fa-pencil"></i>&nbsp;Mulai Mengerjakan</a>
                </div>

                    </div>
        </div>
    </div>
</div>