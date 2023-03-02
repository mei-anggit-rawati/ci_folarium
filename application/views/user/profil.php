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
                <form action="<?php echo base_url('User/update_profil');?>" method="POST" enctype="multipart/form-data">    
                <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik" placeholder=""
                                        value="<?php echo $profil->nik; ?>" readonly>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" placeholder=""
                                        value="<?php echo $profil->nama_lengkap; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat" placeholder=""
                                        value="<?php echo $profil->tempat_lahir; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="datepicker" name="tanggal"
                                        value="<?php echo $profil->tgl_lahir; ?>" placeholder=" ">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder=""
                                        value="<?php echo $profil->email; ?>" readonly>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>No. Telp/WA</label>
                                    <input type="number" class="form-control" name="no_telp" placeholder=""
                                        value="<?php echo $profil->no_telp; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pendidikan Terakhir</label>
                                    <select id="" class="form-control single col-md-11" name="pend_terakhir">
                                    <?php
                                    foreach (getPendidikan() as $pend => $key) {
                                        if ($profil->pend_terakhir == $pend) {
                                            echo "<option value=\"$pend\" selected>". $key."</option>";  
                                        } else {
                                            echo "<option value=\"$pend\">". $key."</option>"; 
                                        }
                                              
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Kursus</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->kursus; ?>"
                                        name="kursus" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                    <label>Alamat Rumah</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->alamat_rumah; ?>"
                                        name="alamat_rumah" placeholder="">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jenis Kelamin</label>
                                    <select id="" class="form-control single col-md-11" name="jk">
                                    <?php
                                    foreach (getJK() as $jk => $key) {
                                        if ($profil->fsk_jk == $jk) {
                                            echo "<option value=\"$jk\" selected>". $key."</option>";  
                                        } else {
                                            echo "<option value=\"$jk\">". $key."</option>"; 
                                        }
                                              
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Status Menikah</label>
                                    <select id="" class="form-control single col-md-11" name="status_menikah">
                                    <?php
                                    foreach (getNikah() as $nikah => $key) {
                                        if ($profil->status_nikah == $nikah) {
                                            echo "<option value=\"$nikah\" selected>". $key."</option>";  
                                        } else {
                                            echo "<option value=\"$nikah\">". $key."</option>"; 
                                        }
                                              
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Agama / Kepercayaan</label>
                                    <select id="" class="form-control single col-md-11" name="agama">
                                    <?php
                                    foreach (getAgama() as $agama => $key) {
                                        if ($profil->agama == $agama) {
                                            echo "<option value=\"$agama\" selected>". $key."</option>";  
                                        } else {
                                            echo "<option value=\"$agama\">". $key."</option>"; 
                                        }
                                              
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Istri/Suami</label>
                                    <input type="text" class="form-control" name="nama_sutri" placeholder=""
                                        value="<?php echo $profil->nm_sutri; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Istri/Suami</label>
                                    <input type="text" class="form-control" name="job_sutri" placeholder=""
                                        value="<?php echo $profil->job_sutri; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder=""
                                        value="<?php echo $profil->nm_ibu; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" name="job_ibu" placeholder=""
                                        value="<?php echo $profil->job_ibu; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jumlah Saudara/Anak</label>
                                    <input type="text" class="form-control" name="jml_sdr_ank" placeholder=""
                                        value="<?php echo $profil->jml_sdr_ank; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Tinggi Badan (Cm)</label>
                                    <input type="text" class="form-control" name="tb" placeholder=""
                                        value="<?php echo $profil->fsk_tb; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Berat Badan (Kg)</label>
                                    <input type="text" class="form-control" name="bb" placeholder=""
                                        value="<?php echo $profil->fsk_bb; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Golongan Darah</label>
                                    <input type="text" class="form-control" value="<?php echo $profil->fsk_goldar; ?>"
                                        name="goldar" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-3">
                        <button class="btn btn-success btn-block" name="profil">Simpan Data Profil</button>
                    </div>
                    </div>
                    </form>
                </div>


                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form action="<?php echo base_url('User/update_instansi');?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>NIP</label>
                                    <input type="hidden" class="form-control" name="nik" placeholder="" value="<?php echo $profil->nik; ?>" readonly>
                                    <input type="text" class="form-control" name="nip" placeholder=""
                                        value="<?php echo $profil->nip; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Pangkat/Golongan</label>
                                    <input type="text" class="form-control" name="pangkat_gol" placeholder=""
                                        value="<?php echo $profil->pangkat_gol; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" placeholder=""
                                        value="<?php echo $profil->jabatan; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control" name="instansi" value="<?php echo $profil->instansi; ?>">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Alamat Instansi</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $profil->alamat_instansi; ?>" name="alamat_instansi"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" name="profil">Simpan Data Instansi</button>
                    </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="card-body">
                <a class="btn btn-primary btn-round ml-auto btn-sm mr-2" data-toggle="modal" href="#modal_berkas"><i
                        class="fa fa-plus"></i>&nbsp;Upload Berkas</a>
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
                                <a href="<?php echo base_url(); ?>User/hapus_file_user?id=<?php echo $berkas->id; ?>" class="btn btn-danger btn-round" title="Hapus"><i class="fa fa-trash"></i></a>
                                
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
    </div>
    <div class="col-md-4">
        <div class="card card-profile card-secondary">
            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                    <?php
                                if ($profil->foto_profil == '') { ?>
                                    <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>uploads/foto_profil/<?php echo $profil->foto_profil; ?>" alt="..." class="avatar-img rounded-circle">
                                <?php } ?>
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name"><?php echo $_SESSION['nama'] ?></div>
                    <div class="job"><?php echo $_SESSION['email'] ?></div>
                    <div class="view-profile">
                        <a data-toggle="modal" href="#modal_tambah" class="btn btn-secondary btn-block">Ubah Foto Profil</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class=" modal-content">
        <form action="<?php echo base_url('User/update_foto_profil');?>" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h4>UPDATE FOTO PROFILE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            <div class="form-group">
            <label for="">File Foto (JPG/JPEG/PNG)</label>
            <input type="file" class="form-control" name="berkas" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
            <button type="submit" name="publish" id="tambah" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_berkas">
    <div class="modal-dialog">
        <div class=" modal-content">
        <form action="<?php echo base_url('User/tambah_berkas');?>" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h4>UPLOAD BERKAS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            <div class="form-group">
            <label>Jenis Berkas</label>
            <select id="" class="form-control col-md-11" name="jenis">
            <?php
            foreach (getBerkas() as $berkas => $key) {
                echo "<option value=\"$berkas\">". $key."</option>"; 
            }
            ?>
            </select>
            <label for="">File Foto (JPG/JPEG/PNG/PDF)</label>
            <input type="file" class="form-control" name="berkas" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
            <button type="submit" name="publish" id="tambah" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
            </div>
            </form>
        </div>
    </div>
</div>