<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Survei Kepuasan Pelayanan</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
<style>
  :root {
    --navy:        #0b2a6b;
    --navy-mid:    #1040a8;
    --blue-light:  #e8f0ff;
    --accent:      #f5c200;
    --white:       #ffffff;
    --gray-soft:   #f0f4ff;
    --card-border: #d5e0ff;
    --text-dark:   #0b1f4a;
    --text-mid:    #3a5080;
    --shadow:      rgba(11,42,107,0.13);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html, body {
    height: 100%;
    font-family: 'Nunito', sans-serif;
    background: linear-gradient(160deg, #0b2a6b 0%, #1652c8 55%, #0e3fa0 100%);
    overflow: hidden;
  }

  .screen {
    height: 100vh;
    display: flex;
    flex-direction: column;
    padding: clamp(10px, 1.5vw, 20px);
    gap: clamp(8px, 1.2vw, 16px);
  }

  /* HEADER */
  .header {
    background: var(--white);
    border-radius: 18px;
    padding: clamp(10px, 1.4vw, 18px) clamp(16px, 2vw, 28px);
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 6px 28px var(--shadow);
    flex-shrink: 0;
    animation: slideDown 0.5s ease;
  }

  @keyframes slideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .header-icon {
    width: clamp(48px, 6vw, 72px);
    height: clamp(48px, 6vw, 72px);
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(22px, 3vw, 36px);
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(11,42,107,0.3);
  }

  .header-text h1 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(20px, 3.2vw, 44px);
    font-weight: 900;
    color: var(--navy);
    line-height: 1;
    letter-spacing: -0.5px;
  }

  .header-text p {
    font-size: clamp(10px, 1.2vw, 15px);
    color: var(--text-mid);
    font-weight: 600;
    margin-top: 3px;
  }

  .stars {
    margin-left: auto;
    display: flex;
    gap: 3px;
    font-size: clamp(16px, 2.2vw, 28px);
  }

  /* POLI WRAPPER */
  .poli-wrapper {
    flex: 1;
    background: rgba(255,255,255,0.10);
    border-radius: 18px;
    border: 1.5px solid rgba(255,255,255,0.2);
    backdrop-filter: blur(12px);
    padding: clamp(10px, 1.4vw, 20px);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    gap: clamp(6px, 0.9vw, 12px);
  }

  .poli-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: clamp(6px, 0.9vw, 12px);
    flex: 1;
    align-content: start;
  }

  .poli-card {
    background: var(--white);
    border-radius: 14px;
    border: 2px solid var(--card-border);
    display: flex;
    align-items: center;
    gap: clamp(8px, 1vw, 14px);
    padding: clamp(8px, 1.1vw, 16px) clamp(10px, 1.3vw, 18px);
    cursor: pointer;
    transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background 0.18s ease;
    box-shadow: 0 3px 12px var(--shadow);
    animation: cardIn 0.4s ease backwards;
    position: relative;
    overflow: hidden;
  }

  .poli-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
    opacity: 0;
    transition: opacity 0.18s ease;
  }

  .poli-card:hover {
    transform: translateY(-4px) scale(1.025);
    box-shadow: 0 10px 32px rgba(11,42,107,0.28);
    border-color: var(--navy-mid);
  }
  .poli-card:hover::before { opacity: 1; }
  .poli-card:hover .poli-icon-wrap { background: rgba(255,255,255,0.18); }
  .poli-card:hover .poli-name { color: var(--white); }
  .poli-card:active { transform: scale(0.97); }

  .poli-card:nth-child(1)  { animation-delay: 0.04s; }
  .poli-card:nth-child(2)  { animation-delay: 0.07s; }
  .poli-card:nth-child(3)  { animation-delay: 0.10s; }
  .poli-card:nth-child(4)  { animation-delay: 0.13s; }
  .poli-card:nth-child(5)  { animation-delay: 0.16s; }
  .poli-card:nth-child(6)  { animation-delay: 0.19s; }
  .poli-card:nth-child(7)  { animation-delay: 0.22s; }
  .poli-card:nth-child(8)  { animation-delay: 0.25s; }
  .poli-card:nth-child(9)  { animation-delay: 0.28s; }
  .poli-card:nth-child(10) { animation-delay: 0.31s; }
  .poli-card:nth-child(11) { animation-delay: 0.34s; }
  .poli-card:nth-child(12) { animation-delay: 0.37s; }
  .poli-card:nth-child(13) { animation-delay: 0.40s; }
  .poli-card:nth-child(14) { animation-delay: 0.43s; }
  .poli-card:nth-child(15) { animation-delay: 0.46s; }
  .poli-card:nth-child(16) { animation-delay: 0.49s; }
  .poli-card:nth-child(17) { animation-delay: 0.52s; }
  .poli-card:nth-child(18) { animation-delay: 0.55s; }
  .poli-card:nth-child(19) { animation-delay: 0.58s; }
  .poli-card:nth-child(20) { animation-delay: 0.61s; }
  .poli-card:nth-child(21) { animation-delay: 0.64s; }
  .poli-card:nth-child(22) { animation-delay: 0.67s; }
  .poli-card:nth-child(23) { animation-delay: 0.70s; }
  .poli-card:nth-child(24) { animation-delay: 0.73s; }

  @keyframes cardIn {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .poli-icon-wrap {
    width: clamp(34px, 4.2vw, 56px);
    height: clamp(34px, 4.2vw, 56px);
    border-radius: 12px;
    background: var(--blue-light);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
    transition: background 0.18s ease;
  }

  .poli-icon {
    font-size: clamp(18px, 2.4vw, 30px);
    display: block;
  }

  .poli-name {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(20px, 2vw, 24px);
    font-weight: 1000;
    color: var(--navy);
    line-height: 1.15;
    position: relative;
    z-index: 1;
    transition: color 0.18s ease;
    letter-spacing: 0.1px;
  }

  /* last row centered */
  .poli-grid-last {
    display: flex;
    justify-content: center;
    gap: clamp(6px, 0.9vw, 12px);
  }

  .poli-grid-last .poli-card {
    width: calc(100% / 6 - 6px);
    min-width: 0;
  }

  /* FOOTER */
  .footer {
    background: var(--white);
    border-radius: 16px;
    padding: clamp(8px, 1.1vw, 14px) clamp(16px, 2vw, 28px);
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 16px;
    box-shadow: 0 -4px 24px var(--shadow);
    flex-shrink: 0;
    animation: slideUp 0.5s ease 0.2s backwards;
  }

  @keyframes slideUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .footer-clock {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .clock-icon { font-size: clamp(20px, 2.5vw, 30px); }
  .clock-time {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(22px, 3vw, 38px);
    font-weight: 900;
    color: var(--navy);
    line-height: 1;
    letter-spacing: 1px;
  }
  .clock-date {
    font-size: clamp(9px, 1vw, 13px);
    color: var(--text-mid);
    font-weight: 600;
  }

  .footer-msg {
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }
  .footer-msg-icon { font-size: clamp(16px, 2vw, 24px); color: var(--navy-mid); }
  .footer-msg p {
    font-size: clamp(10px, 1.2vw, 15px);
    color: var(--text-mid);
    font-weight: 700;
    font-style: italic;
  }

  .footer-thanks {
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--navy);
    border-radius: 12px;
    padding: clamp(6px, 0.8vw, 10px) clamp(12px, 1.5vw, 20px);
  }
  .footer-thanks-icon { font-size: clamp(18px, 2.2vw, 26px); }
  .footer-thanks-text {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(9px, 1vw, 13px);
    font-weight: 800;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1.2;
  }

  /* ── MODAL RATING ── */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(5,15,35,0.72);
    backdrop-filter: blur(6px);
    z-index: 100;
    align-items: center;
    justify-content: center;
  }
  .modal-overlay.show { display: flex; }

  .modal-box {
    background: var(--white);
    border-radius: 24px;
    padding: clamp(24px, 3vw, 40px);
    width: clamp(300px, 42vw, 540px);
    box-shadow: 0 24px 80px rgba(0,0,0,0.4);
    text-align: center;
    animation: modalIn 0.35s cubic-bezier(0.34,1.56,0.64,1);
    position: relative;
  }
  @keyframes modalIn {
    from { transform: scale(0.7) translateY(40px); opacity: 0; }
    to   { transform: scale(1)   translateY(0);    opacity: 1; }
  }

  .modal-poli-name {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(22px, 3.5vw, 42px);
    font-weight: 900;
    color: var(--blue-dark);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
  }
  .modal-sub {
    font-size: clamp(11px, 1.2vw, 15px);
    color: var(--text-mid);
    margin-bottom: clamp(18px, 2.5vw, 32px);
  }

  .rating-row {
    display: flex;
    justify-content: center;
    gap: clamp(8px, 1.5vw, 18px);
    margin-bottom: clamp(18px, 2.5vw, 30px);
  }

  .rating-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    padding: 14px 10px;
    border-radius: 16px;
    border: 2.5px solid transparent;
    transition: all 0.2s ease;
    background: var(--off-white);
    min-width: clamp(60px, 8vw, 90px);
  }
  .rating-btn:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
  .rating-btn.active { border-color: currentColor; box-shadow: 0 0 0 3px rgba(0,0,0,0.1); }

  .rating-btn.sangat-puas  { color: #16a34a; }
  .rating-btn.puas         { color: #2563eb; }
  .rating-btn.kurang-puas  { color: #d97706; }
  .rating-btn.tidak-puas   { color: #dc2626; }

  .rating-btn.active.sangat-puas  { background: #dcfce7; }
  .rating-btn.active.puas         { background: #dbeafe; }
  .rating-btn.active.kurang-puas  { background: #fef3c7; }
  .rating-btn.active.tidak-puas   { background: #fee2e2; }

  .rating-emoji { font-size: clamp(28px, 4vw, 48px); }
  .rating-label {
    font-size: clamp(8px, 0.9vw, 12px);
    font-weight: 800;
    text-align: center;
    line-height: 1.2;
  }

  .btn-kirim {
    width: 100%;
    padding: clamp(12px, 1.5vw, 18px);
    background: linear-gradient(135deg, var(--blue-mid), var(--blue-light));
    color: var(--white);
    border: none;
    border-radius: 14px;
    font-family: 'Nunito', sans-serif;
    font-size: clamp(14px, 1.6vw, 18px);
    font-weight: 800;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 16px rgba(26,93,200,0.35);
    margin-bottom: 10px;
  }
  .btn-kirim:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(26,93,200,0.45); }
  .btn-kirim:disabled { opacity: 0.4; cursor: default; transform: none; }

  .btn-batal {
    background: none;
    border: none;
    color: var(--text-mid);
    font-family: 'Nunito', sans-serif;
    font-size: clamp(11px, 1.2vw, 14px);
    font-weight: 700;
    cursor: pointer;
    text-decoration: underline;
  }

  /* ── STEP INDICATOR ── */
  .step-indicator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: clamp(14px, 2vw, 22px);
  }
  .step-dot {
    width: clamp(28px, 3.5vw, 36px);
    height: clamp(28px, 3.5vw, 36px);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(10px, 1.2vw, 13px);
    font-weight: 800;
    border: 2px solid #d1d5db;
    color: #9ca3af;
    background: #f9fafb;
    transition: all 0.3s ease;
    flex-shrink: 0;
  }
  .step-dot.active {
    background: var(--blue-mid);
    border-color: var(--blue-mid);
    color: var(--white);
    box-shadow: 0 0 0 4px rgba(16,67,160,0.15);
  }
  .step-dot.done {
    background: var(--green-mid);
    border-color: var(--green-mid);
    color: var(--white);
  }
  .step-line {
    flex: 1;
    max-width: 40px;
    height: 2px;
    background: #e5e7eb;
    border-radius: 2px;
    transition: background 0.3s;
  }
  .step-line.done { background: var(--green-mid); }

  /* ── JENIS ANTRIAN STEP ── */
  .jenis-step { display: none; }
  .jenis-step.show { display: block; }

  .jenis-title {
    font-size: clamp(11px, 1.3vw, 15px);
    color: var(--text-mid);
    margin-bottom: clamp(14px, 2vw, 22px);
    font-weight: 600;
  }

  .jenis-row {
    display: flex;
    gap: clamp(10px, 1.5vw, 18px);
    justify-content: center;
    margin-bottom: clamp(14px, 2vw, 22px);
  }

  .jenis-btn {
    flex: 1;
    max-width: 200px;
    border: 2.5px solid #e5e7eb;
    border-radius: 16px;
    background: var(--off-white);
    cursor: pointer;
    padding: clamp(14px, 1.8vw, 22px) clamp(10px, 1.2vw, 16px);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    transition: all 0.22s ease;
    position: relative;
    overflow: hidden;
  }
  .jenis-btn::after {
    content: '';
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.2s;
    border-radius: 14px;
  }
  .jenis-btn:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }

  .jenis-btn.prioritas { --jc: #d97706; --jc-bg: #fffbeb; --jc-ring: rgba(217,119,6,0.2); }
  .jenis-btn.umum      { --jc: #1a5dc8; --jc-bg: #eff6ff; --jc-ring: rgba(26,93,200,0.2); }

  .jenis-btn.prioritas::after { background: linear-gradient(135deg,rgba(217,119,6,0.07),rgba(245,200,66,0.06)); }
  .jenis-btn.umum::after      { background: linear-gradient(135deg,rgba(26,93,200,0.07),rgba(99,179,237,0.05)); }

  .jenis-btn:hover::after { opacity: 1; }

  .jenis-btn.selected {
    border-color: var(--jc);
    background: var(--jc-bg);
    box-shadow: 0 0 0 3px var(--jc-ring), var(--shadow-md);
  }

  .jenis-icon-wrap {
    width: clamp(44px, 6vw, 64px);
    height: clamp(44px, 6vw, 64px);
    border-radius: 50%;
    background: white;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(20px, 3vw, 32px);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 2px solid var(--jc, #e5e7eb);
  }

  .jenis-label {
    font-size: clamp(11px, 1.3vw, 16px);
    font-weight: 900;
    color: var(--jc, var(--text-dark));
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .jenis-desc {
    font-size: clamp(8px, 0.9vw, 11px);
    color: var(--text-mid);
    text-align: center;
    line-height: 1.4;
    font-weight: 600;
  }

  .jenis-prioritas-only {
    display: none;
    align-items: center;
    gap: 12px;
    background: #fffbeb;
    border: 2px solid #f59e0b;
    border-radius: 14px;
    padding: clamp(12px, 1.5vw, 18px) clamp(14px, 1.8vw, 20px);
    margin-bottom: clamp(14px, 2vw, 22px);
    text-align: left;
  }
  .jenis-prioritas-only.show { display: flex; }
  .jenis-prioritas-only-icon { font-size: clamp(24px, 3.5vw, 40px); flex-shrink: 0; }
  .jenis-prioritas-only-text strong {
    display: block;
    font-size: clamp(12px, 1.4vw, 16px);
    font-weight: 800;
    color: #92400e;
    margin-bottom: 2px;
  }
  .jenis-prioritas-only-text span {
    font-size: clamp(9px, 1vw, 12px);
    color: #b45309;
    font-weight: 600;
  }

  .btn-lanjut {
    width: 100%;
    padding: clamp(11px, 1.4vw, 16px);
    background: linear-gradient(135deg, var(--blue-mid), var(--blue-light));
    color: var(--white);
    border: none;
    border-radius: 14px;
    font-family: 'Nunito', sans-serif;
    font-size: clamp(13px, 1.5vw, 17px);
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 16px rgba(26,93,200,0.3);
    margin-bottom: 10px;
  }
  .btn-lanjut:hover  { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(26,93,200,0.4); }
  .btn-lanjut:disabled { opacity: 0.38; cursor: default; transform: none; }

  /* Rating step */
  .rating-step { display: none; }
  .rating-step.show { display: block; }

  /* Terimakasih state */
  .thanks-box {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 20px 0;
  }
  .thanks-box.show { display: flex; }
  .thanks-emoji { font-size: clamp(48px, 7vw, 80px); animation: bounce 0.6s ease; }
  @keyframes bounce {
    0%,100% { transform: scale(1); }
    50%      { transform: scale(1.25); }
  }
  .thanks-title {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(24px, 3.5vw, 40px);
    font-weight: 900;
    color: var(--green-mid);
    text-transform: uppercase;
  }
  .thanks-sub { font-size: clamp(11px, 1.2vw, 15px); color: var(--text-mid); }

  /* RESPONSIVE */
  @media (max-width: 1024px) {
    .poli-grid { grid-template-columns: repeat(5, 1fr); }
    /* .poli-grid-last .poli-card { width: calc(100% / 5 - 6px); } */
  }
  @media (max-width: 768px) {
    .poli-grid { grid-template-columns: repeat(4, 1fr); }
    /* .poli-grid-last .poli-card { width: calc(100% / 4 - 6px); } */
  }
  @media (max-width: 600px) {
    html, body { overflow: auto; }
    .screen { height: auto; overflow: visible; }
    .poli-grid { grid-template-columns: repeat(2, 1fr); }
    /* .poli-grid-last { justify-content: flex-start; flex-wrap: wrap; } */
    /* .poli-grid-last .poli-card { width: calc(50% - 6px); } */
    .footer { grid-template-columns: 1fr 1fr; }
    .footer-msg { display: none; }
  }
</style>
</head>
<body>

<div class="screen">

  <!-- HEADER -->
  <div class="header">
    <div class="header-icon">😊</div>
    <div class="header-text">
      <h1>SURVEI KEPUASAN</h1>
      <p>Pilih poli yang Anda kunjungi hari ini</p>
    </div>
    <div class="stars">⭐⭐⭐⭐⭐</div>
  </div>

  <!-- GRID POLI -->
  <div class="poli-wrapper">
    <div class="poli-grid">
      <div class="poli-card" onclick="openRating('Umum')">
        <div class="poli-icon-wrap"><span class="poli-icon">👥</span></div>
        <span class="poli-name">UMUM</span>
      </div>
      <div class="poli-card" onclick="openRating('Gigi')">
        <div class="poli-icon-wrap"><span class="poli-icon">🦷</span></div>
        <span class="poli-name">GIGI</span>
      </div>
      <div class="poli-card" onclick="openRating('KB')">
        <div class="poli-icon-wrap"><span class="poli-icon">👨‍👩‍👧</span></div>
        <span class="poli-name">KB</span>
      </div>
      <div class="poli-card" onclick="openRating('UP 24 Jam')">
        <div class="poli-icon-wrap"><span class="poli-icon">🕐</span></div>
        <span class="poli-name">UP 24JAM</span>
      </div>
      <div class="poli-card" onclick="openRating('MTBS')">
        <div class="poli-icon-wrap"><span class="poli-icon">👶</span></div>
        <span class="poli-name">MTBS</span>
      </div>
      <div class="poli-card" onclick="openRating('TB')">
        <div class="poli-icon-wrap"><span class="poli-icon">🫁</span></div>
        <span class="poli-name">TB</span>
      </div>
      <div class="poli-card" onclick="openRating('Lansia')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧓</span></div>
        <span class="poli-name">LANSIA</span>
      </div>
      <div class="poli-card" onclick="openRating('Gizi')">
        <div class="poli-icon-wrap"><span class="poli-icon">🥗</span></div>
        <span class="poli-name">GIZI</span>
      </div>
      <div class="poli-card" onclick="openRating('Imunisasi')">
        <div class="poli-icon-wrap"><span class="poli-icon">💉</span></div>
        <span class="poli-name">IMUNISASI</span>
      </div>
      <div class="poli-card" onclick="openRating('PTM')">
        <div class="poli-icon-wrap"><span class="poli-icon">❤️</span></div>
        <span class="poli-name">PTM</span>
      </div>
      <div class="poli-card" onclick="openRating('Psikologi')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧠</span></div>
        <span class="poli-name">PSIKOLOGI</span>
      </div>
      <div class="poli-card" onclick="openRating('UBM')">
        <div class="poli-icon-wrap"><span class="poli-icon">🤝</span></div>
        <span class="poli-name">UBM</span>
      </div>
      <div class="poli-card" onclick="openRating('Lavender')">
        <div class="poli-icon-wrap"><span class="poli-icon">🎀</span></div>
        <span class="poli-name">LAVENDER</span>
      </div>
      <div class="poli-card" onclick="openRating('Catin')">
        <div class="poli-icon-wrap"><span class="poli-icon">💑</span></div>
        <span class="poli-name">CATIN</span>
      </div>
      <div class="poli-card" onclick="openRating('Haji')">
        <div class="poli-icon-wrap"><span class="poli-icon">🕌</span></div>
        <span class="poli-name">HAJI</span>
      </div>
      <div class="poli-card" onclick="openRating('Konseling')">
        <div class="poli-icon-wrap"><span class="poli-icon">💬</span></div>
        <span class="poli-name">KONSELING</span>
      </div>
      <div class="poli-card" onclick="openRating('Ruang Bersalin')">
        <div class="poli-icon-wrap"><span class="poli-icon">🤱</span></div>
        <span class="poli-name">RUANG BERSALIN</span>
      </div>
      <div class="poli-card" onclick="openRating('Apotek')">
        <div class="poli-icon-wrap"><span class="poli-icon">💊</span></div>
        <span class="poli-name">APOTEK</span>
      </div>
      <div class="poli-card" onclick="openRating('Loket')">
        <div class="poli-icon-wrap"><span class="poli-icon">🎟️</span></div>
        <span class="poli-name">LOKET</span>
      </div>
      <div class="poli-card" onclick="openRating('Lab')">
        <div class="poli-icon-wrap"><span class="poli-icon">🔬</span></div>
        <span class="poli-name">LAB</span>
      </div>
      <div class="poli-card" onclick="openRating('Dewasa 1')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧑‍⚕️</span></div>
        <span class="poli-name">DEWASA 1</span>
      </div>
      <div class="poli-card" onclick="openRating('Dewasa 2')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧑‍⚕️</span></div>
        <span class="poli-name">DEWASA 2</span>
      </div>
      <div class="poli-card" onclick="openRating('Anak 1')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧒</span></div>
        <span class="poli-name">ANAK 1</span>
      </div>
      <div class="poli-card" onclick="openRating('Anak 2')">
        <div class="poli-icon-wrap"><span class="poli-icon">🧒</span></div>
        <span class="poli-name">ANAK 2</span>
      </div>
    </div>

    <!-- last row: Anak 3 & 4 centered -->
    <!-- <div class="poli-grid-last">
      <div class="poli-card" onclick="openRating('Anak 3')">
        <div class="poli-icon-wrap"><span class="poli-icon">👧</span></div>
        <span class="poli-name">ANAK 3</span>
      </div>
      <div class="poli-card" onclick="openRating('Anak 4')">
        <div class="poli-icon-wrap"><span class="poli-icon">👦</span></div>
        <span class="poli-name">ANAK 4</span>
      </div>
    </div> -->
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <div class="footer-clock">
      <span class="clock-icon">🕐</span>
      <div>
        <div class="clock-time" id="jam">--:--</div>
        <div class="clock-date" id="tanggal">--</div>
      </div>
    </div>
    <div class="footer-msg">
      <span class="footer-msg-icon">📣</span>
      <p>Kepuasan Anda adalah motivasi kami untuk memberikan pelayanan terbaik.</p>
    </div>
    <div class="footer-thanks">
      <span class="footer-thanks-icon">😊</span>
      <div class="footer-thanks-text">Terima Kasih<br>Atas Partisipasi Anda</div>
    </div>
  </div>

</div>

<!-- RATING MODAL -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <button class="btn-close" onclick="closeRating()">✕</button>
    <div class="modal-poli-name" id="modalPoliName">Poli Umum</div>
    <h2>Bagaimana pelayanan di poli ini?</h2>
    <div class="rating-stars" id="ratingStars">
      <button class="star-btn" data-val="1" onclick="selectStar(1)">⭐</button>
      <button class="star-btn" data-val="2" onclick="selectStar(2)">⭐</button>
      <button class="star-btn" data-val="3" onclick="selectStar(3)">⭐</button>
      <button class="star-btn" data-val="4" onclick="selectStar(4)">⭐</button>
      <button class="star-btn" data-val="5" onclick="selectStar(5)">⭐</button>
    </div>
    <div class="rating-labels">
      <span>Sangat Buruk</span>
      <span>Kurang</span>
      <span>Cukup</span>
      <span>Baik</span>
      <span>Sangat Baik</span>
    </div>
    <button class="btn-submit" id="btnSubmit" disabled onclick="submitRating()">Kirim Penilaian</button>
  </div>
</div>

<!-- THANK YOU -->
<div class="thankyou-overlay" id="thankyouOverlay">
  <div class="big-emoji">🎉</div>
  <h2>Terima Kasih!</h2>
  <p>Penilaian Anda telah berhasil dikirim.<br>Masukan Anda sangat berarti bagi kami.</p>
</div>

<script>
  const HARI  = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const BULAN = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

  function updateClock() {
    const now = new Date();
    document.getElementById('jam').textContent =
      `${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}`;
    document.getElementById('tanggal').textContent =
      `${HARI[now.getDay()]}, ${now.getDate()} ${BULAN[now.getMonth()]} ${now.getFullYear()}`;
  }
  updateClock();
  setInterval(updateClock, 1000);

  let selectedStar = 0;
  let currentPoli  = '';

  function openRating(poliName) {
    currentPoli  = poliName;
    selectedStar = 0;
    document.getElementById('modalPoliName').textContent = `Poli ${poliName}`;
    document.getElementById('btnSubmit').disabled = true;
    document.querySelectorAll('.star-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('modalOverlay').classList.add('open');
  }

  function closeRating() {
    document.getElementById('modalOverlay').classList.remove('open');
  }

  function selectStar(val) {
    selectedStar = val;
    document.querySelectorAll('.star-btn').forEach(b => {
      b.classList.toggle('active', parseInt(b.dataset.val) <= val);
    });
    document.getElementById('btnSubmit').disabled = false;
  }

  function submitRating() {
    closeRating();
    const overlay = document.getElementById('thankyouOverlay');
    overlay.classList.add('open');
    setTimeout(() => overlay.classList.remove('open'), 3000);
    // Hook: kirim ke server di sini
    console.log(`Survei: ${currentPoli} — Bintang: ${selectedStar}`);
  }

  document.getElementById('modalOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeRating();
  });
</script>
</body>
</html>
