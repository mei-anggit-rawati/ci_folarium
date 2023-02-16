<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>
            <?php echo SITE_NAME . ' : LOGIN' ?>
        </title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="<?php echo base_url('assets/img/pktj.png'); ?>" type="image/x-icon" />

        <!-- Fonts and icons -->
        <script src="<?php echo base_url('assets/js/plugin/webfont/webfont.min.js'); ?>"></script>
        <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands"
                ],
                urls: ["<?php echo base_url('assets/css/fonts.css')?>"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        </script>


        <!-- Main Stylesheet File -->
        <link href="<?php echo base_url('assets/utama/css/style.css'); ?>" rel="stylesheet">


        <!-- CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/azzara.min.css'); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    </head>
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <a href="<?php echo base_url();?>" class="scrollto"><img
                        src="<?php echo base_url(); ?>assets/utama/img/pktj.png" alt="" class="img-fluid">
                    <span style="font-size: 13px; font-weight:bold; padding-top:20px">POLITEKNIK KESELAMATAN
                        TRANSPORTASI JALAN</span>
                </a>
            </div>
        </div>
    </header>

    <br><br><br>

    <body class="login">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center"><b>Register</b> Diklat PKTJ Tegal</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-box px-3" autocomplete="off"
                                    action="<?php echo base_url('Register/validasi');?>">
                                    <div class="login-form">
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control" name="idcard" placeholder=""
                                                onKeypress='if(event.keyCode < 48 || event.keyCode > 57){return false;}'
                                                maxlength="16" required>
                                            <label for="fullname" class="placeholder">NIK (16
                                                digit)</label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input id="" name="usrnm" type="text" class="form-control"
                                                autocomplete="off" required>
                                            <label for="" class="placeholder">Username</label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input id="" name="nm_lgkp" type="text" class="form-control" required>
                                            <label for="" class="placeholder">Nama Lengkap</label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input id="" name="email" type="email" class="form-control" required>
                                            <label for="" class="placeholder">Alamat Email</label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="">Instansi</label>
                                            <select id="" class="form-control single" name="instansi">
                                                <option value="">--Pilih Instansi--</option>
                                                <?php
                                                foreach ($instansi as $instansi) {
                                                    echo "<option value=\"$instansi->id\">". strtoupper($instansi->nama)."</option>";       
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <label for="">Wilayah</label>
                                            <select id="" class="form-control single" name="wilayah">
                                                <option value="">--Pilih Wilayah--</option>
                                                <?php
                                                foreach ($wilayah as $wilayah) {
                                                    echo "<option value=\"$wilayah->id\">". strtoupper($wilayah->daerah.", ".$wilayah->provinsi)."</option>";       
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group form-floating-label">
                                            <input id="password" name="password" type="password" class="form-control"
                                                required>
                                            <label for="password" class="placeholder">Password</label>
                                            <div class="show-password">
                                                <i class="flaticon-interface"></i>
                                            </div>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input id="confirmpassword" name="confirmpassword" type="password"
                                                class="form-control" required>
                                            <label for="confirmpassword" class="placeholder">Confirm
                                                Password</label>
                                            <div class="show-password">
                                                <i class="flaticon-interface"></i>
                                            </div>
                                        </div>
                                        <div class="row form-sub m-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="agree"
                                                    id="agree">
                                                <label class="custom-control-label" for="agree">I Agree the terms
                                                    and
                                                    conditions.</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-action mb-3" align="center">
                                            <button type="submit" id="success_register"
                                                class="btn btn-primary btn-rounded btn-login">
                                                Register
                                            </button>
                                        </div>
                                        <div class="login-account" align="center">
                                            <span class="msg">Sudah memiliki akun?</span>
                                            <a href="<?php echo base_url('Login');?>" class="link">Login</a>
                                        </div>
                                    </div>
                                </form>
                                <?php if($this->session->flashdata('msg')): ?>
                                <div class="card card-stats card-danger card-round">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <span onclick="this.parentElement.style.display=`none`"
                                                class="close">&times;</span>
                                            <?php echo $this->session->flashdata('msg');?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                    <script src="<?php echo base_url('assets/js/core/jquery.3.2.1.min.js'); ?>"></script>
                    <script src="<?php echo base_url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>">
                    </script>
                    <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
                    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
                    <script src="<?php echo base_url('assets/js/ready.js'); ?>"></script>
    </body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(".single").select2({
    allowClear: true
});

$(".multiple").select2({
    allowClear: true
});
</script>

<script src="<?php echo base_url('assets/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>
<script>
var SweetAlert2Demo = function() {

    $('#success_register').click(function(e) {
        swal({
            title: 'Berhasil Registrasi!',
            icon: "success",
            timer: 20000,
            buttons: {
                confirm: {
                    className: 'btn btn-success'
                }
            },
        });
    });

    return {
        init: function() {
            initDemos();
        },
    };
}();

jQuery(document).ready(function() {
    SweetAlert2Demo.init();
});
</script>