<?php $this->load->view('header'); ?>
<?php $this->load->view('sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">SKP</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Main row -->
			<div class="row">
				<section class="col-lg-12 connectedSortable">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-md-12">
											<?php //echo form_open('skp/adminSkp'); ?>
											<div class="form-group">
												<label>Tanggal</label>
												<div class="input-group date" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" id="reservationmonthyear" data-target="#reservationmonthyear" value="<?php echo $tgl; ?>" />
													<div class="input-group-append" data-target="#reservationmonthyear" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Poli</label>
												<select id="poli" class="form-control select2bs4" style="width: 100%;">
													<?php for ($i = 0; $i < count($poli); $i++) { ?>
														<option value="<?php echo $poli[$i]['id'] ?>"><?php echo $poli[$i]['nama_poli'] ?></option>
													<?php } ?>
												</select>
											</div>
											<?php //echo form_close(); ?>
										</div>
									</div>
								</div>

								<!-- SKP -->
								<div class="card-body">
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
													<td><?php echo $i + 1;  ?></td>
													<td><?php echo $skpDetail[$i]['tanggal']; ?></td>
													<td><?php echo $skpDetail[$i]['status']; ?></td>
												</tr>
											<?php }  ?>
										</tbody>
									</table>
								</div>

								<!-- REKAP SKP -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>1</th>
												<th>2</th>
												<th>3</th>
												<th>4</th>
											</tr>
										</thead>
										<tbody>
											<?php for ($i = 0; $i < count($skp); $i++) {  ?>
												<tr>
													<td><?php echo $i + 1;  ?></td>
													<td><?php echo $skp[$i]['tgl']; ?></td>
													<td><?php echo $skp[$i]['1']; ?></td>
													<td><?php echo $skp[$i]['2']; ?></td>
													<td><?php echo $skp[$i]['3']; ?></td>
													<td><?php echo $skp[$i]['4']; ?></td>
												</tr>
											<?php }  ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
				</section>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('footer'); ?>
