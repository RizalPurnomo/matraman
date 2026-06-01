<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Antrian — Puskesmas Matraman</title>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --blue-dark:   #0a2a5e;
    --blue-mid:    #1043a0;
    --blue-light:  #1a5dc8;
    --blue-card:   #e8f0ff;
    --green-dark:  #064e2c;
    --green-mid:   #0b7a3e;
    --green-light: #13a354;
    --green-card:  #e6f6ee;
    --white:       #ffffff;
    --off-white:   #f4f7ff;
    --text-dark:   #0a1f3d;
    --text-mid:    #2d4a7a;
    --accent-gold: #f5c842;
    --shadow-blue: rgba(10,42,94,0.35);
    --shadow-green:rgba(6,78,44,0.3);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Barlow', sans-serif;
    background: #0d1b2e;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }

  /* ── TOP BAR ── */
  .topbar {
    background: linear-gradient(90deg, var(--blue-dark) 0%, #0d3278 50%, var(--green-dark) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 24px;
    gap: 12px;
    border-bottom: 3px solid var(--accent-gold);
    flex-shrink: 0;
  }
  .topbar-icon {
    width: 40px; height: 40px;
    background: var(--white);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
  }
  .topbar h1 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(14px, 2.2vw, 22px);
    font-weight: 800;
    color: var(--white);
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 1.1;
  }
  .topbar span {
    font-size: clamp(10px, 1.3vw, 14px);
    color: rgba(255,255,255,0.7);
    font-weight: 400;
  }

  /* ── MAIN GRID ── */
  .main {
    flex: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    min-height: 0;
  }

  /* ── SECTIONS ── */
  .section-loket {
    background: linear-gradient(160deg, var(--blue-dark) 0%, var(--blue-mid) 100%);
    padding: clamp(12px, 2vw, 28px);
    display: flex;
    flex-direction: column;
    gap: clamp(10px, 1.5vw, 18px);
    border-right: 3px solid rgba(255,255,255,0.15);
  }
  .section-farmasi {
    background: linear-gradient(160deg, var(--green-dark) 0%, var(--green-mid) 100%);
    padding: clamp(12px, 2vw, 28px);
    display: flex;
    flex-direction: column;
    gap: clamp(10px, 1.5vw, 18px);
  }

  /* ── SECTION HEADER ── */
  .section-header {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .section-icon {
    width: clamp(36px, 5vw, 60px);
    height: clamp(36px, 5vw, 60px);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(16px, 2.5vw, 28px);
    flex-shrink: 0;
  }
  .section-loket .section-icon { background: rgba(255,255,255,0.18); }
  .section-farmasi .section-icon { background: rgba(255,255,255,0.18); }

  .section-title-wrap h2 {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(18px, 3.2vw, 42px);
    font-weight: 900;
    color: var(--white);
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 1;
  }
  .section-title-wrap p {
    font-size: clamp(9px, 1.1vw, 13px);
    color: rgba(255,255,255,0.65);
    margin-top: 2px;
  }

  /* ── LOKET GRID ── */
  .loket-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: clamp(6px, 1vw, 14px);
    flex: 1;
  }

  .loket-card {
    background: rgba(255,255,255,0.94);
    border-radius: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
    box-shadow: 0 6px 24px var(--shadow-blue);
    transition: transform 0.3s ease;
    animation: cardPop 0.5s ease backwards;
  }
  .loket-card:hover { transform: translateY(-3px); }
  .loket-card:nth-child(1) { animation-delay: 0.1s; }
  .loket-card:nth-child(2) { animation-delay: 0.2s; }
  .loket-card:nth-child(3) { animation-delay: 0.3s; }
  .loket-card:nth-child(4) { animation-delay: 0.4s; }

  @keyframes cardPop {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .loket-card-header {
    width: 100%;
    background: var(--blue-mid);
    color: var(--white);
    text-align: center;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(12px, 1.6vw, 20px);
    font-weight: 800;
    letter-spacing: 1px;
    padding: clamp(5px, 0.8vw, 10px) 8px;
    text-transform: uppercase;
  }

  .loket-card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: clamp(6px, 1vw, 14px) 8px;
    gap: 4px;
    width: 100%;
  }

  .counter-icon {
    font-size: clamp(22px, 3vw, 40px);
    opacity: 0.5;
  }

  .nomor-label {
    font-size: clamp(7px, 0.9vw, 11px);
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--text-mid);
  }

  .nomor-antrian {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(28px, 4.5vw, 62px);
    font-weight: 900;
    color: var(--blue-dark);
    line-height: 1;
    animation: pulse-number 2s ease-in-out infinite;
  }

  @keyframes pulse-number {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.75; }
  }

  .dipanggil-badge {
    display: flex;
    align-items: center;
    gap: 5px;
    background: var(--blue-card);
    border: 1.5px solid var(--blue-light);
    border-radius: 20px;
    padding: 4px 10px;
    font-size: clamp(7px, 0.85vw, 11px);
    font-weight: 700;
    color: var(--blue-mid);
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .dipanggil-dot {
    width: 6px; height: 6px;
    background: var(--blue-light);
    border-radius: 50%;
    animation: blink 1s step-start infinite;
  }
  @keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
  }

  /* ── FARMASI GRID ── */
  .farmasi-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: clamp(8px, 1.2vw, 18px);
    flex: 1;
  }

  .farmasi-card {
    background: rgba(255,255,255,0.93);
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
    box-shadow: 0 6px 28px var(--shadow-green);
    transition: transform 0.3s ease;
    animation: cardPop 0.5s ease backwards;
  }
  .farmasi-card:hover { transform: translateY(-3px); }
  .farmasi-card:nth-child(1) { animation-delay: 0.2s; }
  .farmasi-card:nth-child(2) { animation-delay: 0.35s; }

  .farmasi-card-header {
    width: 100%;
    background: var(--green-mid);
    color: var(--white);
    text-align: center;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(16px, 2.5vw, 32px);
    font-weight: 900;
    letter-spacing: 2px;
    padding: clamp(8px, 1vw, 14px) 8px;
    text-transform: uppercase;
  }

  .farmasi-card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding: clamp(8px, 1.2vw, 20px);
    gap: 6px;
    width: 100%;
  }

  .farmasi-icon-circle {
    width: clamp(48px, 7vw, 90px);
    height: clamp(48px, 7vw, 90px);
    background: var(--green-light);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(22px, 3.5vw, 44px);
    box-shadow: 0 4px 16px rgba(19,163,84,0.4);
  }

  .farmasi-nomor-antrian {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(42px, 7.5vw, 100px);
    font-weight: 900;
    color: var(--green-dark);
    line-height: 1;
    animation: pulse-number 2.3s ease-in-out infinite;
  }

  .farmasi-dipanggil {
    display: flex;
    align-items: center;
    gap: 5px;
    background: var(--green-card);
    border: 1.5px solid var(--green-light);
    border-radius: 20px;
    padding: 4px 12px;
    font-size: clamp(8px, 0.9vw, 12px);
    font-weight: 700;
    color: var(--green-mid);
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .farmasi-dot {
    width: 6px; height: 6px;
    background: var(--green-light);
    border-radius: 50%;
    animation: blink 1.3s step-start infinite;
  }

  /* ── BOTTOM BAR ── */
  .bottombar {
    background: linear-gradient(90deg, #071830 0%, #0c2952 40%, #062818 100%);
    border-top: 2px solid rgba(255,255,255,0.1);
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    padding: 8px clamp(12px, 2vw, 28px);
    gap: 16px;
    flex-shrink: 0;
  }

  .clock-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--white);
  }
  .clock-icon { font-size: clamp(18px, 2.5vw, 28px); }
  .clock-time {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(20px, 3vw, 38px);
    font-weight: 800;
    color: var(--white);
    line-height: 1;
    letter-spacing: 1px;
  }
  .clock-date {
    font-size: clamp(8px, 1vw, 12px);
    color: rgba(255,255,255,0.55);
    margin-top: 1px;
  }

  .ticker-wrap {
    overflow: hidden;
    text-align: center;
  }
  .ticker-text {
    font-size: clamp(10px, 1.3vw, 16px);
    color: rgba(255,255,255,0.8);
    font-style: italic;
    white-space: nowrap;
    animation: ticker 20s linear infinite;
    display: inline-block;
  }
  @keyframes ticker {
    0%   { transform: translateX(60%); }
    100% { transform: translateX(-110%); }
  }
  .ticker-text::before { content: '❝ '; }
  .ticker-text::after  { content: ' ❞'; }

  .notice-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 10px;
    padding: 6px 14px;
  }
  .notice-icon { font-size: clamp(14px, 1.8vw, 22px); }
  .notice-text {
    font-size: clamp(8px, 1vw, 12px);
    color: rgba(255,255,255,0.75);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 768px) {
    .main {
      grid-template-columns: 1fr;
      overflow-y: auto;
    }
    .section-loket { border-right: none; border-bottom: 3px solid rgba(255,255,255,0.15); }
    .loket-grid { grid-template-columns: repeat(2, 1fr); }
    .bottombar { grid-template-columns: auto 1fr; }
    .notice-wrap { display: none; }
  }

  @media (max-width: 480px) {
    .loket-grid { grid-template-columns: repeat(2, 1fr); }
    .farmasi-grid { grid-template-columns: 1fr 1fr; }
    .bottombar { grid-template-columns: 1fr; justify-items: center; }
    .clock-wrap { justify-content: center; }
  }
