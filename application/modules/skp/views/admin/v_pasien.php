<?php $this->load->view('admin/v_header'); ?>
<?php $this->load->view('admin/v_sidebar'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pasien Haji</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pasien Haji</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Pasien Haji
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body ">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Tgl Lahir</th>
                                            <th>JK</th>
                                            <th>No HP</th>
                                            <th>Tgl Awal Pemantauan</th>
                                            <th>Tgl Akhir Pemantauan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function fillColor($stat)
                                        {
                                            if ($stat == "Ya") {
                                                $fill = "bgcolor='red'";
                                            } else {
                                                $fill = "";
                                            }
                                            return $fill;
                                        }
                                        ?>
                                        <?php for ($i = 0; $i < count($pasien); $i++) { ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $pasien[$i]['nama'] ?></td>
                                                <td><?php echo $pasien[$i]['alamat'] ?></td>
                                                <td><?php echo $pasien[$i]['kelurahan'] ?></td>
                                                <td><?php echo $pasien[$i]['tgl_lahir'] ?></td>
                                                <td><?php echo $pasien[$i]['jk'] ?></td>
                                                <td><?php echo $pasien[$i]['no_hp'] ?></td>
                                                <td><?php echo $pasien[$i]['tgl_awal_pemantauan'] ?></td>
                                                <td><?php echo $pasien[$i]['tgl_akhir_pemantauan'] ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>haji/admin/haji/edit/<?php echo $pasien[$i]['id_pasien_haji']; ?>" class="btn btn-social-icon btn-info"><i class="fa fa-edit"></i></a>
                                                </td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Tgl Lahir</th>
                                            <th>JK</th>
                                            <th>No HP</th>
                                            <th>Tgl Awal Pemantauan</th>
                                            <th>Tgl Akhir Pemantauan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/v_footer'); ?>