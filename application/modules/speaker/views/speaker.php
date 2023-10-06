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
            jam();
        }

        function jam() {
            var aud = document.getElementById('audio');
            var lbl = document.getElementById('lbl');
            var e = document.getElementById('clock'),
                d = new Date(),
                h, m, s;
            h = set(d.getHours());
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            var date = new Date();
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var thisDay = date.getDay(),
                thisDay = myDays[thisDay];

            e.innerHTML = thisDay + '\n' + h + ':' + m + ':' + s;
            // console.log(e.innerHTML);

            //INDONESIA RAYA
            if (e.innerHTML == "Selasa\n10:00:00" || e.innerHTML == "Kamis\n10:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="<?php echo base_url(); ?>assets/upload/speaker/60-indonesia_raya" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "MENYANYIKAN INDONESIA RAYA";


                //PANCASILA
            } else if (e.innerHTML == "Rabu\n10:00:00" || e.innerHTML == "Jumat\n10:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="<?php echo base_url(); ?>assets/upload/speaker/60-pancasila.mp3"  type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "MEMBACA TEKS PANCASILA";


                //PEREGANGAN
            } else if (e.innerHTML == "Senin\n10:10:00" || e.innerHTML == "Selasa\n10:10:00" || e.innerHTML == "Rabu\n10:10:00" || e.innerHTML == "Kamis\n10:10:00" || e.innerHTML == "Jumat\n10:10:00" ||
                e.innerHTML == "Senin\n14:00:00" || e.innerHTML == "Selasa\n14:00:00" || e.innerHTML == "Rabu\n14:00:00" || e.innerHTML == "Kamis\n14:00:00" || e.innerHTML == "Jumat\n14:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                            <source src="Instruksi_Peregangan_Kemenkes.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>`;
                lbl.innerHTML = "SENAM PEREGANGAN";


                //HIMBAUAN MASKER
            } else if (e.innerHTML == "Senin\n08:30:00" || e.innerHTML == "Selasa\n08:30:00" || e.innerHTML == "Rabu\n08:30:00" || e.innerHTML == "Kamis\n08:30:00" || e.innerHTML == "Jumat\n08:30:00" || e.innerHTML == "Sabtu\n08:30:00" || e.innerHTML == "Minggu\n08:30:00" ||
                e.innerHTML == "Senin\n10:05:00" || e.innerHTML == "Selasa\n10:05:00" || e.innerHTML == "Rabu\n10:05:00" || e.innerHTML == "Kamis\n10:05:00" || e.innerHTML == "Jumat\n10:05:00" || e.innerHTML == "Sabtu\n10:05:00" || e.innerHTML == "Minggu\n10:05:00" ||
                e.innerHTML == "Senin\n19:30:00" || e.innerHTML == "Selasa\n19:30:00" || e.innerHTML == "Rabu\n19:30:00" || e.innerHTML == "Kamis\n19:30:00" || e.innerHTML == "Jumat\n19:30:00" || e.innerHTML == "Sabtu\n19:30:00" || e.innerHTML == "Minggu\n19:30:00" ||
                e.innerHTML == "Senin\n21:30:00" || e.innerHTML == "Selasa\n21:30:00" || e.innerHTML == "Rabu\n21:30:00" || e.innerHTML == "Kamis\n21:30:00" || e.innerHTML == "Jumat\n21:30:00" || e.innerHTML == "Sabtu\n21:30:00" || e.innerHTML == "Minggu\n21:30:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="<?php echo base_url(); ?>assets/upload/speaker/himbauan_masker.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "HIMBAUAN PEMAKAIAN MASKER";
            }

            setTimeout('jam()', 1000);

        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
</body>

</html>