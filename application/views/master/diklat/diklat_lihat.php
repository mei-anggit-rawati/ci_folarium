<div class="page-header">
    <h4 class="page-title">Detail Diklat</h4>
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
            <a href="#">Detail Diklat</a>
        </li>
    </ul>
</div>

<?php
foreach ($lihat_diklat as $diklat) :
    if ($diklat->status == 0) {
        $status = '<span class="badge badge-count badge-default">Belum Mulai</span>';
    } elseif ($diklat->status == 1) {
        $status = '<span class="badge badge-count badge-success">Dalam Proses</span>';
    } else {
        $status = '<span class="badge badge-count badge-danger">Sudah Selesai</span>';
    }
endforeach; 

foreach ($jml_pendaftar as $jml_pendaftar) :
endforeach; 

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo $diklat->nama_diklat; ?></h5>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Nama Diklat :</label><br>
                            <h5><?php echo $diklat->nama; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Angkatan ke-</label>
                            <h5><?php echo $diklat->angkatan; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Nomor SK : </label><br>
                            <h5><?php echo $diklat->sk; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Nomor Sertifikat : </label>
                            <h5><?php echo $diklat->no_sertifikat; ?></h5><br>
                            <label>Tanggal Sertifikat : </label>
                            <h5><?php echo tgl($diklat->tgl_sertif); ?></h5><br>
                            <label>Penandatangan Sertifikat : </label>
                            <h5><?php echo $diklat->nama_dir; ?> / NIP. <?php echo $diklat->nip_dir; ?></h5><br>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Waktu Pelaksanaan : </label><br>
                            <h5><?php echo tgl($diklat->mulai); ?> s/d <?php echo tgl($diklat->sampai); ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Tempat Pelaksanaan </label><br>
                            <h5><?php echo $diklat->tempat; ?></h5>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Jumlah Pendaftar / Kuota Pendaftaran : </label><br>
                            <h5><?php echo $jml_pendaftar->jml_pendaftar; ?> orang</h5>
                        </div>
                        <div class="form-group form-group-default">
                                    <label>Status Diklat : </label><br>
                                    <h5><?php echo $status; ?></h5>
                                </div>

                    </div>
                </div>
                <br>
                <a class="btn btn-primary btn-round ml-auto btn-sm mr-2" data-toggle="modal" href="#modal_tambah"><i
                        class="fa fa-plus"></i>&nbsp;Tambah Materi Diklat</a>
                <div class="table-responsive">
                    <table id="" class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Dosen</th>
                                <th>Jml Teori</th>
                                <th>Jml Praktek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($materi_diklat as $materi_diklat) :
                            $no++;
                            ?>
                            <tr id="<?php echo $materi_diklat->id; ?>">
                                <td align="center">
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $materi_diklat->mapel ?>
                                </td>
                                <td>
                                    <?php echo $materi_diklat->dosen ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi_diklat->teori ?>
                                </td>
                                <td align="center">
                                    <?php echo $materi_diklat->praktek ?>
                                </td>
                                <td align="center">
                                <a href="<?php echo base_url('Master/hapus_materi_diklat?id='.$materi_diklat->id.'&kdiklat='.$_GET['kdiklat'].'&tipe='.$_GET['tipe']) ?>"
                                class="btn btn-danger btn-round ml-auto btn-sm mr-2">
                                <i class="fa fa-trash"></i>
                                Hapus
                            </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-6 mb-6">
                    <button class="btn btn-default" onclick="history.back()">Kembali</button>
                    <button class="btn btn-success">Update
                        Diklat</button>
                    <button class="btn btn-primary" data-toggle="modal" href="#modal_selesai">Ubah Status Diklat</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h3>Tambah Materi Diklat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="<?php echo base_url('Master/tambah_materi_diklat');?>">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" name="kdiklat" value="<?php echo $_GET['kdiklat']?>">
                        <input type="hidden" class="form-control" name="tipe" value="<?php echo $_GET['tipe']?>">
                        <label for="">Materi</label>
                            <select class="form-control " name="materi" id="materi">
                            <option value="">-- Pilih Materi --</option>
                            <?php
                                        foreach ($materi as $materi) {
                                                echo "<option value=\"$materi->id\">". strtoupper($materi->mapel)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                            

                        </div>
                        <div class="form-group">
                            <label for="">Dosen</label>
                            <select class="form-control" name="dosen" id="dosen">
                            <option value="">-- Pilih Dosen --</option>
                            <?php
                                        foreach ($dosen as $dosen) {
                                                echo "<option value=\"$dosen->id\">". strtoupper($dosen->nama)."</option>"; 
                               
                                        }
                                        ?>
                        </select>
                        </div>

                    </div>
                    <div class="card-action" align="center">
                        <button type="submit" name="publish" id="tambah_tipe" class="btn btn-success">
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


<div class="modal fade" id="modal_selesai">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h3>Ubah Status Diklat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="<?php echo base_url('Master/ubah_status_diklat');?>">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" name="kdiklat" value="<?php echo $_GET['kdiklat']?>">
                        <input type="hidden" class="form-control" name="tipe" value="<?php echo $_GET['tipe']?>">
                            <label for="">Status Diklat</label>
                            <select id="" class="form-control col-md-11" name="status">
                                    <?php
                                    foreach (getStatusDiklat() as $status => $key) {
                                        if ($diklat->status == $status) {
                                            echo "<option value=\"$status\" selected>". $key."</option>";  
                                        } else {
                                            echo "<option value=\"$status\">". $key."</option>"; 
                                        }
                                              
                                    }
                                    ?>
                                    </select>

                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Sertifikat</label>
                            <input type="date" class="form-control" name="tgl_sertif" value="<?php echo $diklat->tgl_sertif?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penandatangan Sertifikat</label>
                            <input type="text" class="form-control" name="nama_dir" value="<?php echo $diklat->nama_dir?>">
                        </div>
                        <div class="form-group">
                            <label for="">NIP Penandatangan Sertifikat</label>
                            <input type="text" class="form-control" name="nip_dir" value="<?php echo $diklat->nip_dir?>">
                        </div>

                    </div>
                    <div class="card-action" align="center">
                        <button type="submit" name="publish" id="tambah_tipe" class="btn btn-success">
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