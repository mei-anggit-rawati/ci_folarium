<div class="page-header">
    <h4 class="page-title">Kelola Tipe Diklat</h4>
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
            <a href="#">Kelola Tipe Diklat</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-round ml-auto btn-sm mr-2" data-toggle="modal" href="#modal_tambah"><i
                        class="fa fa-plus"></i>&nbsp;Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Nama</th>
                                <th>Singkatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($tipe as $tipe) :
                            $no++;
                            ?>
                            <tr id="<?php echo $tipe->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $tipe->tipe ?>
                                </td>
                                <td>
                                    <?php echo $tipe->nama ?>
                                </td>
                                <td>
                                    <?php echo $tipe->singkat ?>
                                </td>
                                <td>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-primary btn-xs" data-toggle="modal" href="#modal_edit"><i
                                                class="fa fa-pencil"></i>&nbsp;Edit</a>
                                        <button class="btn btn-danger btn-xs hapus_tipe"><i
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

<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h3>Tambah Tipe Diklat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="<?php echo base_url('Master/tambah_tipe_diklat');?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Diklat</label>
                            <input type="text" class="form-control" name="tipe" placeholder="Tipe Diklat" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Diklat</label>
                            <textarea type="text" class="form-control" name="nama" placeholder="Nama Diklat"
                                required></textarea>

                        </div>
                        <div class="form-group">
                            <label for="">Singkatan</label>
                            <input type="text" class="form-control" name="singkat" placeholder="Singkatan Diklat"
                                required>
                        </div>

                    </div>
                    <div class="card-action" align="center">
                        <button type="submit" name="publish" id="tambah_materi" class="btn btn-success">
                            <i class="fa fa-save"></i>&nbsp;
                            Simpan
                        </button>
                        <button class="btn btn-default">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>