<div class="page-header">
    <h4 class="page-title">Diklat Saya</h4>
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
            <a href="#">Daftar Diklat Saya</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($diklat as $diklat) :
                            $no++;

                            if ($diklat->pre_test == 1) {
                                $pre_test = '<span class="badge badge-count badge-success">Pre-Test <i class="fa fa-check"></i></span>';
                            } else {
                                $pre_test = '';
                            }

                            if ($diklat->post_test == 1) {
                                $post_test = '<span class="badge badge-count badge-success">Post-Test <i class="fa fa-check"></i></span>';
                            } else {
                                $post_test = '';
                            }
                            ?>
                            <tr id="<?php echo $diklat->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $diklat->nama ?>
                                </td>
                                <td align="center">
                                    <?php echo $diklat->angkatan ?>
                                </td>
                                <td align="center">
                                    <?php echo tgl($diklat->mulai) .' s/d '. tgl($diklat->sampai) ?>
                                </td>
                                <td align="center">
                                    <?php echo $diklat->tempat ?>
                                </td>
                                <td align="center">
                                <?php echo $pre_test ?>
                                <br><br>
                                <?php echo $post_test ?>
                                </td>
                                <td>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-primary btn-xs"
                                            href="<?php echo base_url(); ?>User/lihat_diklat_saya?kdiklat=<?php echo $diklat->id ?>&tipe=<?php echo $diklat->tipe ?>"><i
                                                class="fa fa-search"></i>&nbsp;DETAIL</a>
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
