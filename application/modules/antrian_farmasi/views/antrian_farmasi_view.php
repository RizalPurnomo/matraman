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
    <title>View Antrian | Farmasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<script>
    function pilihPoli(id) {
        window.location = "<?php echo base_url() ?>" + "skp/pilihPoli/" + id;
    }
</script>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <!-- <h5 class="m-0">Pilih Poli <small>Untuk Survei Kepuasan Pelanggan</small></h5> -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card card-primary card-outline">
                        <!-- <div class="card-header">
                            Pemberitahuan
                        </div> -->
                        <div class="card-body">
                            <marquee>
                                <h1><b>SELAMAT DATANG DI APOTEK PUSKESMAS KECAMATAN MATRAMAN</b></h1>
                            </marquee>
                            <!-- <h1><b></b></h1> -->
                        </div>

                        <!-- /.row -->
                    </div>
                </div><!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container">
                    <div class="card card-primary card-outline">
                        <!-- <div class="card-header">
                            ANTRIAN FARMASI
                        </div> -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card card-success card-outline" style="text-align: center;">
                                        <div class="card-header bg-success">
                                            <h1>ANTRIAN UMUM</h1>
                                        </div>
                                        <div class="card-body">
                                            <h1><b><span id="no_antrian_umum" style="font-size: 600%;"><?php echo $antrianUmum; ?></span></b></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card card-warning card-outline" style="text-align: center;">
                                        <div class="card-header bg-warning">
                                            <h1>ANTRIAN LANSIA</h1>
                                        </div>
                                        <div class="card-body">
                                            <h1><b><span id="no_antrian_lansia" style="font-size: 600%;"><?php echo $antrianLansia; ?></span></b></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
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
    window.setTimeout("refreshListAntrian()", 1000);

    function refreshListAntrian() {
        setTimeout("refreshListAntrian()", 1000);

        $.ajax({
            type: "GET",
            dataType: "html",
            url: '<?php echo base_url('antrian_farmasi/getLastAntrian'); ?>',
            success: function(msg) {
                obj = JSON.parse(msg);
                // console.log(obj);
                objAntrianUmum = obj['antrianUmum'];
                objAntrianLansia = obj['antrianLansia'];

                if (objAntrianUmum.length < 1) {
                    txtAntrianUmum = 0;
                } else {
                    txtAntrianUmum = objAntrianUmum[0]['no_antrian'];
                }
                if (objAntrianLansia.length < 1) {
                    txtAntrianLansia = 0;
                } else {
                    txtAntrianLansia = "L" + objAntrianLansia[0]['no_antrian'];
                }

                document.getElementById("no_antrian_umum").innerHTML = txtAntrianUmum;
                document.getElementById("no_antrian_lansia").innerHTML = txtAntrianLansia;


            }


            // }
        });
    }
</script>

</html>