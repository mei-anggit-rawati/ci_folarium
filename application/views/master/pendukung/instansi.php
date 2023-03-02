<div class="page-header">
    <h4 class="page-title">Data Instansi</h4>
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
            <a href="#">Data Pendukung</a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Instansi</a>
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
                    Tambah Instansi
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Instansi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($instansi as $instansi) :
                            $no++;
                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($instansi->nama) ?>
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
                <h4>TAMBAH INSTANSI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            
            <div class="form-group">
                        <label for="">Instansi</label>
                        <input type="text" class="form-control" name="instansi" placeholder="Nama Instansi" required>
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