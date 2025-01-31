<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Antrian Apotik</title>
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
                <h1><b>ANTRIAN APOTEK PUSKESMAS KECAMATAN MATRAMAN</b></h1>
            <!-- </marquee> -->
        </div>
        <div class="row g-0 bg-info">
            <div class="col-sm-4 bg-warning">
                <div class="card card-success card-outline" style="text-align: center;">
                    <div class="card-header bg-success">
                        <h1>ANTRIAN UMUM</h1>
                    </div>
                    <div class="card-body">
                        <h1><b><span id="no_antrian_umum" style="font-size: 550%;"><?php echo $antrianUmum; ?></span></b></h1>
                    </div>
                </div>
                <br/>
                <div class="card card-warning card-outline" style="text-align: center;">
                    <div class="card-header bg-primary">
                        <h1>ANTRIAN PRIORITAS</h1>
                    </div>
                    <div class="card-body">
                        <h1><b><span id="no_antrian_lansia" style="font-size: 550%;"><?php echo $antrianLansia; ?></span></b></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 bg-secondary">
                <!-- <iframe width="1250" height="750" src="https://www.youtube.com/embed/tg8q6HWAScU?si=VsfgkPAaFEe1P_NH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                <!-- <iframe width="1255" height="750" src="https://www.youtube.com/watch?v=2Jabqr40hTQ&list=PL2I1nhIRb4N8KE_Rn1nFmqVodX7e4VLFJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                <iframe width="1255" height="750" src="https://www.youtube.com/embed/videoseries?si=112pifOKJWKoidw-&amp;list=PL2I1nhIRb4N8KE_Rn1nFmqVodX7e4VLFJ&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <!-- <iframe width="350" height="200" src="https://www.youtube.com/embed/">
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
   
  </body>
</html>