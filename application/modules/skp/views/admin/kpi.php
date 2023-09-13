<?php $this->load->view('admin/v_header'); ?>
<?php $this->load->view('admin/v_sidebar'); ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	status_edit = "";

	function proses() {
		$('#modal-lg').modal('toggle');
		let tahun = document.getElementById("tahun").value;
		let bulan = document.getElementById("bulan").value;
		document.getElementById('kpi_tahun').value = tahun;
		document.getElementById('kpi_bulan').value = bulan;

		var dataArray = {
			"tahun": tahun,
			"bulan": bulan
		}

		$.ajax({
			type: "POST",
			data: dataArray,
			url: '<?php echo base_url('skp/admin/skp/getTarget'); ?>',
			success: function(result) {
				res = JSON.parse(result);
				if (res.length > 0) {
					target_dinas = res[0][bulan];
					status_edit = "true";
				} else {
					target_dinas = "";
					status_edit = "false";
				}
				document.getElementById('target_dinas').value = target_dinas;
			}
		})
	}

	function syncronKPI() {
		let target_dinas = document.getElementById("target_dinas").value;
		let tahun = document.getElementById('kpi_tahun').value;
		let bulan = document.getElementById('kpi_bulan').value;
		if (target_dinas == "") {
			alert("Harap Lengkapi Data");
			return;
		}

		if (status_edit == "true") {
			var dataArray = {
				"target_dinas": target_dinas,
				"periode": {
					"tahun": tahun,
					"bulan": bulan
				}
			}

			$.ajax({
				type: "POST",
				data: dataArray,
				url: '<?php echo base_url('skp/admin/skp/syncronKPI'); ?>',
				success: function(result) {
					res = JSON.parse(result);
					console.log(res);
					if (res.success == "true") {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: res.messages,
							showConfirmButton: false,
							timer: 1000
						});

						let promise = new Promise((resolve, reject) => {
							setTimeout(() => resolve(
								window.location = "<?php echo base_url() ?>" + 'skp/admin/skp/kpi/'
							), 1000)
						});
					}

				}
			})
		} else {

		}

	}

	function exportExcel() {
		let tahun = document.getElementById("tahun").value;
		let dataArray = {
			"tahun": tahun
		}
		$.ajax({
			type: "POST",
			data: dataArray,
			url: '<?php echo base_url('skp/admin/skp/exportExcel'); ?>',
			success: function(result) {
				res = JSON.parse(result);
				console.log(res);
				// if(res.success == "true"){
				// 	Swal.fire({
				// 		position: 'top-end',
				// 		icon: 'success',
				// 		title: res.messages,
				// 		showConfirmButton: false,
				// 		timer: 1000
				// 	});

				// 	let promise = new Promise((resolve, reject) => {
				// 		setTimeout(() => resolve(
				// 			window.location = "<?php echo base_url() ?>" + 'admin/skp/kpi/' 
				// 		), 1000)
				// 	});
				// }

			}
		})
	}
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Laporan KPI</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">SKP</a></li>
						<li class="breadcrumb-item active">Laporan KPI</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<section class="col-lg-12 connectedSortable">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="col-6">
										Laporan KPI Tahun 2023
										<?php echo form_open('skp/admin/skp/exportExcel'); ?>
										<div class="row">
											<div class="col-4">
												<select class="form-control select2bs4" style="width: 100%;" id="bulan" name="bulan">
													<option value="jan" selected="selected">Januari</option>
													<option value="feb">Februari</option>
													<option value="mar">Maret</option>
													<option value="apr">April</option>
													<option value="mei">Mei</option>
													<option value="jun">Juni</option>
													<option value="jul">Juli</option>
													<option value="agu">Agustus</option>
													<option value="sep">September</option>
													<option value="okt">Oktober</option>
													<option value="nov">November</option>
													<option value="des">Desember</option>
												</select>
											</div>
											<div class="col-4">
												<input type="text" id="tahun" name="tahun" class="form-control" value="<?php echo date('Y'); ?>" placeholder="Tahun">
											</div>
											<div class="col-2">
												<button type="button" class="btn btn-block btn-info" onclick="proses()">Proses</button>
												<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
															Proses
														</button> -->
											</div>
											<div class="col-2">
												<button type="submit" name="submit" value="export" class="btn btn-block btn-info">Export</button>
											</div>
										</div>
										<?php echo form_close(); ?>
									</div>
								</div>
								<div class="card-body">
									<table id="example" class="table table-bordered">
										<thead>
											<tr>
												<th>Indikator</th>
												<th>Cara Menghitung</th>
												<th>Bulan</th>
												<th>JAN</th>
												<th>FEB</th>
												<th>MAR</th>
												<th>APR</th>
												<th>MEI</th>
												<th>JUN</th>
												<th>JUL</th>
												<th>AGU</th>
												<th>SEP</th>
												<th>OKT</th>
												<th>NOV</th>
												<th>DES</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i = 0; $i < count($kpi); $i++) { ?>
												<tr>
													<?php if ($i == 0) { ?>
														<td rowspan='3' class='align-middle'>Tingkat Kepuasan Masyarakat</td>
														<td rowspan='3' class='align-middle'>Jumlah masyarakat yang menyatakan sangat puas dan puas dibagi jumlah masyarakat yang menggunakan sarana kesehatan milik Pemda DKI Jakarta x 100%</td>
													<?php } ?>
													<td><?php echo $kpi[$i]['jenis']; ?></td>
													<td><?php echo $kpi[$i]['jan']; ?></td>
													<td><?php echo $kpi[$i]['feb']; ?></td>
													<td><?php echo $kpi[$i]['mar']; ?></td>
													<td><?php echo $kpi[$i]['apr']; ?></td>
													<td><?php echo $kpi[$i]['mei']; ?></td>
													<td><?php echo $kpi[$i]['jun']; ?></td>
													<td><?php echo $kpi[$i]['jul']; ?></td>
													<td><?php echo $kpi[$i]['agu']; ?></td>
													<td><?php echo $kpi[$i]['sep']; ?></td>
													<td><?php echo $kpi[$i]['okt']; ?></td>
													<td><?php echo $kpi[$i]['nov']; ?></td>
													<td><?php echo $kpi[$i]['des']; ?></td>
												</tr>

											<?php } ?>

										</tbody>
										<tfoot>

										</tfoot>
									</table>
								</div>


							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Syncron KPI</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="form-group">
						<label>Target Dinas</label>
						<div class="row">
							<div class="col-8">
								<input type="text" id="kpi_bulan" name="kpi_bulan" class="form-control" placeholder="Bulan" disabled>
							</div>
							<div class="col-4">
								<input type="text" id="kpi_tahun" name="kpi_tahun" class="form-control" placeholder="Tahun" disabled>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Target Dinas</label>
						<input type="text" id="target_dinas" name="target_dinas" class="form-control" placeholder="Target">
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary" id="btn_syncron" name="btn_syncron" onclick="syncronKPI()">Syncron KPI</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<?php $this->load->view('admin/v_footer'); ?>