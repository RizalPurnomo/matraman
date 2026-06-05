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

	<!-- Feather Icons -->
	<script src="https://unpkg.com/feather-icons"></script>
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
							<a href="<?php echo base_url('skp/survei_kepuasan'); ?>" class="nav-link">SKP V2</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('antrian_farmasi/tampil_loket_farmasi'); ?>" class="nav-link">Display TV</a>
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
						<div class="col-lg-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">ANTRIAN OFFLINE </h5>
								</div>
								<div class="card-body">
									Panggil Berdasarkan Nomor Antrian
									<div class="input-group input-group-md">
										<input type="text" id="no_antrian_offline" name="no_antrian_offline" class="form-control" placeholder="Ketik Nomor Antrian">
										<span class="input-group-append">
											<button type="button" onclick="panggilOffline()"><i class="fa fa-phone-volume"></i></button>
										</span>
									</div>
									<br/>
									Panggil Berdasarkan Nama
									<div class="input-group input-group-md">
										<input type="text" id="txtInput" name="txtInput" class="form-control" placeholder="Ketik Nama Pasien">
										<span class="input-group-append">
											<button id="btnSpeak" type="button"><i class="fa fa-phone-volume"></i></button>
										</span>
									</div>
									<select id='voiceList' class="form-control"></select> <br><br>


									<!-- <input id='txtInput' /> <br><br>    
									<button id='btnSpeak'>Speak!</button> -->
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">ANTRIAN UMUM </h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-4">
											<div class="card card-primary card-outline">
												<div class="card-body">
													<h6>Panggil Manual </h6>
													<div class="input-group input-group-md">
														<input type="text" id="no_antrian_manual_umum" name="no_antrian_manual_umum" class="form-control">
														<span class="input-group-append">
															<button type="button" onclick="panggilManual('umum')"><i class="fa fa-phone-volume"></i></button>
														</span>
													</div>
													
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="card card-primary card-outline">
														<div class="card-body">
															<h6>List Antrian </h6>
															<div id="table_antrian_umum">

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<div id="div_ket_umum" class="alert alert-danger alert-dismissible" style="display:none;">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<h4><i class="icon fa fa-info"></i> <span id="judul_ket_umum"></span></h4>
												<p id="ket_umum"></p>
											</div>
											<div class="card card-primary card-outline" style="text-align: center;">
												<div class="card-body">
													<h1><b><span id="no_antrian_umum"><?php echo $no_antrian_umum; ?></span></b></h1>
													<button class="btn btn-primary" id="reply_umum">Reply</button> - <button class="btn btn-success" id="next_umum">Next</button>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="card card-primary card-outline">
														<div class="card-body">
															<h6>Panggilan Pending </h6>
															<div id="panggilan_pending_umum">

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-success card-outline">
								<div class="card-header">
									<h5 class="card-title m-0">ANTRIAN PRIORITAS </h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-4">
											<div class="card card-success card-outline">
												<div class="card-body">
													<h6>Panggil Manual </h6>
													<div class="input-group input-group-md">
														<input type="text" id="no_antrian_manual_lansia" name="no_antrian_manual_lansia" class="form-control">
														<span class="input-group-append">
															<button type="button" onclick="panggilManualLansia()"><i class="fa fa-phone-volume"></i></button>
														</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="card card-success card-outline">
														<div class="card-body">
															<h6>List Antrian </h6>
															<div id="table_antrian_lansia">

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<div id="div_ket_lansia" class="alert alert-danger alert-dismissible" style="display:none;">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<h4><i class="icon fa fa-info"></i> <span id="judul_ket_lansia"></span></h4>
												<p id="ket_lansia"></p>
											</div>
											<div class="card card-success card-outline" style="text-align: center;">
												<div class="card-body">
													<h1><b><span id="no_antrian_lansia"><?php echo $no_antrian_lansia; ?></span></b></h1>
													<button class="btn btn-primary" id="reply_lansia">Reply</button> - <button class="btn btn-success" id="next_lansia">Next</button>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="card card-success card-outline">
														<div class="card-body">
															<h6>Panggilan Pending </h6>
															<div id="panggilan_pending_lansia">

															</div>
														</div>
													</div>
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
				Puskesmas Matraman
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2023 <a href="https://puskesmasmatraman.jakarta.go.id/">Puskesmas Matraman</a>.</strong> All rights reserved.
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
	// ═══════════════════════════════════════════════
	// CONSTANTS & STATE
	// ═══════════════════════════════════════════════
	const BASE_URL = '<?= base_url() ?>';

	const state = {
		statusAudio: '',        // '', 'running', 'end'
		music: new Audio(),
		pendingUmum:   [],
		pendingLansia: [],
	};

	// ═══════════════════════════════════════════════
	// DOM REFS
	// ═══════════════════════════════════════════════
	const el = {
		voiceList:             document.querySelector('#voiceList'),
		btnSpeak:              document.querySelector('#btnSpeak'),
		txtInput:              document.querySelector('#txtInput'),
		noAntrianUmum:         document.getElementById('no_antrian_umum'),
		noAntrianLansia:       document.getElementById('no_antrian_lansia'),
		replyUmum:             document.getElementById('reply_umum'),
		nextUmumBtn:           document.getElementById('next_umum'),
		replyLansia:           document.getElementById('reply_lansia'),
		nextLansiaBtn:         document.getElementById('next_lansia'),
		noManualUmum:          document.getElementById('no_antrian_manual_umum'),
		noManualLansia:        document.getElementById('no_antrian_manual_lansia'),
		noAntrianOffline:      document.getElementById('no_antrian_offline'),
		tableAntrianUmum:      document.getElementById('table_antrian_umum'),
		tableAntrianLansia:    document.getElementById('table_antrian_lansia'),
		pendingTableUmum:      document.getElementById('panggilan_pending_umum'),
		pendingTableLansia:    document.getElementById('panggilan_pending_lansia'),
	};

	// ═══════════════════════════════════════════════
	// SPEECH SYNTHESIS
	// ═══════════════════════════════════════════════
	const synth  = window.speechSynthesis;
	let   voices = [];

	function populateVoices() {
		voices = synth.getVoices();
		el.voiceList.innerHTML = '';
		voices.forEach(voice => {
			const opt = document.createElement('option');
			opt.textContent = voice.name;
			opt.dataset.lang = voice.lang;
			opt.dataset.name = voice.name;
			el.voiceList.appendChild(opt);
		});
		el.voiceList.selectedIndex = 14;
	}

	populateVoices();
	if (speechSynthesis !== undefined) {
		speechSynthesis.onvoiceschanged = populateVoices;
	}

	el.btnSpeak.addEventListener('click', () => {
		const selectedName = el.voiceList.selectedOptions[0].dataset.name;
		const utt = new SpeechSynthesisUtterance(
			`Atas Nama ${el.txtInput.value}, Silahkan Menuju Apotik`
		);
		utt.voice = voices.find(v => v.name === selectedName) ?? null;
		synth.speak(utt);
	});

	// ═══════════════════════════════════════════════
	// AUDIO
	// ═══════════════════════════════════════════════

	/** Memutar satu file audio, returns Promise */
	function playAudio(filename) {
		return new Promise((resolve, reject) => {
			state.music.src = `${BASE_URL}assets/upload/dubbing/${filename}.mp3`;
			state.music.play().catch(reject);
			state.music.onended = resolve;
		});
	}

	/** Memutar seluruh sequence audio nomor antrian */
	async function audioAntrian(arrAntrian) {
		try {
			await playAudio('nomor antrian/nomor antrian');

			for (const token of arrAntrian) {
				await playAudio(`angka/${token}`);
			}

			await playAudio('angka/silahkan menuju ke');
			await playAudio('angka/apotik');

			state.statusAudio = 'end';
		} catch (err) {
			console.error('audioAntrian error:', err);
			state.statusAudio = 'end';
		}
	}

	// ═══════════════════════════════════════════════
	// SPLIT NOMOR → TOKEN AUDIO
	// ═══════════════════════════════════════════════

	/**
	 * Mengubah angka 0-999 menjadi array token audio Bahasa Indonesia.
	 * Contoh: 132 → ['seratus', '3', 'puluh', '2']
	 */
	function splitAngka(n) {
		if (n === 0) return ['0'];

		const tokens = [];
		if (n >= 100) {
			const ratus = Math.floor(n / 100);
			tokens.push(ratus === 1 ? 'seratus' : `${ratus}`, ...(ratus === 1 ? [] : ['ratus']));
			n %= 100;
			if (n === 0) return tokens;
		}
		if (n >= 10) {
			if      (n === 10) { tokens.push('sepuluh'); return tokens; }
			else if (n === 11) { tokens.push('sebelas');  return tokens; }
			else if (n <= 19)  { tokens.push(`${n % 10}`, 'belas'); return tokens; }
			else {
				tokens.push(`${Math.floor(n / 10)}`, 'puluh');
				if (n % 10 !== 0) tokens.push(`${n % 10}`);
				return tokens;
			}
		}
		tokens.push(`${n}`);
		return tokens;
	}

	/**
	 * Mengubah string nomor antrian (misal "P132", "067") menjadi
	 * array token audio siap pakai.
	 */
	function splitNo(angka) {
		const str = String(angka).trim();
		if (!str || str === '0') return ['0'];

		const isLansia = str.startsWith('P');
		const numStr   = isLansia ? str.slice(1) : str;
		const num      = parseInt(numStr, 10);

		if (isNaN(num)) return ['0'];

		const tokens = isLansia ? ['P'] : [];
		return tokens.concat(splitAngka(num));
	}

	// ═══════════════════════════════════════════════
	// AJAX HELPER
	// ═══════════════════════════════════════════════

	/**
	 * Wrapper Promise di atas $.ajax agar bisa di-await.
	 * @param {'GET'|'POST'} method
	 * @param {string}        url
	 * @param {object}        [data]
	 */
	function ajaxRequest(method, url, data = null) {
		return new Promise((resolve, reject) => {
			$.ajax({
				type:     method,
				dataType: 'json',
				url,
				data,
				success: resolve,
				error:   (xhr, status, err) => reject(new Error(`${status}: ${err}`)),
			});
		});
	}

	// ═══════════════════════════════════════════════
	// TOAST NOTIFIKASI
	// ═══════════════════════════════════════════════

	/**
	 * Tampilkan pesan notifikasi (fade out otomatis).
	 * @param {'umum'|'lansia'} jenis
	 * @param {string}           judul
	 * @param {string}           pesan
	 */
	function showToast(jenis, judul, pesan) {
		$(`#judul_ket_${jenis}`).html(judul);
		$(`#ket_${jenis}`).html(pesan);
		$(`#div_ket_${jenis}`).show()
			.fadeTo(3000, 500)
			.slideUp(500, function () { $(this).hide(); });
	}

	// ═══════════════════════════════════════════════
	// LOGIKA ANTRIAN — GENERIK (Umum & Lansia)
	// ═══════════════════════════════════════════════

	/**
	 * Lanjut ke antrian berikutnya.
	 * @param {'umum'|'lansia'} jenis
	 */
	async function nextAntrian(jenis) {
		state.statusAudio = 'running';
		const url = {
			umum:   '<?= base_url("antrian_farmasi/update_antrian_umum") ?>',
			lansia: '<?= base_url("antrian_farmasi/update_antrian_lansia") ?>',
		}[jenis];

		try {
			const result = await ajaxRequest('POST', url, { antrian: { panggil: '1' } });

			if (result.success) {
				el[`noAntrian${capitalize(jenis)}`].textContent = result.no;
				await audioAntrian(splitNo(result.no));
			} else {
				state.statusAudio = '';
				showToast(jenis, 'Error', 'Data Antrian Blm Ada');
			}
		} catch (err) {
			console.error(`nextAntrian(${jenis}) error:`, err);
			state.statusAudio = '';
		}
	}

	/**
	 * Tandai antrian sebagai pending.
	 * @param {'umum'|'lansia'} jenis
	 */
	async function pendingAntrian(jenis) {
		const url = {
			umum:   '<?= base_url("antrian_farmasi/updatePendingUmum") ?>',
			lansia: '<?= base_url("antrian_farmasi/updatePendingLansia") ?>',
		}[jenis];

		try {
			const result = await ajaxRequest('POST', url, { antrian: { panggil: '2' } });
			state[`pending${capitalize(jenis)}`].push(result);
		} catch (err) {
			console.error(`pendingAntrian(${jenis}) error:`, err);
		}
	}

	/**
	 * Lanjut ke antrian pending berikutnya.
	 * @param {'umum'|'lansia'} jenis
	 */
	async function nextPendingAntrian(jenis) {
		if (state.statusAudio !== 'end' && state.statusAudio !== '') return;

		const url = {
			umum:   '<?= base_url("antrian_farmasi/updateNextPendingUmum") ?>',
			lansia: '<?= base_url("antrian_farmasi/updateNextPendingLansia") ?>',
		}[jenis];

		try {
			const result = await ajaxRequest('POST', url, { antrian: { panggil: '1' } });

			if (result.success) {
				state.statusAudio = 'running';
				const elNo   = el[`noAntrian${capitalize(jenis)}`];
				const prefix = jenis === 'lansia' ? 'P' : '';
				const curr   = parseInt(elNo.textContent.replace('P', ''), 10);
				const next   = `${prefix}${curr + 1}`;
				elNo.textContent = next;
				await audioAntrian(splitNo(next));
			}
		} catch (err) {
			console.error(`nextPendingAntrian(${jenis}) error:`, err);
		}
	}

	/**
	 * Panggil manual berdasarkan nomor yang diinput.
	 * @param {'umum'|'lansia'} jenis
	 */
	async function panggilManual(jenis) {
		const inputEl = el[`noManual${capitalize(jenis)}`];
		const noInput = inputEl.value.trim();

		if (!noInput) {
			showToast(jenis, 'Error', 'Harap Lengkapi data');
			return;
		}

		const url = {
			umum:   `<?= base_url("antrian_farmasi/updateAntrianUmumManual/") ?>${noInput}`,
			lansia: `<?= base_url("antrian_farmasi/updateAntrianLansiaManual/") ?>${noInput}`,
		}[jenis];

		state.statusAudio = 'running';

		try {
			const result = await ajaxRequest('POST', url, { antrian: { panggil: '1' } });

			if (result.success) {
				el[`noAntrian${capitalize(jenis)}`].textContent = result.no;
				await audioAntrian(splitNo(result.no));
			} else {
				state.statusAudio = '';
				showToast(jenis, 'Error', 'Data Antrian Blm Ada');
			}
		} catch (err) {
			console.error(`panggilManual(${jenis}) error:`, err);
			state.statusAudio = '';
		}
	}

	// ═══════════════════════════════════════════════
	// OFFLINE & REPLY
	// ═══════════════════════════════════════════════

	async function panggilOffline() {
		const no = el.noAntrianOffline.value.trim();
		if (!no) return;
		await audioAntrian(splitNo(no));
	}

	// ═══════════════════════════════════════════════
	// EVENT LISTENERS
	// ═══════════════════════════════════════════════

	el.noAntrianOffline.addEventListener('keypress', e => {
		if (e.key === 'Enter') panggilOffline();
	});

	el.replyUmum.addEventListener('click', async () => {
		await audioAntrian(splitNo(el.noAntrianUmum.textContent));
	});

	el.nextUmumBtn.addEventListener('click', () => {
		if (state.statusAudio === 'end' || state.statusAudio === '') {
			nextAntrian('umum');
		} else {
			pendingAntrian('umum');
		}
	});

	el.replyLansia.addEventListener('click', async () => {
		await audioAntrian(splitNo(el.noAntrianLansia.textContent));
	});

	el.nextLansiaBtn.addEventListener('click', () => {
		if (state.statusAudio === 'end' || state.statusAudio === '') {
			nextAntrian('lansia');
		} else {
			pendingAntrian('lansia');
		}
	});

	el.noManualUmum.addEventListener('keypress',   e => { if (e.key === 'Enter') panggilManual('umum'); });
	el.noManualLansia.addEventListener('keypress', e => { if (e.key === 'Enter') panggilManual('lansia'); });

	// ═══════════════════════════════════════════════
	// RENDER TABLE
	// ═══════════════════════════════════════════════

	function renderTableAntrian(data, withHapus = true) {
		const rows = data.map(item => {
			const no     = (item.prioritas == 0 ? 'P' : '') + item.no_antrian;
			const waktu  = item.created_at.substring(11);
			const hapus  = withHapus
				? ` - <a href="#" onclick="hapusAntrian('${item.id}')">hapus</a>`
				: '';
			return `<tr><td>${no}</td><td>${waktu}${hapus}</td></tr>`;
		}).join('');

		return `<table class="table table-sm table-bordered">
			<thead><tr><th style="width:20px">No</th><th style="width:80px">Waktu</th></tr></thead>
			<tbody>${rows}</tbody>
		</table>`;
	}

	function renderTablePending(data) {
		const rows = data.map(item =>
			`<tr><td>${item.no_antrian}</td><td>Pending</td></tr>`
		).join('');

		return `<table class="table table-bordered">
			<thead><tr><th style="width:20px">Antrian</th><th style="width:80px">Waktu</th></tr></thead>
			<tbody>${rows}</tbody>
		</table>`;
	}

	// ═══════════════════════════════════════════════
	// REFRESH POLLING
	// ═══════════════════════════════════════════════

	async function refreshListAntrian() {
		try {
			const {
				antrianUmum,
				antrianUmumPending,
				antrianLansia,
				antrianLansiaPending,
			} = await ajaxRequest('GET', '<?= base_url("antrian_farmasi/refreshTable") ?>');

			// Auto-proses pending jika ada
			if (antrianUmumPending.length > 0)   await nextPendingAntrian('umum');
			if (antrianLansiaPending.length > 0) await nextPendingAntrian('lansia');

			// Render tables
			el.tableAntrianUmum.innerHTML    = renderTableAntrian(antrianUmum);
			el.tableAntrianLansia.innerHTML  = renderTableAntrian(antrianLansia);
			el.pendingTableUmum.innerHTML    = renderTablePending(antrianUmumPending);
			el.pendingTableLansia.innerHTML  = renderTablePending(antrianLansiaPending);

		} catch (err) {
			console.error('refreshListAntrian error:', err);
		} finally {
			setTimeout(refreshListAntrian, 1000);
		}
	}

	async function hapusAntrian(id) {
		if (!confirm(`Hapus antrian ID ${id}?`)) return;
		try {
			await ajaxRequest('POST', `<?= base_url("antrian_farmasi/deleteAntrian/") ?>${id}`);
		} catch (err) {
			console.error('hapusAntrian error:', err);
		}
	}

	// ═══════════════════════════════════════════════
	// UTIL
	// ═══════════════════════════════════════════════
	const capitalize = str => str.charAt(0).toUpperCase() + str.slice(1);

	// ── START ──
	refreshListAntrian();


	feather.replace();
</script>

</html>