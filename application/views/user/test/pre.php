<div class="page-header">
    <h4 class="page-title">PRE-TEST</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="<?php echo base_url(); ?>Master">
                <i class="fa fa-clock-o"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="#"></a>
        </li>
    </ul>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Materi :
            <?php
            foreach ($materi_diklat as $materi) :
            ?>
                <h5> - <?php echo $materi->mapel ?></h5>
            <?php endforeach; ?>
            </div>
            <div class="card-body">
            <form action="<?php echo base_url('User/selesai_pretest');?>" method="POST" enctype="multipart/form-data">
            <?php
            $no = 0;
            foreach ($list_soal as $soal) :
            $no++;
            ?>
            <div class="alert alert-success col-md-12 alert-dismissible" role="alert">
            <table border="0" >
                <tr>
                    <td> <h3><a class="btn btn-default btn-xs btn-round"><?php echo $no ?></a>      
                <?php echo $soal->soal ?> </h3>
                <input type="hidden" name="id_soal" value="<?php echo $soal->id ?>"/></td>
                <input type="hidden" name="id_peserta" value="<?php echo $_GET['kdiklat'] ?>"/></td>
                
                </tr>
                <tr>
                    <td><h3><input type="radio" name="pilihan[<?php echo $soal->id ?>]" value="A"/>&nbsp;&nbsp;A. <?php echo $soal->opsi_a ?></h3></td>
                </tr>
                <tr>
                    <td><h3><input type="radio" name="pilihan[<?php echo $soal->id ?>]" value="B"/>&nbsp;&nbsp;B. <?php echo $soal->opsi_b ?></h3></td>
                </tr>
                <tr>
                    <td><h3><input type="radio" name="pilihan[<?php echo $soal->id ?>]" value="C"/>&nbsp;&nbsp;C. <?php echo $soal->opsi_c ?></h3></td>
                </tr>
                <tr>
                    <td><h3><input type="radio" name="pilihan[<?php echo $soal->id ?>]" value="D"/>&nbsp;&nbsp;D. <?php echo $soal->opsi_d ?></h3></td>
                </tr>
                <tr>
                    <td><h3><input type="radio" name="pilihan[<?php echo $soal->id ?>]" value="E"/>&nbsp;&nbsp;E. <?php echo $soal->opsi_e ?></h3></td>
                </tr>
                
            </table>    
            </div>
            <?php endforeach; ?>
            <input type="hidden" name="jml_soal" value="<?php echo $no ?>"/></td>
            <div class="col-md-4" style=" display: flex; align-items: center;">
            <button type="submit" name="simpan" class="btn btn-success btn-block" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')">
                        SELESAIKAN PRE-TEST
                    </button></div>
            </form>
            </div>
        </div>
    </div>
</div>
