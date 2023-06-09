<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/sidebar'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">SKP</li>
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
									<div class="row">
										<div class="col-md-12">
											<?php echo form_open('admin/Skp/skpglobal'); ?>
											<div class="form-group">
												<label>Bulan</label>
												<div class="input-group date datepicker">
													<input type="text" name="tgl" id="tgl" value="<?php echo $tgl; ?>" class="form-control" />
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
											<div class="form-group">
												<label>Poli</label>
												<select id="poli" class="form-control select2bs4" style="width: 100%" name="poli">
													<option value="">All</option>
													<?php for ($i = 0; $i < count($poli); $i++) { ?>
														<option value="<?php echo $poli[$i]['id'] ?>" <?php if ($poli[$i]['id'] == $id_poli) {
																											echo "Selected";
																										} else {
																											echo "";
																										} ?>>
															<?php echo $poli[$i]['nama_poli'] ?>
														</option>
													<?php } ?>
												</select>
											</div>
											<button type="submit" name="submit" value="filter" class="btn btn-primary">Filter</button>
											<button type="submit" name="submit" value="print" class="btn btn-primary">Print</button>
											<?php form_close(); ?>
										</div>
									</div>
								</div>




								<!-- REKAP SKP -->
								<div class="card-body">
									<table class="table table-bordered table-striped"> <!--  id="example1" -->
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Sangat Puas</th>
												<th>Puas</th>
												<th>Cukup</th>
												<th>Kurang</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i = 0; $i < count($skp); $i++) {  ?>
												<tr>
													<td>
														<?php echo $i + 1;  ?>
													</td>
													<td>
														<?php echo $skp[$i]['tgl']; ?>
													</td>
													<td style="text-align:center">
														<?php echo $skp[$i]['1']; ?>
													</td>
													<td style="text-align:center">
														<?php echo $skp[$i]['2']; ?>
													</td>
													<td style="text-align:center">
														<?php echo $skp[$i]['3']; ?>
													</td>
													<td style="text-align:center">
														<?php echo $skp[$i]['4']; ?>
													</td>
												</tr>
											<?php }  ?>
											<tr>
												<th colspan='2'>Jumlah Per Kategori</th>
												<th style="text-align:center"><?php echo $skpTotal[0]['1']; ?></th>
												<th style="text-align:center"><?php echo $skpTotal[0]['2']; ?></th>
												<th style="text-align:center"><?php echo $skpTotal[0]['3']; ?></th>
												<th style="text-align:center"><?php echo $skpTotal[0]['4']; ?></th>
											</tr>
											<tr>
												<th colspan='2'>Jumlah Puas </th>
												<th colspan='4' style="text-align:center"><?php echo $total_puas_sangatpuas; ?></th>
												<!-- <th colspan='2' style="text-align:center"><?php echo $total_cukup_kurang; ?></th> -->
											</tr>
											<tr>
												<th colspan='2'>Jumlah Responden</th>
												<th colspan='4' style="text-align:center"><?php echo $total_responden; ?></th>
											</tr>
											<tr>
												<th colspan='2'>Realisasi</th>
												<th colspan='4' style="text-align:center"><?php echo $realisasi; ?>%</th>
											</tr>
										</tbody>
										<tfoot>
										</tfoot>
									</table>
								</div>

								<!-- SKP -->
								<!-- <div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal</th>
														<th>Respon</th>
													</tr>
												</thead>
												<tbody>
													<?php for ($i = 0; $i < count($skpDetail); $i++) {  ?>
													<tr>
														<td>
															<?php echo $i + 1;  ?>
														</td>
														<td>
															<?php echo $skpDetail[$i]['tanggal']; ?>
														</td>
														<td>
															<?php echo $skpDetail[$i]['status']; ?>
														</td>
													</tr>
													<?php }  ?>
												</tbody>
											</table>
										</div> -->
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

<script>
	$("#tgl").datepicker({
		format: "M yyyy",
		icons: {
			time: "fa fa-time",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: "fa fa-chevron-left",
			next: "fa fa-chevron-right",
			today: "fa fa-screenshot",
			clear: "fa fa-trash",
			close: "fa fa-remove",
		},
		startView: "months",
		minViewMode: "months",
	});
</script>


<?php $this->load->view('admin/footer'); ?>