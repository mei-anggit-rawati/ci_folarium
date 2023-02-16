<div class="page-header">
    <h4 class="page-title">Kelola Materi</h4>
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
            <a href="#">Kelola Materi</a>
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
                            <label for="inlineinput" class="col-md-1 col-form-label">Pilih Diklat</label>
                            <div class="col-md-3 ">
                                <select class="js-states form-control single" name="diklat"
                                    onChange="document.getElementById('form_id').submit();">
                                    <option value="00">Semua Diklat</option>
                                    <?php
                                        foreach ($diklat as $diklat) {
                                            if ($diklat->tipe == $_GET['diklat']) {
                                                echo "<option value=\"$diklat->tipe\" selected> ". strtoupper($diklat->nama)."</option>";  
                                            } else {
                                                echo "<option value=\"$diklat->tipe\">". strtoupper($diklat->nama)."</option>"; 
                                            }
                                        }
                                        ?>
                                </select>
                            </div>

                        </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Diklat</th>
                                <th>Nama Materi</th>
                                <th>Teori</th>
                                <th>Praktek</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($materi as $materi) :
                            $no++;
                            ?>
                            <tr id="<?php echo $materi->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $materi->nama ?>
                                </td>
                                <td>
                                    <?php echo $materi->mapel ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi->teori ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi->praktek ?>
                                </td>
                                <td align="center">
                                    50
                                </td>
                                <td align="center">
                                    <div class="form-button-action mb-1">
                                        <a class="btn btn-success btn-xs btn-block"
                                            href="<?php echo base_url(); ?>Master/soal?materi=<?php echo $materi->id ?>&tipe=<?php echo $materi->tipe ?>"><i
                                                class="fa fa-database"></i>&nbsp;Bank Soal</a>
                                    </div>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-warning btn-xs" data-toggle="modal"
                                            onclick="showuserdetail(<?php echo $materi->id ?>)"
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