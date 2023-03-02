<div class="page-header">
    <h4 class="page-title">Kelola Soal</h4>
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
            <a href="#">Kelola Soal</a>
        </li>
    </ul>
</div>
<?php
foreach ($materi as $materi) :
endforeach; 
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>MATERI : <?php echo strtoupper($materi->mapel); ?></h5>
                <h5>DIKLAT : <?php echo strtoupper($materi->nama); ?></h5>
                <a data-toggle="modal" href="#modal_tambah"
                    class="btn btn-primary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-plus"></i>
                    Tambah Soal
                </a>
                <button onclick="history.back()" class="btn btn-default btn-round ml-auto btn-sm mr-2"><i class="fa fa-reply"></i>
                    Kembali</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Opsi Jawaban</th>
                                <th>Kunci Jawaban</th>
                                <th>Bobot Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($soal as $soal) :
                            $no++;
                            ?>
                            <tr id="<?php echo $soal->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $soal->soal ?>
                                </td>
                                <td>
                                    <?php echo '(A) '.$soal->opsi_a ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(B) '.$soal->opsi_b ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(C) '.$soal->opsi_c ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(D) '.$soal->opsi_d ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <?php echo '(E) '.$soal->opsi_e ?>
                                </td>
                                <td align="center">
                                    <?php echo $soal->jawaban ?>
                                </td>
                                <td align="center">
                                    <?php echo $soal->bobot ?>
                                </td>
                                <td align="center">
                                    <div class="form-button-action btn-group-horizontal">
                                    <a class="btn btn-warning btn-xs" data-toggle="modal" href="#modal_edit" 
                                    onclick="showform(<?php echo $soal->id ?>)"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                    <a href="<?php echo base_url(); ?>Master/hapus_soal?id=<?php echo $soal->id; ?>&materi=<?php echo $_GET['materi']?>&tipe=<?php echo $_GET['tipe']?>"class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i>Hapus</a>
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
                <h3>Tambah Soal Pilihan Ganda</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="<?php echo base_url('Master/tambah_soal');?>">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $_GET['materi']?>" name="matkul">
                        <input type="hidden" class="form-control" value="<?php echo $_GET['tipe']?>" name="tipe">

                            <label for="">Uraian Soal</label>
                            <textarea type="text" class="form-control" name="soal" placeholder="Uraian Soal"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Bobot Soal</label>
                                <input type="number" class="form-control" name="bobot" placeholder="0">
                                
                        </div>
                        <div class="form-group">
                            <label for="">Pilihan Jawaban</label>
                                <input type="text" class="form-control" name="opsi_a" placeholder="Opsi A">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_b" placeholder="Opsi B">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_c" placeholder="Opsi C">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_d" placeholder="Opsi D">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_e" placeholder="Opsi E">
                        </div>
                        <div class="form-group">
                            <label for="">Kunci Jawaban</label>
                            <select class="js-states form-control" name="kunci"required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                                
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
                <h3>Edit Soal Pilihan Ganda</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" id="edit-form" action="<?php echo base_url('Master/edit_soal');?>">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $_GET['materi']?>" name="matkul">
                        <input type="hidden" class="form-control" value="<?php echo $_GET['tipe']?>" name="tipe">

                        <input type="hidden" class="form-control" name="id">
                            <label for="">Uraian Soal</label>
                            <textarea type="text" class="form-control" name="soal" placeholder="Uraian Soal"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Bobot Soal</label>
                                <input type="number" class="form-control" name="bobot" placeholder="0">
                                
                        </div>
                        <div class="form-group">
                            <label for="">Pilihan Jawaban</label>
                                <input type="text" class="form-control" name="opsi_a" placeholder="Opsi A">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_b" placeholder="Opsi B">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_c" placeholder="Opsi C">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_d" placeholder="Opsi D">
                                <div role="separator" class="dropdown-divider"></div>
                                <input type="text" class="form-control" name="opsi_e" placeholder="Opsi E">
                        </div>
                        <div class="form-group">
                            <label for="">Kunci Jawaban</label>
                            <select class="js-states form-control" name="kunci"required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                                
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

<script>
function showform(id) {
    var no = 1;
    $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>Master/soal_detail",
        data: "id=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(id);
            //$('#detail_form').empty();
            $.each(response, function(i, item) {

                $("#edit-form [name=\"id\"]").val(item.id);
 	            $("#edit-form [name=\"soal\"]").val(item.soal);
 	            $("#edit-form [name=\"bobot\"]").val(item.bobot);
                 $("#edit-form [name=\"opsi_a\"]").val(item.opsi_a);
                 $("#edit-form [name=\"opsi_b\"]").val(item.opsi_b);
                 $("#edit-form [name=\"opsi_c\"]").val(item.opsi_c);
                 $("#edit-form [name=\"opsi_d\"]").val(item.opsi_d);
                 $("#edit-form [name=\"opsi_e\"]").val(item.opsi_e);
                 $("#edit-form [name=\"kunci\"]").val(item.jawaban);
            });
        }
    });
}
</script>