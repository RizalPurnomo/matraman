<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/sidebar'); ?>

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
														<label>Tanggal</label>
														<div class="input-group date" id="reservationdate"
															data-target-input="nearest">
															<input type="text" class="form-control datetimepicker-input"
																value="<?php echo $tgl ?>"
																data-target="#reservationdate" name="tgl" />
															<div class="input-group-append"
																data-target="#reservationdate"
																data-toggle="datetimepicker">
																<div class="input-group-text">
																	<i class="fa fa-calendar"></i>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label>Poli</label>
														<select id="poli" class="form-control select2bs4"
															style="width: 100%" name="poli">
															<option value="">All</option>
															<?php for ($i = 0; $i < count($poli); $i++) { ?>
																<option value="<?php echo $poli[$i]['id'] ?>" <?php if($poli[$i]['id']==$id_poli){ echo "Selected";}else{ echo "";} ?>>
																	<?php echo $poli[$i]['nama_poli'] ?>
																</option>
															<?php } ?>
														</select>
													</div>
													<button type="submit" name="submit" class="btn btn-primary">Filter</button>
													<?php form_close(); ?>
												</div>
											</div>
										</div>



										<!-- REKAP SKP -->
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
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
														<td >
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
												</tbody>
												<tfoot>
													<tr>
														<th colspan='2'>Jumlah Per Kategori</th>
														<th style="text-align:center"><?php echo $skpTotal[0]['1']; ?></th>
														<th style="text-align:center"><?php echo $skpTotal[0]['2']; ?></th>
														<th style="text-align:center"><?php echo $skpTotal[0]['3']; ?></th>
														<th style="text-align:center"><?php echo $skpTotal[0]['4']; ?></th>
													</tr>
													<tr>
														<th colspan='2'>Jumlah Puas / Tidak Puas</th>
														<th colspan='2' style="text-align:center"><?php echo $total_puas_sangatpuas; ?></th>
														<th colspan='2' style="text-align:center"><?php echo $total_cukup_kurang; ?></th>
													</tr>
													<tr>
														<th colspan='2'>Jumlah Responden</th>
														<th colspan='4' style="text-align:center"><?php echo $total_responden; ?></th>
													</tr>
													<tr>
														<th colspan='2'>Realisasi</th>
														<th colspan='4' style="text-align:center"><?php echo $realisasi; ?>%</th>
													</tr>
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


<?php $this->load->view('admin/footer'); ?>