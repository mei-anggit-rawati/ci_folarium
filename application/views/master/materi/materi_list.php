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
                            <a class="btn btn-primary btn-round ml-auto btn-sm mr-2" data-toggle="modal" href="#modal_tambah"><i
                        class="fa fa-plus"></i>&nbsp;Tambah Mata Pelajaran</a>

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
                                        <a class="btn btn-warning btn-xs" data-toggle="modal" href="#modal_edit" onclick="showform(<?php echo $materi->id ?>)"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                        <a href="<?php echo base_url(); ?>Master/hapus_materi?id=<?php echo $materi->id; ?>"class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i>Hapus</a>
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
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <h3>Tambah Mata Pelajaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="<?php echo base_url('Master/tambah_mapel_diklat');?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Diklat</label>
                            <select class="js-states form-control" name="tipe" id="tipe" required>
                            <option value="">-- PILIH DIKLAT --</option>
                            <?php
                                        foreach ($diklat2 as $diklat2) {
                                                echo "<option value=\"$diklat2->tipe\">". strtoupper($diklat2->nama)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mata Pelajaran</label>
                            <textarea type="text" class="form-control" name="nama" placeholder="Nama Mata Pelajaran"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Teori</label>
                            <input type="number" class="form-control" name="teori" placeholder="0">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Praktek</label>
                            <input type="number" class="form-control" name="praktek" placeholder="0">
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
                <h4><span id='' style="text-transform: uppercase;"></span>EDIT MATA PELAJARAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" >
            <form method="POST" id="edit-form" action="<?php echo base_url('Master/edit_materi');?>">
                    <div class="card-body">
                    <input type="hidden" class="form-control" name="id" required>
                    <div class="form-group">
                            <label for="">Kode Diklat</label>
                            <select class="js-states form-control" name="tipe" id="tipe" required>
                            <option value="">-- PILIH DIKLAT --</option>
                            <?php
                                        foreach ($diklat3 as $diklat3) {
                                                echo "<option value=\"$diklat3->tipe\">". strtoupper($diklat3->nama)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mapel" required>
                        </div>
                        <div class="form-group">
                            <label for="">Teori</label>
                            <input type="text" class="form-control" name="teori">
                        </div>
                        <div class="form-group">
                            <label for="">Praktek</label>
                            <input type="text" class="form-control" name="praktek">
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
        url: "<?php echo base_url() ?>Master/materi_detail",
        data: "id=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(id);
            //$('#detail_form').empty();
            $.each(response, function(i, item) {

                $("#edit-form [name=\"id\"]").val(item.id);
 	            $("#edit-form [name=\"tipe\"]").val(item.tipe);
 	            $("#edit-form [name=\"mapel\"]").val(item.mapel);
 	            $("#edit-form [name=\"teori\"]").val(item.teori);
                 $("#edit-form [name=\"praktek\"]").val(item.praktek);
            });
        }
    });
}
</script>