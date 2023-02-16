<div class="page-header">
    <h4 class="page-title">User Management</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">User Management</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo base_url('Master/hak_akses') ?>"
                    class="btn btn-secondary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-key"></i>
                    Hak Akses
                </a>
                <a href="<?php echo base_url('Master/umana_tambah') ?>"
                    class="btn btn-primary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-plus"></i>
                    Tambah data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Instansi</th>
                                <th>Wilayah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($umana as $umana) :
                            $no++;
                            ?>
                            <tr id="<?php echo $umana->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $umana->nama ?>
                                </td>
                                <td>
                                    <?php echo $umana->level ?>
                                </td>
                                <td>
                                    <?php echo $umana->instansi ?>
                                </td>
                                <td>
                                    <?php echo $umana->daerah .', '.$umana->provinsi ?>
                                </td>
                                <td>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-primary btn-xs" data-toggle="modal"
                                            onclick="showuserdetail(<?php echo $umana->id ?>)"
                                            href="#modal_userDetail"><i class="fa fa-search"></i>&nbsp;DETAIL</a>
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

<div class="modal fade" id="modal_userDetail">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h4><span id='nama' style="text-transform: uppercase;"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
                <div id="table-scroll" class="table-scroll">
                    <table class="display table table-striped table-hover">
                        <tbody id="detail_tabel">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
function showuserdetail(id) {
    var no = 1;
    $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>Master/umana_detail",
        data: "id=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(id);
            $('#detail_tabel').empty();
            $.each(response, function(i, item) {
                if (item.allow == 1) {
                    var status = 'Aktif';
                } else {
                    var status = 'Non-aktif';
                }
                var html_code = "<tr><th>Username </th><th>:</th><td>" + item.user + "</td></tr>";
                html_code += "<tr><th>Nama </th><th>:</th><td>" + item.nama + "</td></tr>";
                html_code += "<tr><th>Level </th><th>:</th><td>" + item.level + "</td></tr>";
                html_code += "<tr><th>Instansi </th><th>:</th><td>" + item.instansi + "</td></tr>";
                html_code += "<tr><th>Wilayah </th><th>:</th><td>" + item.daerah + ", " + item
                    .provinsi +
                    "</td></tr>";
                html_code += "<tr><th>Status </th><th>:</th><td>" + status + "</td></tr>";
                $('#detail_tabel').append(html_code);
                $('#nama').text(item.nama);
            });
        }
    });
}
</script>