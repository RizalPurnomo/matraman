<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Antrian | Farmasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <script>
        function pilihPoli(id){
            window.location = "<?php echo base_url() ?>" + "skp/pilihPoli/" + id;
        }
    </script>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">ANTRIAN UMUM</h5><br/><br/>
                        <button type="button" class="btn btn-block bg-gradient-primary btn-lg" id="print_umum"><h1><i class="fa fa-print"></i> Antrian Umum</h1></button>
                        <br/>
                        <div class="help-block text-center">
                            Silahkan di klik untuk mengambil nomor antrian umum
                        </div>
                        <br/>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Poli</h5><br/><br/>
                        <button type="button" class="btn btn-block bg-gradient-warning btn-lg" id="back"><h1>Pilih Poli</h1></button>

                    </div>
                </div>
            </div>   

        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">ANTRIAN LANSIA</h5><br/><br/>
                        <button type="button" class="btn btn-block bg-gradient-success btn-lg" id="print_lansia"><h1><i class="fa fa-print"></i> Antrian Lansia</h1></button>
                        <br/>
                        <div class="help-block text-center">
                            Silahkan di klik untuk mengambil nomor antrian Lansia
                        </div>
                        <br/>
                    </div>
                </div>
            </div> 
        </div>
        <!-- /.row -->
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
      Sehat dan Bahagia
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://puskesmasmatraman.jakarta.go.id/">Puskesmas Kecamatan Matraman</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<script>
    const formatDate = () => {
        let d = new Date();
        let month = (d.getMonth() + 1).toString().padStart(2, '0');
        let day = d.getDate().toString().padStart(2, '0');
        let year = d.getFullYear();
        return [year, month, day].join('-');
    }
    tglNow = formatDate();

    const back = document.getElementById('back');
    back.addEventListener('click', (e) => {
        e.preventDefault();
        window.location = "<?php echo base_url('skp') ?>";
    })
    

    const btnPrintUmum = document.getElementById('print_umum');
    btnPrintUmum.addEventListener('click', (e) => {
        e.preventDefault();
        cetakUmum();
    })

    const btnPrintLansia = document.getElementById('print_lansia');
    btnPrintLansia.addEventListener('click', (e) => {
        e.preventDefault();
        cetakLansia();
    })

    async function cetakUmum() {
        const print1 = await printUmum();
        const copy1 = await printUmumCopy();
        const back1 = await goToSKP();
    }

    async function cetakLansia() {
        const print1 = await printLansia();
        const copy1 = await printLansiaCopy();
        const back1 = await goToSKP();
    }


    function printUmum() {
        return new Promise(resolve => {
            setTimeout(() => {
                var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrianUmum/") ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                resolve('print');
            }, 500);
        });

    }

    function printUmumCopy() {
        return new Promise(resolve => {
            setTimeout(() => {
                var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrianUmumCopy/") ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                resolve("copy");
            }, 1500);
        });

    }

    function printLansia() {
        return new Promise(resolve => {
            setTimeout(() => {
                var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrianLansia/") ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                resolve('print');
            }, 500);
        });

    }

    function printLansiaCopy() {
        return new Promise(resolve => {
            setTimeout(() => {
                var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrianLansiaCopy/") ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                resolve("copy");
            }, 1500);
        });

    }

    function goToSKP() {
        return new Promise(resolve => {
            setTimeout(() => {
                window.location = "<?php echo base_url('skp') ?>";
                resolve("Back");
            }, 2000);
        });
    }




</script>




<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script> -->
</body>
</html>
