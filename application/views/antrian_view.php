<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="25"> -->
    <title>Antrian | Poli</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?php echo base_url(); ?>index3.html" class="navbar-brand">
                    <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">POLI</span>
                </a>


                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo base_url('skp'); ?>" class="nav-link">SKP</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('antrian_farmasi'); ?>" class="nav-link">Cetak Antrian</a>
                        </li>
                    </ul>
                </div> -->

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ANTRIAN <small>POLI</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Layout</a></li>
								<li class="breadcrumb-item active">Top Navigation</li>
							</ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-success card-outline">
                                <div class="card-header" style="text-align: center;">
                                    <!-- <h5 class="card-title m-0">ANTRIAN POLI </h5> -->
                                    <h1><b><span id="no_antrian"><?php echo $last_antrian['no_antrian']; ?></span></b></h1>
                                    <h1><b><span id="nama_poli"><?php echo $last_antrian['nama_poli']; ?></span></b></h1>
                                    <h6><span id="id_antrian" name="id_antrian"><?php echo $last_antrian['id_antrian']; ?></span> - <span id="status_antrian" name="status_antrian"><?php echo $last_antrian['status']; ?></span> </h6>
                                    <input type="hidden" id="file_panggilan" value="<?php echo $last_antrian['file_panggilan']; ?>">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <div id="div_ket_seroja" class="alert alert-success alert-dismissible" style="display:none;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-info"></i> <span id="judul_ket_seroja"></span></h4>
                                                <p id="ket_seroja"></p>
                                            </div>
                                            <div class="card card-primary card-outline" style="text-align: center;">
                                                <div class="card-header">
                                                    <h3>Poli Seroja</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h1><b><span id="no_antrian_seroja"><?php echo $no_antrian_seroja; ?></span></b></h1>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">

                                            <div id="div_ket_mtbs" class="alert alert-success alert-dismissible" style="display:none;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-info"></i> <span id="judul_ket_mtbs"></span></h4>
                                                <p id="ket_mtbs"></p>
                                            </div>
                                            <div class="card card-primary card-outline" style="text-align: center;">
                                                <div class="card-header">
                                                    <h3>Poli MTBS</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h1><b><span id="no_antrian_mtbs"><?php echo $no_antrian_mtbs; ?></span></b></h1>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">

                                            <div id="div_ket_gizi" class="alert alert-success alert-dismissible" style="display:none;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-info"></i> <span id="judul_ket_gizi"></span></h4>
                                                <p id="ket_gizi"></p>
                                            </div>
                                            <div class="card card-primary card-outline" style="text-align: center;">
                                                <div class="card-header">
                                                    <h3>Poli Gizi</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h1><b><span id="no_antrian_gizi"><?php echo $no_antrian_gizi; ?></span></b></h1>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>



                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Puskesmas Kecamatan Matraman
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="https://puskesmasmatraman.jakarta.go.id/">Puskesmas Kecamatan Matraman</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script> -->




</body>

