<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
    <title>Clock</title>
</head>

<body>

    <section class="container">
        <div align="center" id="str_clock">sdsd</div>
        <div align="center" id="clock"></div>
        <button onclick="clearAlarm()" class="button clear-alarm" id="lbl"></button>
        <div id="audio">

        </div>
        <div class="">
            <ul>
                <li>label</li>
            </ul>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            refresh_alarm();
        }

        function refresh_alarm() {
            $.ajax({
                type: "GET",
                // data: dataArray,
                dataType: "html",
                url: '<?php echo base_url('speaker/refreshAlarm/'); ?>',
                success: function(result) {
                    obj = JSON.parse(result);
                    console.log(obj);
                    let aud = document.getElementById('audio');
                    let lbl = document.getElementById('lbl');
                    let e = document.getElementById('clock');
                    e.innerHTML = obj.hari + '\n' + obj.jam;


                    if (obj.status == 'Detected Alarm') {
                        aud.innerHTML = `<audio id="myAudio" controls autoplay>
                            <source src="<?php echo base_url(); ?>assets/upload/speaker/${obj.alarm}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>`;
                        lbl.innerHTML = obj.nama;
                    }

                    setTimeout('refresh_alarm()', 1000);
                }

                // }
            });
        }
    </script>
</body>

<!-- jQuery -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

</html>