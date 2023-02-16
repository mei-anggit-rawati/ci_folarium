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
    </header><!-- #header -->


    <body class="login">
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
                <h3 class="text-center">Diklat PKTJ Tegal</h3>
                <form method="post" class="form-box px-3" action="<?php echo base_url('Login/autentikasi');?>">
                    <div class="login-form">
                        <div class="form-group form-floating-label">
                            <input id="username" name="username" type="text" class="form-control input-border-bottom"
                                required>
                            <label for="username" class="placeholder">Username / NIK</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="password" name="password" type="password"
                                class="form-control input-border-bottom" required>
                            <label for="password" class="placeholder">Password</label>
                            <div class="show-password">
                                <i class="flaticon-interface"></i>
                            </div>
                        </div>
                        <div class="row form-sub m-0">
                            <a href="#" class="link float-right">Lupa Password?</a>
                        </div>
                        <div class="form-action mb-3">
                            <button type="submit" class="btn btn-primary btn-rounded btn-login">
                                Login
                            </button>
                        </div>
                        <div class="login-account">
                            <span class="msg">Belum memiliki akun?</span>
                            <a href="<?php echo base_url('Register');?>" class="link">Daftar</a>
                        </div>
                    </div>
                </form>
                <?php if($this->session->flashdata('msg')): ?>
                <div class="card card-stats card-danger card-round">
                    <div class="row">
                        <div class="col col-stats">
                            <span onclick="this.parentElement.style.display=`none`" class="close">&times;</span>
                            <?php echo $this->session->flashdata('msg');?>
                        </div>
                    </div>
                </div>
                <?php endif ?>


            </div>

            <div class=" container container-signup animated fadeIn">
                <h3 class="text-center">Sign Up</h3>
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input id="fullname" name="fullname" type="text" class="form-control input-border-bottom"
                            required>
                        <label for="fullname" class="placeholder">Fullname</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="email" name="email" type="email" class="form-control input-border-bottom" required>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="passwordsignin" name="passwordsignin" type="password"
                            class="form-control input-border-bottom" required>
                        <label for="passwordsignin" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="confirmpassword" name="confirmpassword" type="password"
                            class="form-control input-border-bottom" required>
                        <label for="confirmpassword" class="placeholder">Confirm Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                            <label class="custom-control-label" for="agree">I Agree the terms and
                                conditions.</label>
                        </div>
                    </div>
                    <div class="form-action">
                        <a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
                        <a href="#" class="btn btn-primary btn-rounded btn-login">Sign Up</a>
                    </div>
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