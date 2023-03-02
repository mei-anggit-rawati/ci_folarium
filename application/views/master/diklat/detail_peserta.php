<?php
ini_set('display_errors', 0);
?>
<div class="page-header">
    <h4 class="page-title">Profil Peserta Diklat</h4>
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
            <a href="#">Profil Peserta Diklat</a>
        </li>
    </ul>
</div>

<?php
$arr_jk = array(1=>"Pria",2=>"Wanita");
$arr_agama = array(1=>"Islam",2=>"Kristen",3=>"Budha",4=>"Hindu",5=>"Konghucu");
$arr_nikah = array(1=>"Sudah Menikah",2=>"Belum Menikah");
$arr_pendidikan = array(1=>"SD",2=>"SMP",3=>"SLTA SEDERAJAT",4=>"D3",5=>"S1",6=>"S2",7=>"S3");
foreach ($profil as $profil) :
endforeach; 
?>

<div class="row">
    <div class="col-md-8">
        <div class="card card-with-nav">
            <div class="card-header">
                <div class="row row-nav-line">
                    <ul class="nav nav-line nav-secondary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Instansi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Berkas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content mt-2 mb-3" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>NIK</label><br>
                                    <h5><?php echo $profil->nik; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Lengkap</label><br>
                                    <h5><?php echo $profil->nama_lengkap; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Tempat, Tanggal Lahir</label><br>
                                    <h5><?php echo $profil->tempat_lahir; ?>, <?php echo $profil->tgl_lahir; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Email</label><br>
                                    <h5><?php echo $profil->email; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>No. Telp/WA</label><br>
                                    <h5><?php echo $profil->no_telp; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Alamat Rumah</label><br>
                                    <h5><?php echo $profil->alamat_rumah; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pendidikan Terakhir</label><br>
                                    <h5><?php echo $arr_pendidikan[$profil->pend_terakhir]; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Kursus</label><br>
                                    <h5><?php echo $profil->kursus; ?></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Jenis Kelamin</label><br>
                                            <h5><?php echo $arr_jk[$profil->fsk_jk]; ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Agama / Kepercayaan</label><br>
                                            <h5><?php echo $arr_agama[$profil->agama]; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Status Menikah</label>
                                    <h5><?php echo $arr_nikah[$profil->status_nikah]; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Istri/Suami</label><br>
                                    <h5><?php echo $profil->nm_sutri; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Istri/Suami</label><br>
                                    <h5><?php echo $profil->job_sutri; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Ibu</label><br>
                                    <h5><?php echo $profil->nm_ibu; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Ibu</label><br>
                                    <h5><?php echo $profil->job_ibu; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jumlah Saudara/Anak</label><br>
                                    <h5><?php echo $profil->jml_sdr_ank; ?></h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tinggi Badan</label><br>
                                            <h5><?php echo $profil->fsk_tb; ?> Cm</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Berat Badan</label><br>
                                            <h5><?php echo $profil->fsk_bb; ?> Kg</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Gol. Darah</label><br>
                                            <h5><?php echo $profil->fsk_goldar; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>NIP</label><br>
                                    <h5><?php echo $profil->nip; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pangkat/Golongan</label><br>
                                    <h5><?php echo $profil->pangkat_gol; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jabatan</label><br>
                                    <h5><?php echo $profil->jabatan; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Instansi</label><br>
                                    <h5><?php echo $profil->instansi; ?></h5>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Alamat Instansi</label><br>
                                    <h5><?php echo $profil->alamat_instansi; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Berkas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $arr_jen = array(1=>"Pas Foto Terbaru",2=>"Scan KTP",3=>"Scan Ijazah Asli",4=>"Scan Transkip Asli",5=>"Scan Surat Pengantar");
                            foreach ($berkas as $berkas) :
                                $jenis = $berkas->jenis;
                            $no++;
                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $arr_jen[$jenis]  ?>
                                </td>
                                <td>
                                <a href="<?php echo base_url(); ?>uploads/berkas_user/<?php echo $berkas->file; ?>" target="_blank" class="btn btn-primary btn-round" title="Hapus"><i class="fa fa-eye"></i></a>
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
    <div class="col-md-4">
        <div class="card card-profile card-secondary">
            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="<?php echo base_url(); ?>uploads/foto_profil/<?php echo $profil->foto_profil; ?>" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name"><?php echo $profil->nama_lengkap ?></div>
                    <div class="job"><?php echo $profil->jabatan ?></div>
                    <div class="view-profile">
                        <a onclick="history.back()" class="btn btn-default btn-block">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>