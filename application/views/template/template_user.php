<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>
            <?php echo SITE_NAME . ': ' . ucfirst($this->uri->segment(1)) . ' - ' . ucfirst($this->uri->segment(2)); ?>
        </title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="<?php echo base_url('assets/img/pktj.png'); ?>" type="image/x-icon" />
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
                urls: [<?php echo base_url('assets/css/fonts.css'); ?>]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        </script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/azzara.min.css'); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <div class="main-header" data-background-color="blue">
                <div class="logo-header">
                    <a href="index.html" class="logo">
                        <h3 style="color:white; font-weight:bold; padding-top:15px">PKTJ TEGAL</h3>
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="navbar-minimize">
                        <button class="btn btn-minimize btn-rounded">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>

                <nav class="navbar navbar-header navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse" id="search-nav">
                        </div>
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="..."
                                            class="avatar-img rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img
                                                    src="<?php echo base_url(); ?>assets/img/avatar.png"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['nama'] ?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['nik'] ?></p>
                                                <p class="text-muted"><?php echo $_SESSION['nm_instansi'] ?></p>
                                                <p class="text-muted"><?php echo $_SESSION['nm_daerah'] ?>,
                                                    <?php echo $_SESSION['nm_provinsi'] ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>Login/logout"><i
                                                class="fa fa-sign-out"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>

            <div class="sidebar">
                <div class="sidebar-background"></div>
                <div class="sidebar-wrapper scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="avatar-sm float-left mr-2">
                                <img src="<?php echo base_url(); ?>assets/img/avatar.png" alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        <?php echo $_SESSION['nama'] ?>
                                        <span class="user-level">Peserta</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="#profile">
                                                <span class="link-collapse">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item active">
                                <a href="<?php echo base_url(); ?>User">
                                    <i class="fa fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#base">
                                    <i class="fa fa-list"></i>
                                    <p>Diklat</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="base">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="<?php echo base_url(); ?>User/diklat?tahun=<?php echo date('Y')?>">
                                                <span class="sub-item">Daftar Diklat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>User/diklat_saya">
                                                <span class="sub-item">Diklat Saya</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>User/profil">
                                    <i class="fa fa-user"></i>
                                    <p>Profil Saya</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>Login/logout">
                                    <i class="fa fa-sign-out"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <?php echo $content;?>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="<?php echo base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>

        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js">
        </script>

        <!-- jQuery Scrollbar -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

        <!-- Moment JS -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/moment/moment.min.js"></script>

        <!-- Chart JS -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

        <!-- jQuery Sparkline -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Circle -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

        <!-- Datatables -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- Bootstrap Toggle -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

        <!-- jQuery Vector Maps -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

        <!-- Google Maps Plugin -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/gmaps/gmaps.js"></script>

        <!-- Sweet Alert -->
        <script src="<?php echo base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Azzara JS -->
        <script src="<?php echo base_url(); ?>assets/js/ready.min.js"></script>

        <!-- Azzara DEMO methods, don't include it in your project! -->
        <script src="<?php echo base_url(); ?>assets/js/setting-demo.js"></script>
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

<script>
$(document).ready(function() {
    $('#basic-datatables').DataTable({});

    $('#multi-filter-select').DataTable({
        "pageLength": 5,
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $(
                        '<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });

    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action =
        '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action
        ]);
        $('#addRowModal').modal('hide');

    });
});
</script>

<script src="<?php echo base_url('assets/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>
<script>
var SweetAlert2Demo = function() {

    $('#tambah_user').click(function(e) {
        swal({
            title: 'Berhasil Tambah User!',
            icon: "success",
            timer: 20000,
            buttons: {
                confirm: {
                    className: 'btn btn-success'
                }
            },
        });
    });
    $('#edit_user').click(function(e) {
        swal({
            title: 'Berhasil Edit User!',
            icon: "success",
            timer: 20000,
            buttons: {
                confirm: {
                    className: 'btn btn-success'
                }
            },
        });
    });


    $('.daftar_diklat').on('click', function(e) {
        var diklatid = $(this).data("diklatid");

        swal({
            title: 'Yakin daftar diklat ini?',
            text: "Anda hanya dapat mengikuti 1 (satu) diklat per-tahun.",
            type: 'warning',
            buttons: {
                cancel: {
                    visible: true,
                    className: 'btn btn-default'
                },
                confirm: {
                    text: 'Ya, Daftar!',
                    className: 'btn btn-success'
                },
            }
        }).then((Delete) => {
            if (Delete) {
                $(location).attr('href', '<?php echo base_url() ?>User/daftar_diklat?id=' +
                diklatid);
                swal({
                    title: 'Sukses Daftar Diklat!',
                    text: 'Setelah ini anda dapat mengikuti Pre-Test.',
                    type: 'success',
                    icon: "success",
                    buttons: false,
                    timer: 20000,
                });

            } else {
                swal.close();
            }
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