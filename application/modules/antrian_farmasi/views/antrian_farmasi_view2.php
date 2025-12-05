<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Antrian Apotik</title>
    <style>
        html, body, .container, .row {
            height: 100%;
        }
    </style>
  </head>
  <body>
    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-4 bg-primary">col-sm-4</div>
            <div class="col-sm-8 bg-secondary">col-sm-8</div>
        </div>
    </div> -->
    <div class="container-fluid bg-warning px-3">
        <div class="row" style="text-align: center;">
            <!-- <marquee> -->
                <h1><b>ANTRIAN APOTEK PUSKESMAS MATRAMAN</b></h1>
            <!-- </marquee> -->
        </div>
        <div class="row g-0 bg-info">
            <div class="col-sm-4 bg-warning">
                <div class="card card-success card-outline" style="text-align: center;">
                    <div class="card-header bg-success">
                        <h1>ANTRIAN UMUM</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div style="width: 100%; height: 300px; overflow-y: scroll;">
                                    <ul class="list-group" id="panggilan_umum_proses">

                                    </ul>
                                </div>

                            </div>
                            <div class="col-sm-8">
                                <h1><b><span id="no_antrian_umum" style="font-size: 440%;"><?php echo $antrianUmum; ?></span></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card card-warning card-outline" style="text-align: center;">
                    <div class="card-header bg-primary">
                        <h1>ANTRIAN PRIORITAS</h1>
                    </div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-sm-4">
                                <div style="width: 100%; height: 300px; overflow-y: scroll;">
                                    <ul class="list-group" id="panggilan_lansia_proses">

                                    </ul>
                                </div>

                            </div>
                            <div class="col-sm-8">
                                <h1><b><span id="no_antrian_lansia" style="font-size: 400%;"><?php echo $antrianLansia; ?></span></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 bg-secondary">
                <iframe width="1255" height="750" src="https://www.youtube.com/embed/videoseries?si=112pifOKJWKoidw-&amp;list=PL2I1nhIRb4N8KE_Rn1nFmqVodX7e4VLFJ&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <!-- <iframe width="1255" height="750" src="https://youtu.be/MsbhFpqrJxw?si=-4600kaIX1C1YShG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                <!-- <iframe width="1255" height="750" src="https://www.youtube.com/embed/MsbhFpqrJxw?si=-4600kaIX1C1YShG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                <!-- <iframe 
                    width="480" 
                    height="840" 
                    src="https://www.youtube.com/embed/pYiBdbS19bg" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe> -->
            
            </div>
        </div>
        <marquee>
            <h3><b>Kesabaran Anda Kunci Ketelitian Kami</b></h3>
        </marquee>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
   
  </body>
</html>

<script>
    window.setTimeout("refreshListAntrian()", 1000);

    function refreshListAntrian() {
        setTimeout("refreshListAntrian()", 1000);

        $.ajax({
            type: "GET",
            dataType: "html",
            url: '<?php echo base_url('antrian_farmasi/getLastAntrian'); ?>',
            success: function(msg) {
                obj = JSON.parse(msg);
                console.log(obj);
                objAntrianUmum = obj['antrianUmum'];
                objAntrianUmumProses = obj['antrianUmumProses'];
                objAntrianLansia = obj['antrianLansia'];
                objAntrianLansiaProses = obj['antrianLansiaProses'];

                if (objAntrianUmum.length < 1) {
                    txtAntrianUmum = 0;
                } else {
                    txtAntrianUmum = objAntrianUmum[0]['no_antrian'];
                }
                if (objAntrianLansia.length < 1) {
                    txtAntrianLansia = 0;
                } else {
                    txtAntrianLansia = "P" + objAntrianLansia[0]['no_antrian'];
                }

                document.getElementById("no_antrian_umum").innerHTML = txtAntrianUmum;
                document.getElementById("no_antrian_lansia").innerHTML = txtAntrianLansia;


                let txt_antrian_umum_proses = "";
				txt_antrian_umum_proses += `<table class="table table-bordered">
							<thead>
								<tr >
									<th style="width: 20px">Proses</th>
								</tr>
							</thead>
							<tbody>`
				for (x in objAntrianUmumProses) {
					txt_antrian_umum_proses += `<tr>
								<td><span style="font-size: 40px;"><b>${objAntrianUmumProses[x]['no_antrian']}</b></span></td>
							</tr>`
				}
				txt_antrian_umum_proses += `	</tbody>
						</table>`;
				document.getElementById("panggilan_umum_proses").innerHTML = txt_antrian_umum_proses;

                let txt_antrian_lansia_proses = "";
				txt_antrian_lansia_proses += `<table class="table table-bordered">
							<thead>
								<tr >
									<th style="width: 20px">Proses</th>
								</tr>
							</thead>
							<tbody>`
				for (x in objAntrianLansiaProses) {
					txt_antrian_lansia_proses += `<tr>
								<td><span style="font-size: 40px;"><b>P${objAntrianLansiaProses[x]['no_antrian']}</b></span></td>
							</tr>`
				}
				txt_antrian_lansia_proses += `	</tbody>
						</table>`;
				document.getElementById("panggilan_lansia_proses").innerHTML = txt_antrian_lansia_proses;


            }


            // }
        });
    }
</script>