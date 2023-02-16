<div class="page-header">
    <h4 class="page-title">Kelola Soal</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>Master">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Kelola Soal</a>
        </li>
    </ul>
</div>
<?php
foreach ($materi as $materi) :
endforeach; 
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>MATERI : <?php echo strtoupper($materi->mapel); ?></h5>
                <h5>DIKLAT : <?php echo strtoupper($materi->nama); ?></h5>
                <a href="<?php echo base_url('Master/umana_tambah') ?>"
                    class="btn btn-secondary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-eye"></i>
                    LIhat Pratinjau
                </a>
                <a href="<?php echo base_url('Master/umana_tambah') ?>"
                    class="btn btn-primary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-plus"></i>
                    Tambah data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Opsi Jawaban</th>
                                <th>Kunci Jawaban</th>
                                <th>Bobot Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($soal as $soal) :
                            $no++;
                            ?>
                            <tr id="<?php echo $soal->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $soal->soal ?>
                                </td>
                                <td>
                                    <?php echo '(A) '.$soal->opsi_a ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(B) '.$soal->opsi_b ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(C) '.$soal->opsi_c ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(D) '.$soal->opsi_d ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(E) '.$soal->opsi_e ?>
                                </td>
                                <td align="center">
                                    <?php echo $soal->jawaban ?>
                                </td>
                                <td align="center">
                                    <?php echo $soal->bobot ?>
                                </td>
                                <td align="center">
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-warning btn-xs" data-toggle="modal"
                                            onclick="showuserdetail(<?php echo $soal->id ?>)"
                                            href="#modal_userDetail"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                        <button class="btn btn-danger btn-xs hapus_user"><i
                                                class="fa fa-trash"></i>&nbsp;Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>