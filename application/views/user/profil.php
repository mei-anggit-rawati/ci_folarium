<div class="page-header">
    <h4 class="page-title">Profil Saya</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>User">
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
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        value="<?php echo $profil->nik; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Lengkap</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->nama_lengkap; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Tempat Lahir</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->tempat_lahir; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="datepicker" name="datepicker"
                                        value="<?php echo $profil->tgl_lahir; ?>" placeholder="Birth Date">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->email; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>No. Telp/WA</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->no_telp; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Alamat Rumah</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->alamat_rumah; ?>"
                                        name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="gender">
                                        <option>Pria</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Status Menikah</label>
                                    <select class="form-control" id="gender">
                                        <option>Menikah</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Agama / Kepercayaan</label>
                                    <select class="form-control" id="gender">
                                        <option>Islam</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Istri/Suami</label>
                                    <input type="text" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->nm_sutri; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Istri/Suami</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->job_sutri; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Ibu</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->nm_ibu; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->job_ibu; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Tinggi Badan (Cm)</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->fsk_tb; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Berat Badan (Kg)</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->fsk_bb; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Golongan Darah</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->fsk_goldar; ?>"
                                        name="phone" placeholder="Phone">
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
                                    <label>NIP</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        value="<?php echo $profil->nip; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pangkat/Golongan</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->pangkat_gol; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jabatan</label>
                                    <input type="email" class="form-control" name="email" placeholder="Name"
                                        value="<?php echo $profil->jabatan; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->instansi; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Alamat Instansi</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $profil->alamat_instansi; ?>" name="address"
                                        placeholder="Address">
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