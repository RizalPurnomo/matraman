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

<script>
    function pilihPoli(id){
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
						<div class="col-lg-4">
							<div class="card card-primary card-outline">

                                <div class="hold-transition lockscreen">
                                    <div class="lockscreen-wrapper">
                                        <div class="lockscreen-logo">
                                            <b>PILIH POLI</b>

                                        </div>

                                        <div class="lockscreen-item">
                                            <div class="col-lg-12 col-12">
                                                <a href="" id="back">
                                                    <div class="small-box bg-warning">
                                                        <div class="inner">
                                                            <h3><span style='font-size:30px;'><i class="fa-solid fa-circle-left"></i> Pilih Poli</span></h3>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

							</div>
						</div>

						<div class="col-lg-8">
							<div class="card card-primary card-outline">

                                <div class="hold-transition lockscreen">
                                    <div class="lockscreen-wrapper">
                                        <div class="lockscreen-logo">
                                            <?php if($id_poli == "8"){
                                                $prioritas = "PRIORITAS";
                                            }else{
                                                $prioritas = "";
                                            } ?>
                                            <b>ANTRIAN <?php echo $prioritas ?> FARMASI</b>

                                        </div>

                                        <!-- START LOCK SCREEN ITEM -->
                                        <div class="lockscreen-item">
                                            <div class="col-lg-12 col-12">
                                                <!-- small box -->
                                                <!-- <a href="#" target="popup" id="print" onclick="window.open('<?php echo base_url('Antrian_farmasi/printAntrian') ?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;"> -->
                                                <a href="" id="print">
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <h3><span style='font-size:30px;'><i class="fa fa-print"></i> Ambil Antrian</span></h3>

                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-stats-bars"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.lockscreen-item -->
                                    <div class="help-block text-center">
                                        Silahkan di klik untuk mengambil nomor antrian
                                    </div>
                                    <div class="lockscreen-footer text-center">
                                        Copyright &copy; 2023 <b><a href="https://puskesmasmatraman.jakarta.go.id/" class="text-black">Puskesmas Kecamatan Matraman</a></b><br>
                                        All rights reserved<br/>
                                        <a href="<?php echo base_url('antrian_farmasi/panggil'); ?>">Home</a>
                                    </div>
                                    </div>
                                    <!-- /.center -->


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
                                        

                                        const print = document.getElementById('print');
                                        print.addEventListener('click', (e) => {
                                            e.preventDefault();
                                            cetak();
                                        })

                                        function print1() {
                                            let url = window.location.href;
                                            str = url.split("/")[6];
                                            // console.log(str);
                                            return new Promise(resolve => {
                                                setTimeout(() => {
                                                    var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrian/") ?>' + str, 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                                                    resolve('print');
                                                }, 500);
                                            });

                                        }

                                        function printCopy() {
                                                return new Promise(resolve => {
                                                    setTimeout(() => {
                                                        var newwindow = window.open('<?php echo base_url("Antrian_farmasi/printAntrianCopy") ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
                                                        resolve("copy");
                                                    }, 1000);
                                                });

                                        }

                                        function goToSKP() {
                                            return new Promise(resolve => {
                                                setTimeout(() => {
                                                    window.location = "<?php echo base_url('skp') ?>";
                                                    resolve("Back");
                                                }, 1500);
                                            });
                                        }


                                        async function cetak() {
                                            const print1a = await print1();
                                            // console.log(print1a);
                                            const copy1 = await printCopy();
                                            // console.log(copy1);
                                            const back1 = await goToSKP();
                                            // console.log(back1);
                                        }

                                    </script>


                                    <!-- jQuery -->
                                    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
                                    <!-- Bootstrap 4 -->
                                    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
	

</script>

</html>
