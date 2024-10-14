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
    <title>Antrian | <?php echo $nama_poli; ?></title>

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
                <a href="<?php echo base_url(); ?>antrian_v2" class="navbar-brand">
                    <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">antrianPELAYANAN</span>
                </a>


                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo base_url('antrian_v2'); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a href="<?php echo base_url('antrian_farmasi'); ?>" class="nav-link">Cetak Antrian</a> -->
                        </li>
                    </ul>
                </div>

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
                            <h1 class="m-0">ANTRIAN <small><?php echo $nama_poli; ?></small></h1>
                            <input type="hidden" id="id_poli" name="id_poli" class="form-control" value="<?php echo $id_poli; ?>">
                            <input type="hidden" id="poli" name="poli" class="form-control" value="<?php echo strtolower($nama_poli); ?>">
                            <input type="hidden" id="prefix_poli" name="prefix_poli" class="form-control" value="<?php echo $prefix_poli; ?>">
                            <input type="hidden" id="prefix_dokter" name="prefix_dokter" class="form-control" value="<?php echo $prefix_dokter; ?>">
                            <input type="hidden" id="file_panggilan" name="file_panggilan" class="form-control" value="<?php echo $file_panggilan; ?>">
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
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0"><small>ANTRIAN </small><?php echo $nama_poli; ?></h5>  <br/>
                                    <h5 class="card-title m-0"><small>PREFIX </small><?php echo strtoupper($prefix_dokter); ?></h5> <br/>
                                    <div style="text-align: center;">
                                        <button class="btn btn-default" id="prefix_dokter_a">A</button>-<button class="btn btn-default" id="prefix_dokter_b">B</button>-<button class="btn btn-default" id="prefix_dokter_c">C</button>-<button class="btn btn-default" id="prefix_dokter_d">D</button>-<button class="btn btn-default" id="prefix_dokter_e">E</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body">
                                                    <h6>Panggil Manual </h6>
                                                    <div class="input-group input-group-md">
                                                        <input type="text" id="no_antrian_manual" name="no_antrian_manual" class="form-control">
                                                        <span class="input-group-append">
                                                            <button type="button" id="manual"><i class="fa fa-phone-volume"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="div_ket_umum" class="alert alert-info alert-dismissible" style="display:none;">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-info"></i> <span id="judul_ket_umum"></span></h4>
                                                <p id="ket_umum"></p>
                                            </div>
                                            <div class="card card-primary card-outline" style="text-align: center;">
                                                <div class="card-body">
                                                    <h1><b><span id="no_antrian"><?php echo strtoupper($no_antrian);
                                                                                    ?></span></b></h1>
                                                    <button class="btn btn-primary" id="reply">Reply</button> - <button class="btn btn-success" id="next">Next</button>
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
            <strong>Copyright &copy; 2024 <a href="https://puskesmasmatraman.jakarta.go.id/">Puskesmas Kecamatan Matraman</a>.</strong> All rights reserved.
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
    let reply = document.getElementById("reply");
    let next = document.getElementById("next");
    let manual = document.getElementById("manual");
    let pending_umum = document.getElementById("pending_umum");
    let no_antrian_manual = document.getElementById("no_antrian_manual");
    let no_antrians = $('#no_antrian').html();
    let prefix_dokter = document.getElementById("prefix_dokter");
    let prefix_dokter_a = document.getElementById("prefix_dokter_a");
    let prefix_dokter_b = document.getElementById("prefix_dokter_b");
    let prefix_dokter_c = document.getElementById("prefix_dokter_c");
    let prefix_dokter_d = document.getElementById("prefix_dokter_d");
    let prefix_dokter_e = document.getElementById("prefix_dokter_e");
    let nama_poli = document.getElementById("poli");

    if (prefix_dokter.value=="a") {
        prefix_dokter_a.classList ="btn btn-info";
    }else if(prefix_dokter.value=="b") {
        prefix_dokter_b.classList ="btn btn-info";
    }else if(prefix_dokter.value=="c") {
        prefix_dokter_c.classList ="btn btn-info";
    }else if(prefix_dokter.value=="d") {
        prefix_dokter_d.classList ="btn btn-info";
    }else if(prefix_dokter.value=="e") {
        prefix_dokter_e.classList ="btn btn-info";
    }else {
        prefix_dokter_a.classList ="btn btn-info";
    }

    no_antrian_manual.addEventListener("keypress", function onEvent(event) {
        if (event.key === "Enter") {
            if (status_audio == "end" || status_audio == "") {
                panggilManualAntrian();
            } else {
                console.log("Panggilan Masih Berjalan..")

            }
        }
    });

    manual.addEventListener("click", function onEvent(event) {
        if (status_audio == "end" || status_audio == "") {
            panggilManualAntrian();
        } else {
            console.log("Panggilan Masih Berjalan..")

        }
    });

    prefix_dokter_a.addEventListener("click", () => {
        link = "<?php echo base_url() ?>" + "antrian_v2/" + nama_poli.value.split(' ').join('') + "/a";
        window.location.href = link;
    })
    prefix_dokter_b.addEventListener("click", () => {
        link = "<?php echo base_url() ?>" + "antrian_v2/" + nama_poli.value.split(' ').join('') + "/b";
        window.location.href = link;
    })
    prefix_dokter_c.addEventListener("click", () => {
        link = "<?php echo base_url() ?>" + "antrian_v2/" + nama_poli.value.split(' ').join('') + "/c";
        window.location.href = link;
    })
    prefix_dokter_d.addEventListener("click", () => {
        link = "<?php echo base_url() ?>" + "antrian_v2/" + nama_poli.value.split(' ').join('') + "/d";
        window.location.href = link;
    })
    prefix_dokter_e.addEventListener("click", () => {
        link = "<?php echo base_url() ?>" + "antrian_v2/" + nama_poli.value.split(' ').join('') + "/e";
        window.location.href = link;
    })

    reply.addEventListener("click", () => {
        if (status_audio == "end" || status_audio == "") {
            replyAntrian();
        } else {
            console.log("Panggilan Masih Berjalan..")

        }
    })

    next.addEventListener("click", () => {
        if (status_audio == "end" || status_audio == "") {
            nextAntrian();
        } else {
            console.log("Panggilan Masih Berjalan..");

        }

    })

    function replyAntrian(){
        status_audio = "running";
        id_poli = $('#id_poli').val();
        prefix_dokter = $('#prefix_dokter').val();
        no_antrian = document.getElementById('no_antrian').innerHTML;

        var dataArray = {
            "status": 'reply',
            "no_antrian": no_antrian,
            "id_poli": id_poli,
            "prefix_dokter" : prefix_dokter
        }
        
        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('antrian_v2/replyAntrian/'); ?>',
            success: function(result) {
                document.getElementById('no_antrian').innerHTML = no_antrian;

                arr_no_antrian = no_antrian.split('-');
                prefix = String(arr_no_antrian[0]); 
                angka = String(arr_no_antrian[1]);

                arrPrefix = prefix.split('');
                arrAntrian = splitNo(angka);

                playAudio(arrPrefix,arrAntrian);

                $('#judul_ket_umum').html('Berhasil');
                $('#ket_umum').html('Berhasil dipanggil');
                $('#div_ket_umum').show();
                $("#div_ket_umum").fadeTo(1500, 500).slideUp(500, function() {
                    $("#div_ket_umum").hide();
                });
            }
        })
    }

    function nextAntrian() {

        status_audio = "running";
        id_poli = $('#id_poli').val();
        no_antrian = document.getElementById('no_antrian').innerHTML;

        var dataArray = {
            "status": 'next',
            "no_antrian": no_antrian,
            "id_poli": id_poli
        }

        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('antrian_v2/nextAntrian/'); ?>',
            success: function(result) {
                arrResult = JSON.parse(result);
                // console.log(arrResult);
                if (arrResult.success == true) {
                    document.getElementById('no_antrian').innerHTML = arrResult.no_antrian_new;

                    arr_no_antrian = arrResult.no_antrian_new.split('-');
                    prefix = String(arr_no_antrian[0]); 
                    angka = String(arr_no_antrian[1]);

                    arrPrefix = prefix.split('');
                    arrAntrian = splitNo(angka);

                    playAudio(arrPrefix,arrAntrian);

                    $('#judul_ket_umum').html('Berhasil');
                    $('#ket_umum').html('Berhasil dipanggil');
                    $('#div_ket_umum').show();
                    $("#div_ket_umum").fadeTo(1500, 500).slideUp(500, function() {
                        $("#div_ket_umum").hide();
                    });

                } else {
                    status_audio = "";
                    $('#judul_ket_umum').html('Error');
                    $('#ket_umum').html('Data Antrian Blm Ada');
                    $('#div_ket_umum').show();
                    $("#div_ket_umum").fadeTo(3000, 500).slideUp(500, function() {
                        $("#div_ket_umum").hide();
                    });
                }
            }
        })
    }

    function panggilManualAntrian() {
        no_antrian_manual = document.getElementById('no_antrian_manual').value;
        id_poli = document.getElementById('id_poli').value;
        prefix_poli  = document.getElementById('prefix_poli').value;
        prefix_dokter  = document.getElementById('prefix_dokter').value;

        if (no_antrian_manual == "") {
            $('#judul_ket_umum').html('Error');
            $('#ket_umum').html('Harap Lengkapi data');
            $('#div_ket_umum').show();
            $("#div_ket_umum").fadeTo(3000, 500).slideUp(500, function() {
                $("#div_ket_umum").hide();
            });
            return;
        }

        status_audio = "running";
        var dataArray = {
            "status": 'manual',
            "no_antrian": prefix_poli + prefix_dokter + '-' + no_antrian_manual,
            "id_poli": id_poli
        }

        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('antrian_v2/manualAntrian/'); ?>',
            success: function(result) {
                arrResult = JSON.parse(result);
                if (arrResult.success == true) {
                    document.getElementById('no_antrian').innerHTML = arrResult.no_antrian_new.toUpperCase();

                    arr_no_antrian = arrResult.no_antrian_new.split('-');
                    prefix = String(arr_no_antrian[0]); 
                    angka = String(arr_no_antrian[1]);

                    arrPrefix = prefix.split('');
                    arrAntrian = splitNo(angka);

                    playAudio(arrPrefix,arrAntrian);

                    $('#judul_ket_umum').html('Berhasil');
                    $('#ket_umum').html('Berhasil dipanggil');
                    $('#div_ket_umum').show();
                    $("#div_ket_umum").fadeTo(1500, 500).slideUp(500, function() {
                        $("#div_ket_umum").hide();
                    });

                } else {
                    status_audio = "";
                    $('#judul_ket_umum').html('Error');
                    $('#ket_umum').html('Data Antrian Blm Ada');
                    $('#div_ket_umum').show();
                    $("#div_ket_umum").fadeTo(3000, 500).slideUp(500, function() {
                        $("#div_ket_umum").hide();
                    });
                }

            }
        })
    }


    

    function pendingUmum() {
        var dataArray = {
            "antrian": {
                "panggil": '2' //2=pending
            }
        }

        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('antrian_farmasi/updatePendingUmum'); ?>',
            success: function(result) {
                arr_pending_umum.push(result);

            }
        })
    }

    function nextPendingUmum() {
        if (status_audio == "end" || status_audio == "") {
            var dataArray = {
                "antrian": {
                    "panggil": '1'
                }
            }

            $.ajax({
                type: "POST",
                data: dataArray,
                url: '<?php echo base_url('antrian_farmasi/updateNextPendingUmum'); ?>',
                success: function(result) {
                    status_audio = "running";
                    resultArr = JSON.parse(result);
                    if (resultArr.success == true) {
                        next_antrian = parseInt(document.getElementById('no_antrian').innerHTML) + 1;
                        document.getElementById('no_antrian').innerHTML = next_antrian;
                        arrAntrian = splitNo(next_antrian.toString());
                        audioAntrian(arrAntrian);

                    } else {

                    }
                }
            })
        }
    }

    const callAudio = (folder,audio) => {
        return new Promise((resolve,reject)=>{
            music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/" + folder + "/" + audio + ".mp3";
            music.play();
            music.onended = function() {
                resolve();
            }
        })
    }

    async function playAudio(arrPrefix,arrAntrian) {
        await callAudio('antrian','nomor antrian');
        for (let i = 0; i < arrPrefix.length; i++) {
            await callAudio('abjad',arrPrefix[i]);
        }
        
        for (let i = 0; i < arrAntrian.length; i++) {
            await callAudio('angka',arrAntrian[i]);
        }
        await callAudio('antrian','silahkan-menuju');
        await callAudio('antrian',$('#file_panggilan').val());
        status_audio = "end";
        
    }

    function splitNo(angka) {
        if (angka == 0 || angka == '') {
            arr_angka = [0];
        } else {
            let arrAngka = angka.split('');
            let pemisah = "";
            if (arrAngka.length == 2) {
                if (angka == "10") {
                    arr_angka = ["sepuluh"];
                } else if (angka == "11") {
                    arr_angka = ["sebelas"];
                } else if (angka >= 12 && angka <= 19) {
                    arr_angka = [arrAngka[1], "belas"];
                } else if (angka == "20" || angka == "30" || angka == "40" || angka == "50" || angka == "60" || angka == "70" || angka == "80" || angka == "90") {
                    arr_angka = [arrAngka[0], "puluh"];
                } else {
                    arr_angka = [arrAngka[0], "puluh", arrAngka[1]];
                }
            } else if (arrAngka.length == 3) {
                if (arrAngka[0] == 1) {
                    if (angka == "100") {
                        arr_angka = ["seratus"];
                    } else if (angka >= 101 && angka <= 109) {
                        arr_angka = ["seratus", arrAngka[2]];
                    } else if (angka == 110) {
                        arr_angka = ["seratus", "sepuluh"];
                    } else if (angka == 111) {
                        arr_angka = ["seratus", "sebelas"];
                    } else if (angka >= 112 && angka <= 119) {
                        arr_angka = ["seratus", arrAngka[2], "belas"];
                    } else if (angka == "120" || angka == "130" || angka == "140" || angka == "150" || angka == "160" || angka == "170" || angka == "180" || angka == "190") {
                        arr_angka = ["seratus", arrAngka[1], "puluh"];
                    } else {
                        arr_angka = ["seratus", arrAngka[1], "puluh", arrAngka[2]];
                    }
                } else {
                    if (arrAngka[1] + arrAngka[2] >= "01" && arrAngka[1] + arrAngka[2] <= "09") {
                        arr_angka = [arrAngka[0], "ratus", arrAngka[2]];
                    } else if (arrAngka[1] + arrAngka[2] == "10") {
                        arr_angka = [arrAngka[0], "ratus", "sepuluh"];
                    } else if (arrAngka[1] + arrAngka[2] == "11") {
                        arr_angka = [arrAngka[0], "ratus", "sebelas"];
                    } else if (arrAngka[1] + arrAngka[2] >= "12" && arrAngka[1] + arrAngka[2] <= "19") {
                        arr_angka = [arrAngka[0], "ratus", arrAngka[2], "belas"];
                    } else if (arrAngka[1] + arrAngka[2] == "20" || arrAngka[1] + arrAngka[2] == "30" || arrAngka[1] + arrAngka[2] == "40" || arrAngka[1] + arrAngka[2] == "50" || arrAngka[1] + arrAngka[2] == "60" || arrAngka[1] + arrAngka[2] == "70" || arrAngka[1] + arrAngka[2] == "80" || arrAngka[1] + arrAngka[2] == "90") {
                        arr_angka = [arrAngka[0], "ratus", arrAngka[1], "puluh"];
                    } else {
                        arr_angka = [arrAngka[0], "ratus", arrAngka[1], "puluh", arrAngka[2]];
                    }
                }
            } else {
                arr_angka = [arrAngka[0]];
            }
        }
        return arr_angka;    
    }

</script>

</html>