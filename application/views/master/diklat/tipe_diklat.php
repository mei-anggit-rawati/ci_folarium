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
                                        <a class="btn btn-primary btn-xs" data-toggle="modal" href="#modal_edit" onclick="showform(<?php echo $tipe->id ?>)"><i
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


<div class="modal fade" id="modal_edit">
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <h4><span id='' style="text-transform: uppercase;"></span>EDIT TIPE DIKLAT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" >
            <form method="POST" id="edit-form" action="<?php echo base_url('Master/edit_tipe_diklat');?>">
                    <div class="card-body">
                    <input type="hidden" class="form-control" name="id" required>
                        <div class="form-group">
                            <label for="">Kode Diklat</label>
                            <input type="text" class="form-control" name="tipe" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Diklat</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="">Singkatan</label>
                            <input type="text" class="form-control" name="singkat">
                        </div>

                    </div>
                    <div class="card-action" align="center">
                        <button type="submit" name="edit" id="" class="btn btn-success">
                            <i class="fa fa-save"></i>&nbsp;
                            Simpan
                        </button>
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
function showform(id) {
    var no = 1;
    $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>Master/tipe_edit_form",
        data: "id=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(id);
            //$('#detail_form').empty();
            $.each(response, function(i, item) {

                console.log(response);
                $("#edit-form [name=\"id\"]").val(item.id);
 	            $("#edit-form [name=\"tipe\"]").val(item.tipe);
 	            $("#edit-form [name=\"nama\"]").val(item.nama);
 	            $("#edit-form [name=\"singkat\"]").val(item.singkat);
            });
        }
    });
}
</script>