<script>
    let status_audio = "";
    let music = new Audio();
    let no_antrian = document.getElementById("no_antrian").innerHTML;
    let arr_pending_umum = [];
    window.setTimeout("refreshListAntrian()", 1000);

    function audioAntrian(arrAntrian) {
        jum = arrAntrian.length;
        music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/nomor antrian/nomor antrian.mp3";
        music.play();
        music.onended = function() {
            music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[0] + ".mp3";
            music.play();
            music.onended = function() {
                if (jum == 1) {
                    endingAudio();
                } else {
                    music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[1] + ".mp3";
                    music.play();
                    music.onended = function() {
                        if (jum == 2) {
                            endingAudio();
                        } else {
                            music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[2] + ".mp3";
                            music.play();
                            music.onended = function() {
                                if (jum == 3) {
                                    endingAudio();
                                } else {
                                    music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[3] + ".mp3";
                                    music.play();
                                    music.onended = function() {
                                        if (jum == 4) {
                                            endingAudio();
                                        } else {
                                            music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[4] + ".mp3";
                                            music.play();
                                            music.onended = function() {
                                                if (jum == 5) {
                                                    endingAudio();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    function endingAudio() {
        music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/silahkan menuju ke.mp3";
        music.play();
        music.onended = function() {
            music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + $('#file_panggilan').val();
            music.play();
            music.onended = function() {
                music.pause;
                status_audio = "end";
                return;
            }
        }
    }

    function splitNo(angka_int) {
        angka = String(angka_int);
        // console.log(angka)
        if (angka == 0 || angka == '') {
            arr = [0];
        } else {
            var arrAngka = angka.split('');
            var pemisah = "";
            if (arrAngka.length == 2) {
                if (angka == "10") {
                    arr = ["sepuluh"];
                } else if (angka == "11") {
                    arr = ["sebelas"];
                } else if (angka >= 12 && angka <= 19) {
                    arr = [arrAngka[1], "belas"];
                } else if (angka == "20" || angka == "30" || angka == "40" || angka == "50" || angka == "60" || angka == "70" || angka == "80" || angka == "90") {
                    arr = [arrAngka[0], "puluh"];
                } else {
                    arr = [arrAngka[0], "puluh", arrAngka[1]];
                }
            } else if (arrAngka.length == 3) {
                if (arrAngka[0] == 1) {
                    if (angka == "100") {
                        arr = ["seratus"];
                    } else if (angka >= 101 && angka <= 109) {
                        arr = ["seratus", arrAngka[2]];
                    } else if (angka == 110) {
                        arr = ["seratus", "sepuluh"];
                    } else if (angka == 111) {
                        arr = ["seratus", "sebelas"];
                    } else if (angka >= 112 && angka <= 119) {
                        arr = ["seratus", arrAngka[2], "belas"];
                    } else if (angka == "120" || angka == "130" || angka == "140" || angka == "150" || angka == "160" || angka == "170" || angka == "180" || angka == "190") {
                        arr = ["seratus", arrAngka[1], "puluh"];
                    } else {
                        arr = ["seratus", arrAngka[1], "puluh", arrAngka[2]];
                    }
                } else {
                    if (arrAngka[1] + arrAngka[2] >= "01" && arrAngka[1] + arrAngka[2] <= "09") {
                        arr = [arrAngka[0], "ratus", arrAngka[2]];
                    } else if (arrAngka[1] + arrAngka[2] == "10") {
                        arr = [arrAngka[0], "ratus", "sepuluh"];
                    } else if (arrAngka[1] + arrAngka[2] == "11") {
                        arr = [arrAngka[0], "ratus", "sebelas"];
                    } else if (arrAngka[1] + arrAngka[2] >= "12" && arrAngka[1] + arrAngka[2] <= "19") {
                        arr = [arrAngka[0], "ratus", arrAngka[2], "belas"];
                    } else if (arrAngka[1] + arrAngka[2] == "20" || arrAngka[1] + arrAngka[2] == "30" || arrAngka[1] + arrAngka[2] == "40" || arrAngka[1] + arrAngka[2] == "50" || arrAngka[1] + arrAngka[2] == "60" || arrAngka[1] + arrAngka[2] == "70" || arrAngka[1] + arrAngka[2] == "80" || arrAngka[1] + arrAngka[2] == "90") {
                        arr = [arrAngka[0], "ratus", arrAngka[1], "puluh"];
                    } else {
                        arr = [arrAngka[0], "ratus", arrAngka[1], "puluh", arrAngka[2]];
                    }
                }
            } else {
                arr = [arrAngka[0]];
            }
        }
        return arr;
    }

    function setCardPoli(id_poli, no_antrian) {
        if (id_poli == "16") {
            $("#no_antrian_seroja").html(no_antrian);
            $('#judul_ket_seroja').html('Berhasil');
            $('#ket_seroja').html('Berhasil dipanggil');
            $('#div_ket_seroja').show();
            $("#div_ket_seroja").fadeTo(1500, 500).slideUp(500, function() {
                $("#div_ket_seroja").hide();
            });

        } else if (id_poli == "6") {
            $("#no_antrian_mtbs").html(no_antrian);
            $('#judul_ket_mtbs').html('Berhasil');
            $('#ket_mtbs').html('Berhasil dipanggil');
            $('#div_ket_mtbs').show();
            $("#div_ket_mtbs").fadeTo(1500, 500).slideUp(500, function() {
                $("#div_ket_mtbs").hide();
            });

        } else if (id_poli == "9") {
            $("#no_antrian_gizi").html(no_antrian);
            $('#judul_ket_gizi').html('Berhasil');
            $('#ket_gizi').html('Berhasil dipanggil');
            $('#div_ket_gizi').show();
            $("#div_ket_gizi").fadeTo(1500, 500).slideUp(500, function() {
                $("#div_ket_gizi").hide();
            });
        }
    }

    function refreshListAntrian() {
        setTimeout("refreshListAntrian()", 1000);
        // var dataArray = {
        //     "status": "next"
        // }

        $.ajax({

            type: "GET",
            // data: dataArray,
            dataType: "html",
            url: '<?php echo base_url('antrian/refreshTable'); ?>',
            success: function(msg) {
                obj = JSON.parse(msg);
                // console.log(obj);

                if ($("#id_antrian").html() != obj.id_antrian) {
                    console.log("Detected..");

                    if (obj.status == "next") {
                        console.log("Panggil Antrian ", obj.nama_poli, " ke ", obj.no_antrian)
                        arrAntrian = splitNo(obj.no_antrian);
                        audioAntrian(arrAntrian);

                    } else if (obj.status == "reply") {
                        console.log("Panggil Ulang Antrian ", obj.nama_poli, " ke ", obj.no_antrian)
                        arrAntrian = splitNo(obj.no_antrian);
                        audioAntrian(arrAntrian);

                    } else if (obj.status == "manual") {
                        console.log("Panggil Manual Antrian ", obj.nama_poli, " ke ", obj.no_antrian)
                        arrAntrian = splitNo(obj.no_antrian);
                        audioAntrian(arrAntrian);

                    }

                    setCardPoli(obj.poli, obj.no_antrian);
                    $("#id_antrian").html(obj.id_antrian);
                    $("#no_antrian").html(obj.no_antrian);
                    $("#nama_poli").html(obj.nama_poli);
                    $("#file_panggilan").val(obj.file_panggilan);
                    $("#status").html(obj.status);

                } else {
                    console.log("Scanning");
                }

            }


            // }
        });
    }
</script>

</html>