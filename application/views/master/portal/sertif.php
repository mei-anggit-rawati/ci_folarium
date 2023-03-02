<div class="page-header">
    <h4 class="page-title">Informasi Sertifikat</h4>
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
            <a href="#">Informasi Sertifikat</a>
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
                    Tambah Info Sertifikat
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Nama Diklat</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($sertif as $sertif) :
                            $no++;
                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($sertif->tahun) ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($sertif->nama) ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($sertif->tanggal) ?>
                                </td>
                                <td>
                                <a href="<?php echo base_url(); ?>uploads/sertifikat/<?php echo $sertif->file; ?>" target="_blank" class="btn btn-primary btn-round" title="Hapus"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo base_url(); ?>Master/hapus_file_sertif?id=<?php echo $sertif->id; ?>" class="btn btn-danger btn-round" title="Hapus"><i class="fa fa-trash"></i></a>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h4>TAMBAH INFORMASI SERTIFIKAT</h4>
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
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" name="tahun" required>
                        <label for="">File Jadwal (PDF)</label>
                        <input type="file" class="form-control" name="berkas" required>
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