<div class="page-header">
    <h4 class="page-title">Profil Saya</h4>
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
            <a href="#">Profil Saya</a>
        </li>
    </ul>
</div>

<?php
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
                                    <h5><?php echo $profil->pendidikan; ?></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Jenis Kelamin</label><br>
                                            <h5><?php echo $profil->fsk_tb; ?> Cm</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Agama / Kepercayaan</label><br>
                                            <h5><?php echo $profil->fsk_bb; ?> Kg</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Status Menikah</label>
                                    <select class="form-control" id="gender">
                                        <option>Menikah</option>
                                        <option>Female</option>
                                    </select>
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
                    <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a
                        copy. The copy warned the Little Blind Text, that where it came from it would have been
                        rewritten a thousand times and everything that was left from its origin would be the word "and"
                        and the Little Blind Text should turn around and return to its own, safe country.</p>

                    <p> But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their</p>
                </div>
            </div>


        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile card-secondary">
            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name"><?php echo $_SESSION['nama'] ?></div>
                    <div class="job"><?php echo $_SESSION['email'] ?></div>
                    <div class="view-profile">
                        <a href="#" class="btn btn-secondary btn-block">Ubah Foto Profil</a>
                    </div>
                    <div class="text-center mt-3 mb-3">
                        <button class="btn btn-success btn-block">Simpan Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>