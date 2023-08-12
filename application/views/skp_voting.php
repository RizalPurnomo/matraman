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
    <title>Antrian | Farmasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Survei Kepuasan <small>Pelanggan</small></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p class="btn-secondary btn-lg"><b><?php echo strtoupper($poli[0]['nama_poli']) ?></b></p>
                            <input type="hidden" class="form-control" id="id_poli" placeholder="Id Poli" value="<?php echo $poli[0]['id']; ?>">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <a href="#" id="smile1">
                                <div class="small-box bg-success">
                                    <div class="inner text-center">
                                        <h1><span style='font-size:60px;'>&#128516;</span></h1>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <p class="small-box-footer">Sangat Puas </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <a href="#" id="smile2">
                                <div class="small-box bg-info">
                                    <div class="inner text-center">
                                        <h1><span style='font-size:60px;'>&#128578;</span></h1>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <p class="small-box-footer">Puas </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <a href="#" id="smile3">
                                <div class="small-box bg-warning">
                                    <div class="inner text-center">
                                        <h1><span style='font-size:60px;'>&#128528;</span></h1>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <p class="small-box-footer">Cukup </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <a href="#" id="smile4">
                                <div class="small-box bg-danger">
                                    <div class="inner text-center">
                                        <h1><span style='font-size:60px;'>&#128544;</span></h1>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <p class="small-box-footer">Kurang </p>
                                </div>
                            </a>
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
            <strong>Copyright &copy; 2022 <a href="https://puskesmasmatraman.jakarta.go.id/">Puskesmas Kecamatan Matraman</a>.</strong> All rights reserved.
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
    const formatDate = () => {
        let d = new Date();
        let month = (d.getMonth() + 1).toString().padStart(2, '0');
        let day = d.getDate().toString().padStart(2, '0');
        let year = d.getFullYear();
        return [year, month, day].join('-');
    }
    tglNow = formatDate();

    const smile1 = document.getElementById('smile1');
    const smile2 = document.getElementById('smile2');
    const smile3 = document.getElementById('smile3');
    const smile4 = document.getElementById('smile4');
    let poli = document.getElementById('id_poli').value;

    smile1.addEventListener('click', (e) => {
        e.preventDefault();
        pilihSmile('1', poli, tglNow);
    })

    smile2.addEventListener('click', (e) => {
        e.preventDefault();
        pilihSmile('2', poli, tglNow);
    })

    smile3.addEventListener('click', (e) => {
        e.preventDefault();
        pilihSmile('3', poli, tglNow);
    })

    smile4.addEventListener('click', (e) => {
        e.preventDefault();
        pilihSmile('4', poli, tglNow);
    })

    function pilihSmile(status, poli, tgl) {
        var dataArray = {
            "skp": {
                "tanggal": tgl,
                "id_poli": poli,
                "id_status": status
            }
        }
        // console.log(dataArray);
        // return;

        $.ajax({
            type: "POST",
            data: dataArray,
            url: '<?php echo base_url('skp/saveSkp'); ?>',
            success: function(result) {
                res = JSON.parse(result);
                if (res.success == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: res.messages,
                        showConfirmButton: false,
                        timer: 1000
                    });

                    let promise = new Promise((resolve, reject) => {
                        setTimeout(() => resolve(
                            window.location = "<?php echo base_url() ?>" + 'skp/printAntrianFarmasi/' + poli
                        ), 1000)
                    });
                }
            }
        })
    }
</script>

</html>