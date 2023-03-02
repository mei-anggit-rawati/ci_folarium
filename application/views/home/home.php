<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title> <?php echo SITE_NAME . ' : HOME' ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="<?php echo base_url(); ?>assets/utama/img/pktj.png" rel="icon">
        <link href="<?php echo base_url(); ?>assets/utama/img/pktj.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
            rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="<?php echo base_url('assets/utama/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="<?php echo base_url('assets/utama/lib/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/utama/lib/animate/animate.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/utama/lib/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/utama/lib/owlcarousel/assets/owl.carousel.min.css'); ?>"
            rel="stylesheet">
        <link href="<?php echo base_url('assets/utama/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="<?php echo base_url('assets/utama/css/style.css'); ?>" rel="stylesheet">

        <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
    </head>

    <body>

        <!--==========================
  Header
  ============================-->
        <header id="header" class="fixed-top">
            <div class="container">

                <div class="logo float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                    <a href="#intro" class="scrollto"><img src="<?php echo base_url(); ?>assets/utama/img/pktj.png"
                            alt="" class="img-fluid">
                        <span style="font-size: 13px; font-weight:bold; padding-top:20px">POLITEKNIK KESELAMATAN
                            TRANSPORTASI JALAN</span>
                    </a>
                </div>

                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="#intro">Home</a></li>
                        <li><a href="#about">Jadwal Diklat</a></li>
                        <li><a href="#why-us">Informasi</a></li>
                        <li><a href="#portfolio">Galeri</a></li>
                        <li><a href="#testimonials">Alumni</a></li>
                        <li><a href="#contact">Kontak</a></li>
                        <li><a href="<?php echo base_url(); ?>Login" style="color:white"
                                class="btn btn-primary btn-rounded btn-login">LOGIN</a>
                        </li>
                    </ul>
                </nav><!-- .main-nav -->

            </div>
        </header><!-- #header -->

        <!--==========================
    Intro Section
  ============================-->
        <section id="intro" class="clearfix">
            <div class="container">

                <div class="intro-img">
                    <img src="<?php echo base_url(); ?>assets/utama/img/intro-img.svg" alt="" class="img-fluid">
                </div>

                <div class="intro-info">
                    <h2>Segera daftar!<br><span>SIAP DIKLAT</span><br>PKTJ Tegal</h2>
                    <div>
                        <a href="<?php echo base_url(); ?>Login" class="btn-get-started scrollto">LOGIN <span
                                class="fa fa-arrow-right"></span></a>
                        <a href="<?php echo base_url(); ?>Register" class="btn-services scrollto">REGISTER <span
                                class="fa fa-arrow-right"></span></a>
                    </div>
                </div>

            </div>
        </section><!-- #intro -->

        <main id="main">

            <!--==========================
      About Us Section
    ============================-->
            <section id="about">
                <div class="container">

                    <header class="section-header">
                        <h3>Jadwal Diklat</h3>
                    </header>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Diklat</th>
                                                    <th>Tahun</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($rilis_jadwal as $jadwal) :
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td width="50" align="center">
                                                        <?php echo $no; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo strtoupper($jadwal->nama) ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo strtoupper($jadwal->tahun) ?>
                                                    </td>
                                                    <td align="center">
                                                        <div style="color:white"
                                                            class="form-button-action btn-group-horizontal">
                                                            <a href="<?php echo base_url(); ?>uploads/jadwal/<?php echo $jadwal->file; ?>" target="_blank" class="btn btn-success btn-xs">Lihat Jadwal</a>
                                                        </div>
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
            </section><!-- #about -->


            <!--==========================
      Why Us Section
    ============================-->
            <section id="why-us" class="wow fadeIn">
                <div class="container">
                    <header class="section-header">
                        <h3>Informasi</h3>
                    </header>

                    <div class="row row-eq-height justify-content-center">
                        <div class="col-lg-4 mb-4">
                            <div class="card wow bounceInUp">
                                <i class="fa fa-sitemap"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Alur Pendaftaran</h5>
                                    <p class="card-text">Lihat alur, tahapan pendaftaran diklat pada link dibawah ini.
                                    </p>
                                    <a href="#" class="readmore">Read more </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="card wow bounceInUp">
                                <i class="fa fa-question-circle"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Buku Panduan</h5>
                                    <p class="card-text">Lihat buku panduan mengerjakan Pre/Post-Test pada link
                                        dibawah ini.</p>
                                    <a href="#" class="readmore">Read more </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="card wow bounceInUp">
                                <i class="fa fa-certificate"></i>
                                <div class="card-body">
                                    <h5 class="card-title">Sertifikat Sudah Cetak</h5>
                                    <p class="card-text">Lihat sertifikat yang sudah dicetak pada link dibawah ini. </p>
                                    <a href="#" class="readmore">Read more </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==========================
      Portfolio Section
    ============================-->
            <section id="portfolio" class="clearfix">
                <div class="container">

                    <header class="section-header">
                        <h3 class="section-title">Galeri Diklat</h3>
                    </header>
                    <div class="row portfolio-container">
                    <?php
                                                $no = 0;
                                                foreach ($galeri as $galeri) :
                                                $no++;
                                                ?>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="<?php echo base_url(); ?>uploads/galeri/<?php echo $galeri->file; ?>"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                <h4 style="color:red"><?php echo strtoupper($galeri->nama) ?></h4>
                                    <div>
                                        <a href="<?php echo base_url(); ?>uploads/galeri/<?php echo $galeri->file; ?>"
                                            data-lightbox="portfolio" data-title=<?php echo strtoupper($galeri->nama) ?>" class="link-preview"
                                            title="Preview"><i class="ion ion-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </section><!-- #portfolio -->

            <!--==========================
      Clients Section
    ============================-->
            <section id="testimonials" class="section-bg">
                <div class="container">

                    <header class="section-header">
                        <h3>Alumni Diklat</h3>
                    </header>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <div class="owl-carousel testimonials-carousel wow fadeInUp">
                            <?php
                                                $no = 0;
                                                foreach ($alumni as $alumni) :
                                                $no++;
                                                ?>

                                <div class="testimonial-item">
                                    <img src="<?php echo base_url(); ?>assets/img/avatar.png"
                                        class="testimonial-img" alt="">
                                    <h3><?php echo strtoupper($alumni->alumni) ?></h3>
                                    <h4><?php echo strtoupper($alumni->nama) ?></h4>
                                    <p>
                                    <?php echo $alumni->note ?>
                                    </p>
                                </div>
                                <?php endforeach; ?>

                            </div>

                        </div>
                    </div>


                </div>
            </section><!-- #testimonials -->


            <!--==========================
      Contact Section
    ============================-->
            <section id="contact">
                <div class="container-fluid">
                    <header class="section-header">
                        <h3>Kontak</h3>
                    </header>
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 footer-info">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.176136522056!2d109.14261821477255!3d-6.869486695035831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbfcb9d0bfb8f%3A0x6d0465b97b0034a5!2sPoliteknik%20Keselamatan%20Transportasi%20Jalan!5e0!3m2!1sid!2sid!4v1673423978121!5m2!1sid!2sid"
                                        frameborder="0" style="border:0; width: 100%; height: 312px;"
                                        allowfullscreen></iframe>
                                </div>

                                <div class="col-lg-6 col-md-6 footer-contact">
                                    <p>
                                        Jl. Perintis Kemerdekaan, Slerok, Tegal Timur, Kota Tegal <br>
                                        <strong>Phone:</strong> (0283) 351061<br>
                                        <strong>Email:</strong> pktj@pktj.ac.id<br>
                                    </p>

                                    <div class="social-links">
                                        <a href="https://twitter.com/PKTJ_Tegal" class="twitter"><i
                                                class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/PKTJTegal/" class="facebook"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/pktj_tegal/" class="instagram"><i
                                                class="fa fa-instagram"></i></a>
                                        <a href="https://www.youtube.com/channel/UC9BbdnU-cczfaZ5FHulYPZA"
                                            class="youtube"><i class="fa fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- #contact -->

        </main>

        <!--==========================
    Footer
  ============================-->
        <footer id="footer">


            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>POLITEKNIK KESELAMATAN TRANSPORTASI JALAN</strong>.
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- JavaScript Libraries -->
        <script src="<?php echo base_url(); ?>assets/utama/lib/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/jquery/jquery-migrate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/mobile-nav/mobile-nav.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/wow/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/waypoints/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/counterup/counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/utama/lib/lightbox/js/lightbox.min.js"></script>
        <!-- Contact Form JavaScript File -->
        <script src="<?php echo base_url(); ?>assets/utama/contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="<?php echo base_url(); ?>assets/utama/js/main.js"></script>

    </body>

</html>