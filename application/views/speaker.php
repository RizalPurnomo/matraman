<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/speaker.css">
    <title>Speaker</title>
</head>

<body>

    <section class="container">
        <div align="center" id="clock"></div>
        <button onclick="clearAlarm()" class="button clear-alarm" id="lbl"></button>
        <div id="audio">

        </div>
        <div class="">
            <ul>
                <li>jkjkj</li>
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
            if (e.innerHTML == "Selasa\n10:00:00" || e.innerHTML == "Kamis\n10:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="60-indonesia_raya.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "MENYANYIKAN INDONESIA RAYA";
            } else if (e.innerHTML == "Rabu\n10:00:00" || e.innerHTML == "Jumat\n10:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                    <source src="60-pancasila.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "MEMBACA TEKS PANCASILA";
            } else if (e.innerHTML == "Selasa\n10:03:00" || e.innerHTML == "Rabu\n10:03:00" || e.innerHTML == "Kamis\n10:03:00" || e.innerHTML == "Jumat\n10:03:00" || e.innerHTML == "Senin\n14:00:00" || e.innerHTML == "Selasa\n14:00:00" || e.innerHTML == "Rabu\n14:00:00" || e.innerHTML == "Kamis\n14:00:00" || e.innerHTML == "Jumat\n14:00:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="Instruksi_Peregangan_Kemenkes.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>`;
                lbl.innerHTML = "SENAM PEREGANGAN";
            }else if (e.innerHTML == "Senin\n10:06:00" || e.innerHTML == "Selasa\n10:06:00" || e.innerHTML == "Rabu\n10:06:00" || e.innerHTML == "Kamis\n10:06:00" || e.innerHTML == "Jumat\n10:06:00" || e.innerHTML == "Senin\n8:30:00" || e.innerHTML == "Selasa\n8:30:00" || e.innerHTML == "Rabu\n8:30:00" || e.innerHTML == "Kamis\n8:30:00" || e.innerHTML == "Jumat\n8:30:00") {
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                        <source src="himbauan_masker.mp3" type="audio/mpeg">
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