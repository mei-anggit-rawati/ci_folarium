<div class="page-header">
    <h4 class="page-title">Tambah User</h4>
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
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Tambah User</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nomor Induk Kependudukan (NIK) </label>
                        <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan"
                            onKeypress='if(event.keyCode < 48 || event.keyCode > 57){return false;}' maxlength="16">
                    </div>
                    <div class="form-group">
                        <label for="">Username & Password</label>
                        <select class="form-control input-solid" id="selectFloatingLabel2">
                            <option selected value="">DEFAULT</option>
                        </select>
                        <small id="" class="form-text text-muted">Default username & password menggunakan
                            NIK.</small>

                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level User</label>
                        <select id="" class="form-control single col-md-11" name="level" required>
                            <option value="">--Pilih Level--</option>
                            <?php
                        foreach ($hak_akses as $hak_akses) {
                            echo "<option value=\"$hak_akses->id\">$hak_akses->nama</option>";       
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Instansi</label>
                        <select id="" class="form-control single col-md-11" name="instansi">
                            <option value="">--Pilih Instansi--</option>
                            <?php
                        foreach ($instansi as $instansi) {
                            echo "<option value=\"$instansi->id\">". strtoupper($instansi->nama)."</option>";       
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Wilayah</label>
                        <select id="" class="form-control single col-md-11" name="wilayah">
                            <option value="">--Pilih Wilayah--</option>
                            <?php
                        foreach ($wilayah as $wilayah) {
                            echo "<option value=\"$wilayah->id\">". strtoupper($wilayah->daerah.", ".$wilayah->provinsi)."</option>";       
                        }
                        ?>
                        </select>
                    </div>

                </div>
                <div class="card-action" align="center">
                    <button type="submit" name="publish" id="tambah_user" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
                    <button class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>