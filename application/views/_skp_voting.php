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
            <b>SURVEI KEPUASAN PELANGGAN</b><br/>
            <p class="btn-secondary btn-lg" ><b><?php echo strtoupper($poli[0]['nama_poli']) ?></b></p>
            <input type="hidden" class="form-control" id="id_poli" placeholder="Id Poli" value="<?php echo $poli[0]['id']; ?>">
            
            <div class="form-group">

            </div>
        </div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#" id="smile1">
                        <div class=" small-box bg-success">
                        <div class="inner">
                            <h3><span style='font-size:30px;'>&#128516;</span></h3>

                            <p>Sangat Puas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="#" id="smile2">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><span style='font-size:30px;'>&#128578;</span></h3>

                            <p>Puas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="#" id="smile3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><span style='font-size:30px;'>&#128528;</span></h3>

                            <p>Cukup</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="#" id="smile4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><span style='font-size:30px;'>&#128544;</span></h3>

                            <p>Kurang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Silahkan pilih salah satu
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2022 <b><a href="https://adminlte.io" class="text-black">Puskesmas Kecamatan Matraman</a></b><br>
        All rights reserved <br/>
		<a href="<?php echo base_url('skp/adminskp'); ?>">Home</a>
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

        const smile1 = document.getElementById('smile1');
        const smile2 = document.getElementById('smile2');
        const smile3 = document.getElementById('smile3');
        const smile4 = document.getElementById('smile4');
        let poli = document.getElementById('id_poli').value;

        smile1.addEventListener('click', (e) => {
            e.preventDefault();
            pilihSmile('1', poli, tglNow);
        })

        smile2.addEventListener('click', (e) => {
            e.preventDefault();
            pilihSmile('2', poli, tglNow);
        })

        smile3.addEventListener('click', (e) => {
            e.preventDefault();
            pilihSmile('3', poli, tglNow);
        })

        smile4.addEventListener('click', (e) => {
            e.preventDefault();
            pilihSmile('4', poli, tglNow);
        })

        function pilihSmile(status, poli, tgl) {
            var dataArray = {
                "skp": {
                    "tanggal": tgl,
                    "id_poli": poli,
                    "id_status": status
                }
            }
            // console.log(dataArray);
            // return;

            $.ajax({
                type: "POST",
                data: dataArray,
                url: '<?php echo base_url('skp/saveSkp'); ?>',
                success: function(result) {
                    res = JSON.parse(result);
                    if(res.success==true){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.messages,
                            showConfirmButton: false,
                            timer: 1000
                        });

                        let promise = new Promise((resolve, reject) => {
                            setTimeout(() => resolve(
                                window.location = "<?php echo base_url() ?>" + 'skp/printAntrianFarmasi'
                            ), 1000)
                        });
                    }
                }
            })
        }

    </script>


    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
