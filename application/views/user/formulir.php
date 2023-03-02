<div class="page-header">
    <h4 class="page-title">Formulir Riwayat Hidup</h4>
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
            <a href="#">Formulir Riwayat Hidup</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Induk Kependudukan (NIK) </label>
                                <input type="text" class="form-control input-solid"
                                    value="<?php echo $_SESSION['nik'] ?>" readonly name="nik"
                                    placeholder="Nomor Induk Kependudukan"
                                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57){return false;}'
                                    maxlength="16">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control input-solid"
                                    value="<?php echo $_SESSION['nama'] ?>" name="nama_lengkap"
                                    placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="">Tempat / Tanggal Lahir</label>
                                <div class="form-inline">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control input-solid" name="tempat"
                                            placeholder="">
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control input-solid" name="tanggal"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Agama / Kepercayaan</label>
                                <select class="form-control input-solid" id="selectFloatingLabel2" name="agama">
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
                            <div class="form-group">
                                <label for="">Alamat Rumah</label>
                                <textarea type="text" class="form-control input-solid" name="alamat_rumah"
                                    placeholder="Alamat Rumah"></textarea>
                            </div>

                            <small id="" class="form-text text-muted">CIRI FISIK :</small>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control input-solid" id="selectFloatingLabel2" name="jk">
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
                            <div class="form-group">
                                <label for="">Tinggi Badan / Berat Badan</label>
                                <div class="form-inline">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" aria-describedby="basic-addon2"
                                            name="tb">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">CM</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon2"
                                            name="bb">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">KG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Golongan Darah</label>
                                <input type="text" class="form-control input-solid" placeholder="Golongan Darah"
                                    name="goldar">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Nomor Telp/WA</label>
                                <input type="text" class="form-control input-solid" name="no_telp"
                                    placeholder="Nomor Telp/WA"
                                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57){return false;}'>
                            </div>
                            <div class="form-group">
                                <label for="">Pendidikan Terakhir</label>
                                <select class="form-control input-solid" id="selectFloatingLabel2" name="pend_terakhir">
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
                            <div class="form-group">
                                <label for="">Kursus</label>
                                <input type="text" class="form-control input-solid" name="kursus" placeholder="Kursus">
                            </div>
                        </div>


                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control input-solid" name="nip"
                                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57){return false;}'
                                    maxlength="16" placeholder="Nomor Induk Pegawai">
                            </div>
                            <div class="form-group">
                                <label for="">Pangkat / Golongan</label>
                                <input type="text" class="form-control input-solid" name="pangkat_gol"
                                    placeholder="Pangkat / Golongan">
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control input-solid" name="jabatan"
                                    placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="">Instansi</label>
                                <input type="text" class="form-control input-solid" name="instansi"
                                    placeholder="Nama Instansi">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Instansi</label>
                                <textarea type="text" class="form-control input-solid" name="alamat_instansi"
                                    placeholder="Alamat Instansi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Status Menikah</label>
                                <select class="form-control input-solid" id="selectFloatingLabel2"
                                    name="status_menikah">
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
                            <div class="form-group">
                                <label for="">Nama Istri/Suami</label>
                                <input type="text" class="form-control input-solid" name="nama_sutri"
                                    placeholder="Nama Istri/Suami">
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Istri/Suami</label>
                                <input type="text" class="form-control input-solid" name="job_sutri"
                                    placeholder="Pekerjaan Istri/Suami">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" class="form-control input-solid" name="nama_ibu"
                                    placeholder="Nama Ibu">
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" class="form-control input-solid" name="job_ibu"
                                    placeholder="Pekerjaan Ibu">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Saudara / Anak</label>
                                <input type="text" class="form-control input-solid" name="jml_sdr_ank"
                                    placeholder="Jumlah Saudara / Anak">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action" align="center">
                    <button type="submit" name="publish" id="" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
                    <button class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>