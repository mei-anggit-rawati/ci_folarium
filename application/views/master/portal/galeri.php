<link href="<?php echo base_url('assets/utama/css/style.css'); ?>" rel="stylesheet">
<div class="page-header">
    <h4 class="page-title">Galeri Diklat</h4>
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
            <a href="#">Kelola Portal</a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Galeri Diklat</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                <a data-toggle="modal" href="#modal_tambah"
                    class="btn btn-primary btn-round ml-auto btn-sm mr-2">
                    <i class="fa fa-plus"></i>
                    Upload Galeri
                </a>
            </div>

            <div class="card-body">
                <section id="portfolio" class="clearfix">
                <div class="container">
                    <div class="row portfolio-container">
                    <?php
                            $no = 0;
                            foreach ($galeri as $galeri) :
                            $no++;
                            ?>
                            <div class="col-lg-3 col-md-3 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="<?php echo base_url(); ?>uploads/galeri/<?php echo $galeri->file; ?>"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4 style="color:red"><?php echo strtoupper($galeri->nama) ?></h4>
                                    <div>
                                        <a href="<?php echo base_url(); ?>uploads/galeri/<?php echo $galeri->file; ?>"
                                            data-lightbox="portfolio" data-title="<?php echo strtoupper($galeri->nama) ?>" class="link-preview"
                                            title="Preview"><i class="fa fa-eye"></i></a>
                                        <a href="<?php echo base_url(); ?>Master/hapus_file_galeri?id=<?php echo $galeri->id; ?>" class="link-details" title="Hapus"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        <?php endforeach; ?>
                        </div>
                        </div>
                        </div>
                        </section>
                            
                       
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class=" modal-content">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h4>GALERI DIKLAT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="bodymodal_userDetail">
            
            <div class="form-group">
            <label for="">Nama/Keterangan Foto</label>
            <input type="text" class="form-control" name="nama" required>
            <label for="">File Foto (JPG/JPEG/PNG)</label>
            <input type="file" class="form-control" name="berkas" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
            <button type="submit" name="publish" id="tambah_wilayah" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
            </div>
            </form>
        </div>
    </div>
</div>
