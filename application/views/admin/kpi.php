<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/sidebar'); ?>

<script>
    function proses(){
		$('#modal-lg').modal('toggle');
		// let tahun=document.getElementById("tahun").value;
		// let bulan=document.getElementById("bulan").value;
        // alert(bulan);

		// $.ajax({
		// 	type: "POST",
		// 	data: dataArray,
		// 	url: '<?php echo base_url('skp/saveSkp'); ?>',
		// 	success: function(result) {
		// 		res = JSON.parse(result);
		// 		if(res.success==true){
		// 			Swal.fire({
		// 				position: 'top-end',
		// 				icon: 'success',
		// 				title: res.messages,
		// 				showConfirmButton: false,
		// 				timer: 1000
		// 			});

		// 			let promise = new Promise((resolve, reject) => {
		// 				setTimeout(() => resolve(
		// 					window.location = "<?php echo base_url() ?>" + 'skp/printAntrianFarmasi'
		// 				), 1000)
		// 			});
		// 		}
		// 	}
		// })
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
												<div class="row">
													<div class="col-6">
													<select class="form-control select2bs4" style="width: 100%;" id="bulan" name="bulan">
														<option value="januari" selected="selected">Januari</option>
														<option value="februari">Februari</option>
														<option value="maret">Maret</option>
														<option value="april">April</option>
														<option value="mei">Mei</option>
														<option value="juni">Juni</option>
														<option value="jul">Juli</option>
														<option value="agustus">Agustus</option>
														<option value="september">September</option>
														<option value="oktober">Oktober</option>
														<option value="novamber">November</option>
														<option value="desembar">Desember</option>
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
                							</div>
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
													<?php for ($i=0; $i < count($kpi) ; $i++) { ?>
														<tr>
															<?php if($i==0){ ?>
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
										<input type="text" class="form-control" placeholder="Bulan" disabled>
									</div>
									<div class="col-4">
										<input type="text" class="form-control" placeholder="Tahun" disabled>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Target Dinas</label>
								<input type="text" class="form-control" placeholder="Target">
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary">Syncron KPI</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
      </div>


<?php $this->load->view('admin/footer'); ?>