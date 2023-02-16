<div class="page-header">
    <h4 class="page-title">Diklat <?php echo $_GET['tahun'] ?></h4>
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
            <a href="#">Daftar Diklat</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="GET" id="form_id">
                    <div class="col-md-12">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-1 col-form-label">Pilih Tahun</label>
                            <div class="col-md-3 ">
                                <select class="js-states form-control single" name="tahun"
                                    onChange="document.getElementById('form_id').submit();">
                                    <option>--PILIH TAHUN--</option>
                                    <?php
                                                $now = date('Y') + 1;
                                                for ($a = 2022; $a <= $now; $a++) {
                                                    if ($_GET['tahun'] == $a) {
                                                        echo "<option value='$a' selected>$a</option>";
                                                    } else {
                                                        echo "<option value='$a'>$a</option>";
                                                    }
                                                }
                                                ?>
                                </select>
                            </div>
                            <a href="<?php echo base_url('Master/tipe_diklat') ?>"
                                class="btn btn-secondary btn-round ml-auto btn-sm mr-2">
                                <i class="fa fa-key"></i>
                                Tipe Diklat
                            </a>
                            <a href="<?php echo base_url('Master/form_diklat') ?>"
                                class="btn btn-primary btn-round btn-sm">
                                <i class="fa fa-plus"></i>
                                Tambah data
                            </a>
                        </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Diklat</th>
                                <th>Angkatan</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Tempat Pelaksanaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($diklat as $diklat) :
                            $no++;
                            ?>
                            <tr id="<?php echo $diklat->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $diklat->nama_diklat ?>
                                </td>
                                <td align="center">
                                    <?php echo $diklat->angkatan ?>
                                </td>
                                <td align="center">
                                    <?php echo $diklat->mulai .' s/d '. $diklat->sampai ?>
                                </td>
                                <td align="center">
                                    <?php echo $diklat->tempat ?>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="fa fa-search"></i> AKSI</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?php echo base_url(); ?>Master/lihat_diklat?kdiklat=<?php echo $diklat->id ?>&tipe=<?php echo $diklat->tipe ?>">Detail
                                                        Diklat</a>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="<?php echo base_url(); ?>Master/peserta_diklat?id=<?php echo $diklat->id ?>">Peserta
                                                        Diklat</a>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Ranking Ujian</a>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                    <button class="dropdown-item hapus_diklat">Hapus Diklat</button>
                                                </div>
                                            </div>
                                        </div>
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