</style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
  <div class="topbar-icon">➕</div>
  <div>
    <h1>PUSKESMAS MATRAMAN</h1>
    <span>Selamat datang — mohon perhatikan nomor antrian Anda</span>
  </div>
</div>

<!-- MAIN -->
<div class="main">

  <!-- LOKET -->
  <div class="section-loket">
    <div class="section-header">
      <div class="section-icon">🧑‍💼</div>
      <div class="section-title-wrap">
        <h2>Antrian Loket</h2>
        <p>Terima kasih telah bersabar menunggu</p>
      </div>
    </div>

    <div class="loket-grid">
      <!-- Loket 1 -->
      <div class="loket-card">
        <div class="loket-card-header">Loket 1</div>
        <div class="loket-card-body">
          <div class="counter-icon">🧑‍💻</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="nomor-antrian" id="l1">A123</div>
          <div class="dipanggil-badge"><span class="dipanggil-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
      <!-- Loket 2 -->
      <div class="loket-card">
        <div class="loket-card-header">Loket 2</div>
        <div class="loket-card-body">
          <div class="counter-icon">🧑‍💻</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="nomor-antrian" id="l2">B067</div>
          <div class="dipanggil-badge"><span class="dipanggil-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
      <!-- Loket 3 -->
      <div class="loket-card">
        <div class="loket-card-header">Loket 3</div>
        <div class="loket-card-body">
          <div class="counter-icon">🧑‍💻</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="nomor-antrian" id="l3">C089</div>
          <div class="dipanggil-badge"><span class="dipanggil-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
      <!-- Loket 4 -->
      <div class="loket-card">
        <div class="loket-card-header">Loket 4</div>
        <div class="loket-card-body">
          <div class="counter-icon">🧑‍💻</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="nomor-antrian" id="l4">D041</div>
          <div class="dipanggil-badge"><span class="dipanggil-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
    </div>
  </div>

  <!-- FARMASI -->
  <div class="section-farmasi">
    <div class="section-header">
      <div class="section-icon">⚕️</div>
      <div class="section-title-wrap">
        <h2>Antrian Farmasi</h2>
        <p>Silakan menuju ruang farmasi</p>
      </div>
    </div>

    <div class="farmasi-grid">
      <!-- Lansia -->
      <div class="farmasi-card">
        <div class="farmasi-card-header">Lansia</div>
        <div class="farmasi-card-body">
          <div class="farmasi-icon-circle">👴</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="farmasi-nomor-antrian" id="fl">-</div>
          <div class="farmasi-dipanggil"><span class="farmasi-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
      <!-- Umum -->
      <div class="farmasi-card">
        <div class="farmasi-card-header">Umum</div>
        <div class="farmasi-card-body">
          <div class="farmasi-icon-circle">👥</div>
          <div class="nomor-label">Nomor Antrian</div>
          <div class="farmasi-nomor-antrian" id="fu">-</div>
          <div class="farmasi-dipanggil"><span class="farmasi-dot"></span>Sedang Dipanggil</div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- BOTTOM BAR -->
