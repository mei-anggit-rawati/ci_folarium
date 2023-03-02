<div class="page-header">
    <h4 class="page-title">Kata Alumni</h4>
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
            <a href="#">Kelola Portal</a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Kata Alumni</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                <a data-toggle="modal" href="#modal_tambah"
                    class="btn btn-primary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-plus"></i>
                    Tambah Kata Alumni
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Diklat</th>
                                <th>Nama Alumni</th>
                                <th>Uraian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($alumni as $alumni) :
                            $no++;
                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($alumni->nama) ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($alumni->alumni) ?>
                                </td>
                                <td width="500">
                                    <?php echo $alumni->note ?>
                                </td>
                                <td>
                                <a href="<?php echo base_url(); ?>Master/hapus_kata_alumni?id=<?php echo $alumni->id; ?>" class="btn btn-danger btn-round" title="Hapus"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class=" modal-content">
        <form action="" method="POST">
            <div class="modal-header">
                <h4>TAMBAH KATA ALUMNI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            
            <div class="form-group">
            <label for="">Tipe Diklat</label>
                        <select class="js-states form-control" name="tipe" id="tipe" required>
                            <option value="">-- PILIH DIKLAT --</option>
                            <?php
                                        foreach ($diklat as $diklat) {
                                                echo "<option value=\"$diklat->tipe\">". strtoupper($diklat->nama)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                        <label for="">Nama Alumni</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Alumni" required>
                        <label for="">Uraian</label>
                        <input type="text" class="form-control" name="uraian" placeholder="Uraian Kesan/Pesan" required>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
            <button type="submit" name="publish" id="tambah_wilayah" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
            </div>
            </form>
        </div>
    </div>
</div>