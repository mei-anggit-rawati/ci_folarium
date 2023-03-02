<?php
ini_set('display_errors', 0);
?>
<div class="page-header">
    <h4 class="page-title">Peserta Diklat</h4>
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
            <a href="#">Peserta Diklat</a>
        </li>
    </ul>
</div>

<?php
foreach ($peserta_diklat as $diklat) :
endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo $diklat->nama_diklat; ?>
                <a class="btn btn-success btn-sm ml-auto btn-sm mr-2" href="<?php echo base_url(); ?>Master/nilai_test?id=<?php echo $_GET['id']?>" target="_blank"><i
                                                        class="fa fa-download"></i>&nbsp;Unduh Nilai Test</a>
                                                        </h5>
                                                    </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>NIK/NIP</th>
                                <th>Nama Peserta</th>
                                <th>Pendidikan</th>
                                <th>Pangkat / Jabatan</th>
                                <th>Instansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($peserta_diklat as $peserta) :
                            $no++;
                            ?>
                            <tr id="<?php echo $peserta->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $peserta->nik .' /<br> '. $peserta->nip ?>
                                </td>
                                <td>
                                    <?php echo $peserta->nama_lengkap ?>
                                </td>
                                <td align="center">
                                    <?php echo $peserta->pendidikan ?>
                                </td>
                                <td>
                                    <?php echo $peserta->pangkat_gol .' <br> '. $peserta->jabatan ?>
                                </td>
                                <td>
                                    <?php echo $peserta->instansi .' <br> '. $peserta->alamat_instansi ?>
                                </td>
                                <td>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-primary btn-xs"
                                            href="<?php echo base_url(); ?>Master/detail_peserta?id=<?php echo $diklat->id ?>"><i
                                                class="fa fa-search"></i>&nbsp;Detail Peserta</a>
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