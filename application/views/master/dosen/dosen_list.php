<div class="page-header">
    <h4 class="page-title">Kelola Dosen</h4>
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
            <a href="#">Kelola Dosen</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
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
                                <th>NIK / NIP</th>
                                <th>Nama</th>
                                <th>Pangkat/ Jabatan/ Instansi</th>
                                <th>Email/Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($dosen as $dosen) :
                            $no++;
                            ?>
                            <tr id="<?php echo $dosen->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $dosen->nik .'/ <br>'.$dosen->nip ?>
                                </td>
                                <td>
                                    <?php echo $dosen->nama ?>
                                </td>
                                <td>
                                    <?php echo $dosen->pangkat .' <br>'.$dosen->jabatan .' <br>'.$dosen->instansi ?>
                                </td>
                                <td>
                                    <?php echo $dosen->email .'<br> '.$dosen->no_hp ?>
                                </td>
                                <td>
                                    <div class="form-button-action btn-group-horizontal">
                                        <a class="btn btn-primary btn-xs" data-toggle="modal"
                                            onclick="showuserdetail(<?php echo $dosen->id ?>)"
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
    <div class="modal-dialog modal-lg">
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
        url: "<?php echo base_url() ?>Master/dosen_detail",
        data: "id=" + id,
        dataType: "json",
        cache: false,
        success: function(response) {
            console.log(id);
            $('#detail_tabel').empty();
            $.each(response, function(i, item) {

                var html_code = "<tr><th>NIK </th><th>:</th><td>" + item.nik + "</td></tr>";
                html_code += "<tr><th>NIP </th><th>:</th><td>" + item.nip + "</td></tr>";
                html_code += "<tr><th>Nama </th><th>:</th><td>" + item.nama + "</td></tr>";
                html_code += "<tr><th>Tempat, Tgl Lahir </th><th>:</th><td>" + item.tempat_lhr +
                    ", " + item.tanggal_lhr + "</td></tr>";
                html_code += "<tr><th>Email </th><th>:</th><td>" + item.email + "</td></tr>";
                html_code += "<tr><th>Telepon </th><th>:</th><td>" + item.no_hp + "</td></tr>";
                html_code += "<tr><th>Pangkat </th><th>:</th><td>" + item.pangkat + "</td></tr>";
                html_code += "<tr><th>Jabatan </th><th>:</th><td>" + item.jabatan + "</td></tr>";
                html_code += "<tr><th>Instansi </th><th>:</th><td>" + item.instansi + "</td></tr>";
                html_code += "<tr><th>Alamat Instansi </th><th>:</th><td>" + item.a_instansi +
                    "</td></tr>";
                html_code += "<tr><th>Alamat Rumah </th><th>:</th><td>" + item.a_rumah +
                    "</td></tr>";
                $('#detail_tabel').append(html_code);
                $('#nama').text(item.nama);
            });
        }
    });
}
</script>