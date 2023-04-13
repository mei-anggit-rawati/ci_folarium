<div class="page-header">
    <h4 class="page-title">Master Pegawai</h4>
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
            <a href="#">Master Pegawai</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>JABATAN</th>
                                <th>KONTRAK</th>
                                <th>TMT</th>
                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($pegawai as $pegawai) :
                            $no++;
                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo ($pegawai['nip']) ?>
                                </td>
                                <td>
                                    <?php echo $pegawai['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $pegawai['jabatan_name'] ?>
                                </td>
                                <td>
                                    <?php echo $pegawai['kontrak_jangka'] ?>
                                </td>
                                <td>
                                    <?php echo tgl_waktu($pegawai['tmt']) ?>
                                </td>
                                <td>
                                <a class="btn btn-primary btn-round btn-xs" data-toggle="modal" onclick="showpegawaidetail(<?php echo $pegawai['pgw_id'] ?>)" href="#modal_detail"><i class="fa fa-eye"></i></a>
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

<div class="modal fade" id="modal_detail">
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <h4><span id='nama' style="text-transform: uppercase;"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_detail">
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
function showpegawaidetail(pgw_id) {
    $.ajax({
        type: "GET",
        url: "http://localhost/ci_folarium/api/getPegawaiDetail.php",
        data: "id_pegawai=" + pgw_id,
        dataType: "json",
        cache: false,
        success: function(response) {
            $('#detail_tabel').empty();
            $.each(response, function(i, item) {
                console.log(response);

                var html_code = "<tr><th>NIP </th><th>:</th><td>" + item['nip'] + "</td></tr>";                
                html_code += "<tr><th>NIK </th><th>:</th><td>" + item['nik'] + "</td></tr>";
                html_code += "<tr><th>Nama </th><th>:</th><td>" + item['full_name'] + "</td></tr>";
                html_code += "<tr><th>Tgl Lahir </th><th>:</th><td>" + item['birth_date'] + "</td></tr>";
                 html_code += "<tr><th>TMT </th><th>:</th><td>" + item['tmt'] + "</td></tr>";
                html_code += "<tr><th>Email </th><th>:</th><td>" + item['mail'] + "</td></tr>";
                html_code += "<tr><th>Telepon </th><th>:</th><td>" + item['telepon'] + "</td></tr>";
                html_code += "<tr><th>Alamat </th><th>:</th><td>" + item['address'] + "</td></tr>";
                html_code += "<tr><th>Jabatan </th><th>:</th><td>" + item['jabatan_name'] + "</td></tr>";
                html_code += "<tr><th>Jangka Kontrak </th><th>:</th><td>" + item['kontrak_jangka'] + "</td></tr>";
               
                $('#detail_tabel').append(html_code);
                $('#nama').text(item['full_name']);
            });
        }
    });
}
</script>