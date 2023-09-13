<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puskesmas Kecamatan Matraman | SKP Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <a href="<?php echo base_url() ?>admin/skp/skpglobal"><i class="fas fa-globe"></i> Rekap SKP <?php echo $tgl ?> <br />
                            Poli : <?php echo $nama_poli; ?> </a>
                        <small class="float-right">Date: <?php echo date("d M Y") ?></small>
                    </h2>
                    <input type="hidden" name="tgl" id="tgl" value="<?php echo $tgl; ?>">
                    <input type="hidden" name="id_poli" id="id_poli" value="<?php echo $id_poli; ?>">
                </div>
                <!-- /.col -->
            </div>

            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-sm">
                    <div class="box-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <br /><br />
            <div class="row">
                <div class="col-12">
                    <table border="1" width="100%">
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

                    </table>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        // window.addEventListener("load", window.print());
    </script>

</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    function getDataChart() {
        tgl = new Date($('#tgl').val());
        id_poli = $('#id_poli').val();
        month = tgl.getMonth() + 1;
        year = tgl.getFullYear();

        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>skp/admin/skp/getDataChart",
            data: {
                'id_poli': id_poli,
                'month': month,
                'year': year
            },
            success: function(result) {
                res = JSON.parse(result);
                // console.log(res.data.skp);
                // console.log(res);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: res.data.tanggal,
                        datasets: [{
                            label: 'Sangat Puas',
                            backgroundColor: "#09FF1B",
                            data: res.data.arr1,
                            borderWidth: 1
                        }, {
                            label: 'Puas',
                            backgroundColor: "#CEFF40",
                            data: res.data.arr2,
                            borderWidth: 1
                        }, {
                            label: 'Cukup',
                            backgroundColor: "#FFCE40",
                            data: res.data.arr3,
                            borderWidth: 1
                        }, {
                            label: 'Kurang',
                            backgroundColor: "#FE431A",
                            data: res.data.arr4,
                            borderWidth: 1
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            }
        })
    }
</script>

<script>
    $(document).ready(function() {
        getDataChart();
    });
</script>

</html>