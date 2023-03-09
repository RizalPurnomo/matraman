<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Lockscreen</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="hold-transition lockscreen">
	<!-- Automatic element centering -->
	<div class="lockscreen-wrapper">
		<div class="lockscreen-logo">
			<b>ANTRIAN FARMASI</b>

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
		Copyright &copy; 2022 <b><a href="https://adminlte.io" class="text-black">Puskesmas Kecamatan Matraman</a></b><br>
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

		

		const print = document.getElementById('print');
		print.addEventListener('click', (e) => {
			e.preventDefault();
			console.log("print");
			// var newwindow = window.open('<?php echo base_url('Antrian_farmasi/printAntrian') ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
			// setTimeout(printCopy, 2000);
			// setTimeout(back, 3000);
		})

		function printCopy() {
			var newwindow = window.open('<?php echo base_url('Antrian_farmasi/printAntrianCopy') ?>', 'popup', 'width=600,height=600,scrollbars=no,resizable=no');
			console.log("copy");
		}

		function back() {
			var back = window.open('<?php echo base_url('skp') ?>');
			console.log("back");
		}

	</script>


	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
