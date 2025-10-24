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
        <div align="center" id="str_clock"></div>
        <div align="center" id="clock"></div>
        <button onclick="clearAlarm()" class="button clear-alarm" id="lbl"></button>
        <div id="audio">

        </div>
        <input type="hidden" id="alarm">
        <div id="list">
            <ul>
                <li>label</li>
            </ul>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
            get_alarm_today();
            // refresh_alarm();
            waktu();
            

        }

        function waktu() {
            let waktu = new Date();
            let myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            let thisDay = myDays[waktu.getDay()];
            setTimeout("waktu()", 1000);
            let jam = waktu.getHours().toString().padStart(2, '0') + ":" + waktu.getMinutes().toString().padStart(2, '0') + ":" + waktu.getSeconds().toString().padStart(2, '0');
            document.getElementById("clock").innerHTML = thisDay + " " + jam ;
            alarm = document.getElementById("alarm").value;
            alarmJson = JSON.parse(alarm);
            hasil = alarmJson.filter(item=>item.jam === jam);

            if (hasil!="") {
                let aud = document.getElementById('audio');
                let lbl = document.getElementById('lbl');
                aud.innerHTML = `<audio id="myAudio" controls autoplay>
                    <source src="<?php echo base_url(); ?>assets/upload/speaker/${hasil[0].audio}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>`;
                lbl.innerHTML = hasil[0].jam + " - " + hasil[0].nama_event;
            }

            // if (hasil) {
            //     let aud = document.getElementById('audio');
            //     let lbl = document.getElementById('lbl');
            //     aud.innerHTML = `<audio id="myAudio" controls autoplay>
            //         <source src="<?php echo base_url(); ?>assets/upload/speaker/${hasil[0].audio}" type="audio/mpeg">
            //         Your browser does not support the audio element.
            //     </audio>`;
            //     lbl.innerHTML = obj.nama;
            // }

            // console.log(hasil);
            // if (jam == "11:29:00") {
            //     console.log(jam);
            // }
        }

        function refresh_alarm() {
            $.ajax({
                type: "GET",
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

        function get_alarm_today() {
            $.ajax({
                type: "GET",
                dataType: "html",
                url: '<?php echo base_url('speaker/getAlarmToday/'); ?>',
                success: function(result) {
                    obj = JSON.parse(result);
                    document.getElementById('list').innerHTML = obj.list;
                    $("#alarm").val(JSON.stringify(obj.alarm));
                    // document.getElementById('alarm').value = obj.alarm;
                    // console.log(obj.alarm);
                    // let aud = document.getElementById('audio');
                    // let lbl = document.getElementById('lbl');
                    // let e = document.getElementById('clock');
                    // e.innerHTML = obj.hari + '\n' + obj.jam;

                    // if (obj.status == 'Detected Alarm') {
                    //     aud.innerHTML = `<audio id="myAudio" controls autoplay>
                    //         <source src="<?php echo base_url(); ?>assets/upload/speaker/${obj.alarm}" type="audio/mpeg">
                    //         Your browser does not support the audio element.
                    //     </audio>`;
                    //     lbl.innerHTML = obj.nama;
                    // }

                }

                // }
            });
        }
    </script>
</body>

<!-- jQuery -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

</html>