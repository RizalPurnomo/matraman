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

<body class="hold-transition layout-top-nav">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a href="<?php echo base_url(); ?>index3.html" class="navbar-brand">
					<img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">antrianFARMASI</span>
				</a>
				

				<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse order-3" id="navbarCollapse">
					<ul class="navbar-nav">
							<li class="nav-item">
								<a href="<?php echo base_url('skp'); ?>" class="nav-link">SKP</a>
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
							<h1 class="m-0">ANTRIAN <small>FARMASI</small></h1>
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
						<div class="col-lg-3">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">List Antrian </h5>
								</div>
								<div class="card-body" id="table_antrian">

								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div id="div_ket" class="alert alert-danger alert-dismissible" style="display:none;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-info"></i> <span id="judul_ket"></span></h4>
								<p id="ket"></p>
							</div>

							<div class="card card-primary card-outline" style="text-align: center;">
								<div class="card-header">
									<h5 class="card-title m-0">Antrian</h5>
								</div>
								<div class="card-body">
									<h1><b><span id="no_antrian"><?php echo $no_antrian; ?></span></b></h1>

									<button class="btn btn-primary" id="reply">Reply</button> - <button class="btn btn-success" id="next">Next</button>
								</div>
							</div>
							<div class="card card-primary card-outline" style="text-align: center;">
								<div class="card-header">
									<h5 class="card-title m-0">Panggilan Pending</h5>
								</div>
								<div class="card-body" id="panggilan_pending">

								</div>
							</div>
							<div class="card card-primary card-outline" style="text-align: center;">
								<div class="card-header">
									<h5 class="card-title m-0">Panggilan Selesai</h5>
								</div>
								<div class="card-body" id="panggilan_selesai">

								</div>
							</div>							
						</div>
						<div class="col-lg-2">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">Panggil Manual </h5>
								</div>
								<div class="card-body">
									<div class="input-group input-group-md">
										<input type="text" id="no_antrian_manual" name="no_antrian_manual" class="form-control">
										<span class="input-group-append">
											<button type="button" class="btn btn-info btn-flat" onclick="panggilManual()">Panggil</button>
										</span>
									</div>
								</div>
								<!-- <div class="card-body" id="table_panggil">

								</div> -->
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
	let status_audio = "";
	let no_antrian=document.getElementById("no_antrian").innerHTML;
	let arr_pending = [];
	let music = new Audio();
	let reply = document.getElementById("reply");
	let next = document.getElementById("next");
	let pending = document.getElementById("pending");
	let no_antrian_manual= document.getElementById("no_antrian_manual");

	// window.setTimeout("refreshListAntrian()", 1000);
	
	if (no_antrian == 0) {
		reply.disabled = true;
	} else {
		reply.disabled = false;
	}

	

	no_antrian_manual.addEventListener("keypress", function onEvent(event) {
		if (event.key === "Enter") {
			// document.getElementById("panggilManual").click();
			panggilManual();
		}
	});

	reply.addEventListener("click", () => {
		no_antrian = document.getElementById('no_antrian').innerHTML;

		arrAntrian = splitNo(no_antrian);
		audioAntrian(arrAntrian);
	})

	next.addEventListener("click", () => {
		// console.log(status_audio);
		if (status_audio == "end" || status_audio == "") {
			nexts();
		} else {
			pendings();

		}

	})

	// pending.addEventListener("click", () => {
	// 	pendings();
	// })


	function nexts() {
		status_audio = "running";
		var dataArray = {
			"antrian": {
				"panggil": '1' //1=Sudah dipanggil
			}
		}

		$.ajax({
			type: "POST",
			data: dataArray,
			url: '<?php echo base_url('antrian_farmasi/update_antrian'); ?>',
			success: function(result) {
				resultArr = JSON.parse(result);

				if (resultArr.success == true) {
					document.getElementById('no_antrian').innerHTML = resultArr.no;
					arrAntrian = splitNo(resultArr.no);
					audioAntrian(arrAntrian);

				} else {
					status_audio = "";
					$('#judul_ket').html('Error');
					$('#ket').html('Data Antrian Blm Ada');
					$('#div_ket').show();
					$("#div_ket").fadeTo(3000, 500).slideUp(500, function() {
						$("#div_ket").hide();
					});

				}
			}
		})
	}

	function pendings() {
		var dataArray = {
			"antrian": {
				"panggil": '2' //2=pending
			}
		}

		$.ajax({
			type: "POST",
			data: dataArray,
			url: '<?php echo base_url('antrian_farmasi/update_pending'); ?>',
			success: function(result) {
				arr_pending.push(result);

			}
		})
	}

	function nextPending() {
		if (status_audio == "end" || status_audio == "") {
			var dataArray = {
				"antrian": {
					"panggil": '1'
				}
			}

			$.ajax({
				type: "POST",
				data: dataArray,
				url: '<?php echo base_url('antrian_farmasi/update_pending2'); ?>',
				success: function(result) {
					status_audio = "running";
					resultArr = JSON.parse(result);
					if (result == "Berhasil") {
						next_antrian = parseInt(document.getElementById('no_antrian').innerHTML) + 1;
						document.getElementById('no_antrian').innerHTML = next_antrian;

						no_antrian = document.getElementById('no_antrian').innerHTML;
						arrAntrian = splitNo(no_antrian);
						audioAntrian(arrAntrian);

					} else {

					}
				}
			})
		}
	}

	function panggilManual() {
		no_antrian_manual = document.getElementById('no_antrian_manual').value;
		arrAntrian = splitNo(no_antrian_manual.toString());
		console.log(arrAntrian);

		// if(no_antrian_manual.value==""){
		// 	$('#judul_ket').html('Error');
		// 	$('#ket').html('Harap Lengkapi data');
		// 	$('#div_ket').show();
		// 	$("#div_ket").fadeTo(3000, 500).slideUp(500, function() {
		// 		$("#div_ket").hide();
		// 	});
		// 	return;
		// }
		// status_audio = "running";
		// var dataArray = {
		// 	"antrian": {
		// 		"panggil": '1' //1=Sudah dipanggil
		// 	}
		// }
		// no_antrian_manual = document.getElementById('no_antrian_manual').value;

		// $.ajax({
		// 	type: "POST",
		// 	data: dataArray,
		// 	url: '<?php echo base_url('antrian_farmasi/update_antrian_manual/'); ?>' + no_antrian_manual,
		// 	success: function(result) {
		// 		resultArr = JSON.parse(result);
		// 		if (resultArr.success == true) {
		// 			document.getElementById('no_antrian').innerHTML = resultArr.no;
		// 			arrAntrian = splitNo(resultArr.no);
		// 			audioAntrian(arrAntrian);

		// 		} else {
		// 			status_audio = "";
		// 			$('#judul_ket').html('Error');
		// 			$('#ket').html('Data Antrian Blm Ada');
		// 			$('#div_ket').show();
		// 			$("#div_ket").fadeTo(3000, 500).slideUp(500, function() {
		// 				$("#div_ket").hide();
		// 			});

		// 		}
		// 	}
		// })
	}

	

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
								}else {
									music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/" + arrAntrian[3] + ".mp3";
									music.play();
									music.onended = function() {
										if (jum == 4) {
											endingAudio();
										}else {
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
			music.src = "<?php echo base_url(); ?>" + "assets/upload/dubbing/angka/apotik.mp3";
			music.play();
			music.onended = function() {
				music.pause;
				status_audio = "end";
				return;
			}
		}
	}

	function splitNo(angka) {
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
			}else if(arrAngka.length == 3){
				if(arrAngka[0]==1){
					if(angka=="100"){
						arr = ["seratus"];
					}else if(angka >= 101 && angka <= 109){
						arr = ["seratus",arrAngka[2]];
					}else if(angka == 110){
						arr = ["seratus","sepuluh"];
					}else if(angka == 111){
						arr = ["seratus","sebelas"];
					}else if(angka >= 112 && angka <=119){
						arr = ["seratus",arrAngka[2],"belas"];
					}else if (angka == "120" || angka == "130" || angka == "140" || angka == "150" || angka == "160" || angka == "170" || angka == "180" || angka == "190") {
						arr = ["seratus",arrAngka[1], "puluh"];
					} else {
						arr = ["seratus",arrAngka[1], "puluh", arrAngka[2]];
					}
				}else{
					if(arrAngka[1]+arrAngka[2] >= "01" && arrAngka[1]+arrAngka[2] <= "09"){
						arr = [arrAngka[0] ,"ratus",arrAngka[2]];
					}else if(arrAngka[1]+arrAngka[2] == "10"){
						arr = [arrAngka[0],"ratus","sepuluh"];
					}else if(arrAngka[1]+arrAngka[2] == "11"){
						arr = [arrAngka[0],"ratus","sebelas"];
					}else if(arrAngka[1]+arrAngka[2] >= "12" && arrAngka[1]+arrAngka[2] <="19"){
						arr = [arrAngka[0],"ratus",arrAngka[2],"belas"];
					}else if (arrAngka[1]+arrAngka[2] == "20" || arrAngka[1]+arrAngka[2] == "30" || arrAngka[1]+arrAngka[2] == "40" || arrAngka[1]+arrAngka[2] == "50" || arrAngka[1]+arrAngka[2] == "60" || arrAngka[1]+arrAngka[2] == "70" || arrAngka[1]+arrAngka[2] == "80" || arrAngka[1]+arrAngka[2] == "90") {
						arr = [arrAngka[0],"ratus",arrAngka[1], "puluh"];
					} else {
						arr = [arrAngka[0],"ratus",arrAngka[1], "puluh", arrAngka[2]];
					}
				}
			}else {
				arr = [arrAngka[0]];
			}
		}
		return arr;
	}

	function cekPrioritas(kode_prioritas){
		if (kode_prioritas==0) {
			return "L";
		}else{
			return "";
		}
	}

	function refreshListAntrian() {
		setTimeout("refreshListAntrian()", 1000);
		// console.log(status_audio);

		$.ajax({
			type: "GET",
			dataType: "html",
			url: '<?php echo base_url('antrian_farmasi/refreshTable'); ?>',
			success: function(msg) {
				obj = JSON.parse(msg);
				objAntrian = obj['antrian'];
				objAntrianSdhPanggil = obj['antrianSdhPanggil'];
				antrianPending = obj['antrianPending'];
				// console.log(objAntrianSdhPanggil);
				if (antrianPending.length > 0) {
					nextPending();
				} else {}


				//-----
				var txt = "";
				txt += `<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 20px">Antrian</th>
									<th style="width: 80px">Waktu</th>
								</tr>
							</thead>
							<tbody>`
				for (x in objAntrian) {
					txt += `<tr>
								<td>${cekPrioritas(objAntrian[x]['prioritas']) + objAntrian[x]['no_antrian']}</td>
								<td>${objAntrian[x]['created_at'].substring(11)}</td>
							</tr>`
				}
				txt += `	</tbody>
						</table>`;
				document.getElementById("table_antrian").innerHTML = txt;

				//----
				// var txt2 = "";
				// txt2 += `<table class="table table-bordered">
				// 			<thead>
				// 				<tr >
				// 					<th style="width: 100px; text-align: center">Antrian</th>
				// 				</tr>
				// 			</thead>
				// 			<tbody>`
				// for (x in objAntrianSdhPanggil) {
				// 	txt2 += `<tr>
				// 				<td style="text-align: center"><button class="btn btn-warning" onclick="panggilUlang(${objAntrianSdhPanggil[x]['no_antrian']})">${objAntrianSdhPanggil[x]['no_antrian']}</button></td>
				// 			</tr>`
				// }
				// txt2 += `	</tbody>
				// 		</table>`;
				// document.getElementById("table_panggil").innerHTML = txt2;

				//----
				var txt3 = "";
				txt3 += `<table class="table table-bordered">
							<thead>
								<tr >
									<th style="width: 20px">Antrian</th>
									<th style="width: 80px">Waktu</th>
								</tr>
							</thead>
							<tbody>`
				for (x in antrianPending) {
					txt3 += `<tr>
								<td>${antrianPending[x]['no_antrian']}</td>
								<td>Pending</td>
							</tr>`
				}
				txt3 += `	</tbody>
						</table>`;
				document.getElementById("panggilan_pending").innerHTML = txt3;

				//----
				var txt4 = "";
				txt4 += `<table class="table table-bordered">
							<thead>
								<tr >
									<th style="width: 20px">Antrian</th>
								</tr>
							</thead>
							<tbody>`
				for (x in objAntrianSdhPanggil) {
					txt4 += `<tr>
								<td>${objAntrianSdhPanggil[x]['no_antrian']}</td>
							</tr>`
				}
				txt4 += `	</tbody>
						</table>`;
				document.getElementById("panggilan_selesai").innerHTML = txt4;
			}


			// }
		});
	}

	// function panggilUlang(antrian) {
	// 	arrAntrian = splitNo(antrian.toString());
	// 	audioAntrian(arrAntrian);
	// }

	// function panggilManual(){
	// 	no_antrian_manual = document.getElementById('no_antrian_manual').value;
	// 	arrAntrian = splitNo(no_antrian_manual.toString());
	// 	audioAntrian(arrAntrian);
	// 	// alert(arrAntrian);
		
	// }
</script>

</html>