<div class="bottombar">
  <div class="clock-wrap">
    <span class="clock-icon">🕐</span>
    <div>
      <div class="clock-time" id="jam">--:--</div>
      <div class="clock-date" id="tanggal">--</div>
    </div>
  </div>
  <div class="ticker-wrap">
    <span class="ticker-text">Terima kasih atas kepercayaan Anda kepada kami. Kesehatan Anda adalah prioritas kami. Harap perhatikan nomor antrian yang dipanggil.</span>
  </div>
  <div class="notice-wrap">
    <span class="notice-icon">📋</span>
    <span class="notice-text">Mohon perhatikan nomor antrian Anda</span>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<script>
    const HARI = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const BULAN = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    function updateClock() {
        const now = new Date();
        const h = String(now.getHours()).padStart(2,'0');
        const m = String(now.getMinutes()).padStart(2,'0');
        document.getElementById('jam').textContent = `${h}:${m}`;
        document.getElementById('tanggal').textContent =
        `${HARI[now.getDay()]}, ${now.getDate()} ${BULAN[now.getMonth()]} ${now.getFullYear()}`;
    }
    updateClock();
    setInterval(updateClock, 1000);

    function refreshListAntrian() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '<?= base_url("antrian_farmasi/getLastAntrian") ?>',
            success: function({ antrianUmum, antrianLansia }) {
                const noUmum   = antrianUmum[0]?.no_antrian   ?? 0;
                const noLansia = antrianLansia[0]?.no_antrian  ?? null;

                document.getElementById("fu").textContent = noUmum;
                document.getElementById("fl").textContent = noLansia ? `P${noLansia}` : 0;
            },
            error: function(xhr, status, error) {
                console.error("Gagal mengambil data antrian:", status, error);
            },
            complete: function() {
                setTimeout(refreshListAntrian, 1000);
            }
        });
    }

    refreshListAntrian();
    // setInterval(refreshListAntrian, 1000);

    // function refreshListAntrian() {
    //     setTimeout("refreshListAntrian()", 1000);

    //     $.ajax({
    //         type: "GET",
    //         dataType: "html",
    //         url: '<?php echo base_url('antrian_farmasi/getLastAntrian'); ?>',
    //         success: function(msg) {
    //             obj = JSON.parse(msg);
    //             console.log(obj);
    //             objAntrianUmum = obj['antrianUmum'];
    //             objAntrianLansia = obj['antrianLansia'];

    //             if (objAntrianUmum.length < 1) {
    //                 no_fu = 0;
    //             } else {
    //                 no_fu = objAntrianUmum[0]['no_antrian'];
    //             }
    //             if (objAntrianLansia.length < 1) {
    //                 no_fl = 0;
    //             } else {
    //                 no_fl = "P" + objAntrianLansia[0]['no_antrian'];
    //             }
    //             document.getElementById("fu").innerHTML = no_fu;
    //             document.getElementById("fl").innerHTML = no_fl;
    //         }
    //     });
    // }

    


//   Demo: auto-increment queue numbers every 8s
//   const lokets = [
//     { el: 'l1', prefix: 'A', num: 123 },
//     { el: 'l2', prefix: 'B', num: 67  },
//     { el: 'l3', prefix: 'C', num: 89  },
//     { el: 'l4', prefix: 'D', num: 41  },
//   ];
//   const farmasi = [
//     { el: 'fl', prefix: 'L', num: 56  },
//     { el: 'fu', prefix: 'U', num: 132 },
//   ];

//   function bumpRandom(arr) {
//     const item = arr[Math.floor(Math.random() * arr.length)];
//     item.num++;
//     const el = document.getElementById(item.el);
//     el.style.transition = 'transform 0.2s ease, opacity 0.2s ease';
//     el.style.transform = 'scale(1.18)';
//     el.style.opacity = '0.5';
//     setTimeout(() => {
//       el.textContent = item.prefix + String(item.num).padStart(3,'0');
//       el.style.transform = 'scale(1)';
//       el.style.opacity = '1';
//     }, 200);
//   }

//   setInterval(() => bumpRandom(lokets),  8000);
//   setInterval(() => bumpRandom(farmasi), 11000);
</script>
</body>
</html>
