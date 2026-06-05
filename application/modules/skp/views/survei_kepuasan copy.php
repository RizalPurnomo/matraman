<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Survei Kepuasan — Puskesmas</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Barlow+Condensed:wght@700;800;900&display=swap" rel="stylesheet">
<style>
  :root {
    --blue-dark:   #0a2a5e;
    --blue-mid:    #1043a0;
    --blue-light:  #1a5dc8;
    --blue-bg:     #e8f0ff;
    --green-dark:  #064e2c;
    --green-mid:   #0b7a3e;
    --green-light: #13a354;
    --white:       #ffffff;
    --off-white:   #f5f8ff;
    --text-dark:   #0a1f3d;
    --text-mid:    #3d5a8a;
    --accent:      #f5c842;
    --radius-card: 18px;
    --shadow-sm:   0 2px 10px rgba(10,42,94,0.10);
    --shadow-md:   0 6px 24px rgba(10,42,94,0.16);
    --shadow-lg:   0 12px 40px rgba(10,42,94,0.22);
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html, body {
    height: 100%;
    font-family: 'Nunito', sans-serif;
    background: #0d1b2e;
    overflow: hidden;
  }

  /* ── WRAPPER ── */
  .page {
    height: 100vh;
    display: flex;
    flex-direction: column;
  }

  /* ── TOP BAR ── */
  .topbar {
    background: linear-gradient(90deg, var(--blue-dark) 0%, #102f7a 55%, var(--green-dark) 100%);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px clamp(16px, 2.5vw, 36px);
    border-bottom: 3px solid var(--accent);
    gap: 16px;
    flex-shrink: 0;
  }

  .topbar-brand {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .topbar-icon-box {
    width: clamp(38px, 5vw, 56px);
    height: clamp(38px, 5vw, 56px);
    background: var(--white);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(18px, 2.8vw, 30px);
    box-shadow: var(--shadow-sm);
    flex-shrink: 0;
  }
  .stars { color: var(--accent); font-size: clamp(8px, 1vw, 12px); letter-spacing: 1px; }
  .topbar-title {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(18px, 3vw, 38px);
    font-weight: 900;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1;
  }
  .topbar-sub {
    font-size: clamp(9px, 1.1vw, 14px);
    color: rgba(255,255,255,0.65);
    margin-top: 2px;
  }

  .topbar-clock {
    display: flex; align-items: center; gap: 10px;
    color: var(--white);
    text-align: right;
  }
  .clock-time {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(20px, 3vw, 40px);
    font-weight: 800;
    line-height: 1;
    letter-spacing: 1px;
  }
  .clock-date { font-size: clamp(8px, 1vw, 12px); color: rgba(255,255,255,0.55); margin-top: 2px; }

  /* ── MAIN ── */
  .main {
    flex: 1;
    display: grid;
    grid-template-columns: 1.15fr 1fr;
    min-height: 0;
  }

  /* ── LEFT: SURVEI ── */
  .panel-survei {
    background: linear-gradient(160deg, var(--blue-dark) 0%, #153a90 100%);
    display: flex;
    flex-direction: column;
    padding: clamp(12px, 1.8vw, 24px) clamp(14px, 2vw, 28px);
    gap: clamp(10px, 1.4vw, 18px);
    border-right: 3px solid rgba(255,255,255,0.1);
    overflow: hidden;
  }

  /* ── POLI GRID ── */
  .poli-container {
    flex: 1;
    background: rgba(255,255,255,0.96);
    border-radius: var(--radius-card);
    padding: clamp(10px, 1.4vw, 18px);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
  }

  .poli-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: clamp(6px, 0.9vw, 12px);
    height: 100%;
    align-content: start;
  }

  .poli-btn {
    background: var(--off-white);
    border: 2px solid transparent;
    border-radius: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: clamp(8px, 1vw, 14px) 6px;
    cursor: pointer;
    transition: all 0.22s ease;
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
    animation: fadeUp 0.4s ease backwards;
  }

  .poli-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(26,93,200,0.08), rgba(19,163,84,0.06));
    opacity: 0;
    transition: opacity 0.2s;
  }

  .poli-btn:hover {
    border-color: var(--blue-light);
    transform: translateY(-3px) scale(1.03);
    box-shadow: var(--shadow-md);
    background: var(--white);
  }
  .poli-btn:hover::before { opacity: 1; }

  .poli-btn:active {
    transform: scale(0.96);
    background: var(--blue-bg);
  }

  .poli-btn.selected {
    border-color: var(--blue-mid);
    background: var(--blue-bg);
    box-shadow: 0 0 0 3px rgba(26,93,200,0.2), var(--shadow-md);
  }

  .poli-icon {
    font-size: clamp(22px, 3vw, 38px);
    line-height: 1;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.12));
  }
  .poli-label {
    font-size: clamp(7px, 0.85vw, 11px);
    font-weight: 800;
    color: var(--text-dark);
    text-align: center;
    letter-spacing: 0.3px;
    line-height: 1.2;
  }

  @keyframes fadeUp {
    from { opacity:0; transform: translateY(14px); }
    to   { opacity:1; transform: translateY(0); }
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

  /* ── FOOTER SURVEI ── */
  .survei-footer {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: clamp(8px, 1vw, 14px) clamp(12px, 1.5vw, 20px);
    flex-shrink: 0;
  }
  .survei-footer-icon { font-size: clamp(18px, 2.5vw, 30px); }
  .survei-footer p {
    font-size: clamp(9px, 1vw, 13px);
    color: rgba(255,255,255,0.8);
  }
  .survei-footer strong { color: var(--white); display: block; font-weight: 800; }

  /* ── RIGHT: VIDEO PANEL ── */
  .panel-video {
    background: linear-gradient(160deg, #052018 0%, var(--green-dark) 50%, #0a4a28 100%);
    display: flex;
    flex-direction: column;
    padding: clamp(12px, 1.8vw, 24px) clamp(14px, 2vw, 28px);
    gap: clamp(10px, 1.4vw, 18px);
    overflow: hidden;
  }

  .video-header {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
  }
  .video-header-badge {
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 30px;
    display: flex; align-items: center; gap: 8px;
    padding: 6px 14px;
    font-size: clamp(10px, 1.2vw, 15px);
    font-weight: 800;
    color: var(--white);
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }

  .video-title-wrap {
    flex: 1;
  }
  .video-title {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(18px, 2.8vw, 36px);
    font-weight: 900;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 1px;
    line-height: 1;
  }
  .video-sub {
    font-size: clamp(8px, 1vw, 13px);
    color: rgba(255,255,255,0.6);
    margin-top: 2px;
  }

  /* ── YOUTUBE EMBED ── */
  .video-wrap {
    flex: 1;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.5);
    background: #000;
    position: relative;
    min-height: 0;
  }
  .video-wrap iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
  }

  /* ── VIDEO PLAYLIST THUMBS ── */
  .playlist {
    display: flex;
    gap: clamp(6px, 0.9vw, 12px);
    flex-shrink: 0;
  }
  .playlist-item {
    flex: 1;
    background: rgba(255,255,255,0.1);
    border: 2px solid transparent;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    flex-direction: column;
  }
  .playlist-item:hover { border-color: rgba(255,255,255,0.4); transform: translateY(-2px); }
  .playlist-item.active { border-color: var(--accent); }

  .playlist-thumb {
    width: 100%;
    aspect-ratio: 16/9;
    background: #1a3a25;
    display: flex; align-items: center; justify-content: center;
    font-size: clamp(18px, 2.5vw, 30px);
    position: relative;
    overflow: hidden;
  }
  .playlist-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.75;
  }
  .playlist-play-overlay {
    position: absolute;
    inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,0,0,0.3);
    font-size: clamp(14px, 2vw, 22px);
    transition: background 0.2s;
  }
  .playlist-item:hover .playlist-play-overlay { background: rgba(0,0,0,0.15); }

  .playlist-info {
    padding: clamp(4px, 0.6vw, 8px) clamp(6px, 0.8vw, 10px);
  }
  .playlist-label {
    font-size: clamp(7px, 0.8vw, 10px);
    font-weight: 800;
    color: rgba(255,255,255,0.85);
    line-height: 1.3;
  }

  /* ── BOTTOM BAR ── */
  .bottombar {
    background: linear-gradient(90deg, #071830 0%, #0c2952 40%, #062818 100%);
    border-top: 2px solid rgba(255,255,255,0.08);
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    padding: 8px clamp(16px, 2.5vw, 36px);
    gap: 16px;
    flex-shrink: 0;
  }

  .bottom-clock {
    display: flex; align-items: center; gap: 10px;
  }
  .bottom-clock-icon { font-size: clamp(16px, 2vw, 26px); }
  .bottom-clock-time {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: clamp(18px, 2.5vw, 34px);
    font-weight: 800;
    color: var(--white);
    line-height: 1;
    letter-spacing: 1px;
  }
  .bottom-clock-date { font-size: clamp(8px, 0.9vw, 11px); color: rgba(255,255,255,0.5); }

  .bottom-ticker {
    display: flex; align-items: center; gap: 10px;
    overflow: hidden;
  }
  .ticker-icon { font-size: clamp(14px, 1.8vw, 22px); flex-shrink: 0; }
  .ticker-text {
    font-size: clamp(10px, 1.2vw, 15px);
    color: rgba(255,255,255,0.75);
    white-space: nowrap;
    animation: scroll-left 22s linear infinite;
    display: inline-block;
  }
  @keyframes scroll-left {
    0%   { transform: translateX(50%); }
    100% { transform: translateX(-120%); }
  }

  .bottom-thanks {
    display: flex; align-items: center; gap: 10px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    padding: 6px 14px;
    white-space: nowrap;
  }
  .bottom-thanks-icon { font-size: clamp(14px, 1.8vw, 22px); }
  .bottom-thanks-text {
    font-size: clamp(8px, 0.9vw, 12px);
    color: rgba(255,255,255,0.75);
    font-weight: 700;
    letter-spacing: 0.3px;
    text-transform: uppercase;
    line-height: 1.3;
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .main { grid-template-columns: 1fr; overflow-y: auto; }
    html, body { overflow: auto; }
    .poli-grid { grid-template-columns: repeat(4, 1fr); }
    .panel-video { min-height: 60vw; }
    .bottombar { grid-template-columns: auto 1fr; }
    .bottom-thanks { display: none; }
  }
  @media (max-width: 560px) {
    .poli-grid { grid-template-columns: repeat(3, 1fr); }
    .playlist { flex-wrap: wrap; }
    .playlist-item { flex: 0 0 calc(50% - 6px); }
  }
  /* ── STRUK PRINT — hanya muncul saat print ── */
  #strukPrint { display: none; }

  @media print {
    /* Sembunyikan semua elemen halaman utama */
    body > * { display: none !important; }

    /* Tampilkan hanya struk */
    #strukPrint {
      display: block !important;
      position: fixed;
      inset: 0;
      background: #fff;
      z-index: 9999;
    }

    .struk-wrap {
      width: 80mm;
      margin: 0 auto;
      font-family: 'Courier New', Courier, monospace;
      font-size: 11pt;
      color: #000;
      padding: 4mm 0;
    }

    .struk-center  { text-align: center; }
    .struk-divider {
      border: none;
      border-top: 1px dashed #000;
      margin: 3mm 0;
    }
    .struk-logo    { font-size: 15pt; font-weight: 900; letter-spacing: 1px; }
    .struk-sub     { font-size: 8pt; margin-bottom: 1mm; }
    .struk-title   {
      font-size: 10pt;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin: 2mm 0 1mm;
    }

    .struk-no-antrian {
      font-size: 36pt;
      font-weight: 900;
      letter-spacing: 4px;
      line-height: 1.1;
      margin: 3mm 0 2mm;
    }

    .struk-jenis-badge {
      display: inline-block;
      border: 1.5px solid #000;
      border-radius: 3mm;
      padding: 1mm 4mm;
      font-size: 9pt;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 3mm;
    }

    .struk-row {
      display: flex;
      justify-content: space-between;
      font-size: 9pt;
      margin: 1mm 0;
    }
    .struk-row .lbl { color: #444; }
    .struk-row .val { font-weight: 700; text-align: right; max-width: 55%; }

    .struk-footer  { font-size: 8pt; margin-top: 3mm; }
    .struk-rating-label {
      font-size: 9pt;
      font-weight: 700;
      margin-top: 2mm;
    }
    .struk-stars   { font-size: 13pt; letter-spacing: 2px; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- TOP BAR -->
  <div class="topbar">
    <div class="topbar-brand">
      <div class="topbar-icon-box">
        <div>😊<div class="stars">★★★★★</div></div>
      </div>
      <div>
        <div class="topbar-title">Antrian Farmasi dan Survei Kepuasan Puskesmas Matraman</div>
        <div class="topbar-sub">Pilih poli yang Anda kunjungi</div>
      </div>
    </div>
    <div class="topbar-clock">
      <span style="font-size:clamp(18px,2.5vw,30px)">🕐</span>
      <div>
        <div class="clock-time" id="topClock">--:--</div>
        <div class="clock-date" id="topDate">--</div>
      </div>
    </div>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- LEFT: SURVEI -->
    <div class="panel-survei">
      <div class="poli-container">
        <div class="poli-grid" id="poliGrid">
          <!-- populated by JS -->
        </div>
      </div>
      <div class="survei-footer">
        <span class="survei-footer-icon">💙</span>
        <p>
          <strong>Terima kasih atas penilaian Anda.</strong>
          Masukan Anda sangat berarti untuk kami.
        </p>
      </div>
    </div>

    <!-- RIGHT: VIDEO -->
    <div class="panel-video">
      <div class="video-header">
        <div class="video-header-badge">📺 Promosi Kesehatan</div>
        <div class="video-title-wrap">
          <div class="video-title">Informasi &amp; Edukasi</div>
          <div class="video-sub">Video kesehatan pilihan untuk Anda</div>
        </div>
      </div>

      <div class="video-wrap">
        <!-- <div id="ytPlayer"></div> -->
        <iframe
          id="ytPlayer"
          src="https://www.youtube.com/embed/JdZyGtRKXGA?si=ZRcYwV47T-YAgxY7&autoplay=1&mute=1&controls=1&rel=0&modestbranding=1"
          allow="autoplay; encrypted-media"
          allowfullscreen
          title="Promosi Kesehatan">
        </iframe>
      </div>

      <div class="playlist" id="playlist">
        <!-- populated by JS -->
      </div>
    </div>

  </div>

  <!-- BOTTOM BAR -->
  <div class="bottombar">
    <div class="bottom-clock">
      <span class="bottom-clock-icon">🕐</span>
      <div>
        <div class="bottom-clock-time" id="botClock">--:--</div>
        <div class="bottom-clock-date" id="botDate">--</div>
      </div>
    </div>
    <div class="bottom-ticker">
      <span class="ticker-icon">📢</span>
      <span class="ticker-text">Kepuasan Anda adalah motivasi kami untuk memberikan pelayanan terbaik. Silakan pilih poli yang Anda kunjungi dan berikan penilaian Anda.</span>
    </div>
    <div class="bottom-thanks">
      <span class="bottom-thanks-icon">😊</span>
      <div class="bottom-thanks-text">Terima Kasih<br>Atas Partisipasi Anda</div>
    </div>
  </div>

</div>

<!-- ── MODAL RATING ── -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">

    <div id="formContent">
      <!-- Header: icon + nama poli -->
      <div style="font-size:clamp(26px,4.5vw,48px); margin-bottom:6px;" id="modalIcon">🏥</div>
      <div class="modal-poli-name" id="modalPoliName">Poli Umum</div>

      <!-- Step indicator -->
      <div class="step-indicator">
        <div class="step-dot active" id="stepDot1">1</div>
        <div class="step-line" id="stepLine1"></div>
        <div class="step-dot" id="stepDot2">2</div>
      </div>

      <!-- ── STEP 1: Jenis Antrian ── -->
      <div class="jenis-step show" id="stepJenis">
        <div class="jenis-title">Pilih jenis antrian Anda</div>

        <!-- Khusus prioritas only (Lansia & Ruang Bersalin) -->
        <div class="jenis-prioritas-only" id="prioritasOnlyInfo">
          <span class="jenis-prioritas-only-icon">⭐</span>
          <div class="jenis-prioritas-only-text">
            <strong>Antrian Prioritas</strong>
            <span>Poli ini hanya melayani antrian prioritas</span>
          </div>
        </div>

        <!-- Pilihan normal (2 tombol) -->
        <div class="jenis-row" id="jenisRow">
          <button class="jenis-btn prioritas" id="btnPrioritas" onclick="pilihJenis(this,'prioritas')">
            <div class="jenis-icon-wrap">⭐</div>
            <span class="jenis-label">Prioritas</span>
            <span class="jenis-desc">Lansia, ibu hamil,<br>penyandang disabilitas</span>
          </button>
          <button class="jenis-btn umum" id="btnUmum" onclick="pilihJenis(this,'umum')">
            <div class="jenis-icon-wrap">👥</div>
            <span class="jenis-label">Umum</span>
            <span class="jenis-desc">Pasien umum<br>reguler</span>
          </button>
        </div>

        <button class="btn-lanjut" id="btnLanjut" disabled onclick="lanjutKeRating()">Lanjut →</button>
        <button class="btn-batal" onclick="tutupModal()">Batal</button>
      </div>

      <!-- ── STEP 2: Rating ── -->
      <div class="rating-step" id="stepRating">
        <div class="modal-sub" style="margin-bottom:clamp(12px,1.8vw,20px);">Bagaimana pelayanan di poli ini?</div>
        <div class="rating-row">
          <button class="rating-btn sangat-puas" data-val="4" onclick="pilihRating(this)">
            <span class="rating-emoji">😄</span>
            <span class="rating-label">Sangat<br>Puas</span>
          </button>
          <button class="rating-btn puas" data-val="3" onclick="pilihRating(this)">
            <span class="rating-emoji">😊</span>
            <span class="rating-label">Puas</span>
          </button>
          <button class="rating-btn kurang-puas" data-val="2" onclick="pilihRating(this)">
            <span class="rating-emoji">😐</span>
            <span class="rating-label">Kurang<br>Puas</span>
          </button>
          <button class="rating-btn tidak-puas" data-val="1" onclick="pilihRating(this)">
            <span class="rating-emoji">😞</span>
            <span class="rating-label">Tidak<br>Puas</span>
          </button>
        </div>
        <button class="btn-kirim" id="btnKirim" disabled onclick="kirimSurvei()">Kirim Penilaian</button>
        <br>
        <button class="btn-batal" onclick="kembaliKeJenis()">← Kembali</button>
      </div>
    </div>

    <!-- Terimakasih -->
    <div class="thanks-box" id="thanksBox">
      <span class="thanks-emoji">🎉</span>
      <div class="thanks-title">Terima Kasih!</div>
      <div class="thanks-sub">Penilaian Anda telah berhasil dikirim.<br>Masukan Anda sangat berarti bagi kami.</div>
    </div>

  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script>
// ── DATA POLI ──
// function loadPoliList() {
//     $.ajax({
//         type: 'GET',
//         dataType: 'json',
//         url: '<?= base_url("skp/survei_kepuasan/getPoliList") ?>',
//         success: function(response) {
//           console.log('loadPoliList response:', response);
//             if (response.success) {
//                 renderPoliGrid(response.data);
//             } else {
//                 console.error('Gagal memuat data poli:', response.message);
//             }
//         },
//         error: function(xhr, status, err) {
//             console.error('loadPoliList error:', status, err);
//         }
//     });
// }

function renderPoliGrid(poliList) {
    const grid = document.getElementById('poliGrid');
    grid.innerHTML = '';

    poliList.forEach((poli, i) => {
        const btn = document.createElement('button');
        btn.className = 'poli-btn';
        btn.style.animationDelay = `${i * 0.03}s`;
        btn.innerHTML = `
            <span class="poli-icon">${poli.icon}</span>
            <span class="poli-label">${poli.label}</span>
        `;
        // Tandai apakah poli ini prioritas-only
        btn.addEventListener('click', () => bukaModa({
            label:          poli.label,
            icon:           poli.icon,
            color:          poli.color,
            prioritasOnly:  poli.prioritas_only == 1,
        }));
        grid.appendChild(btn);
    });
}
// loadPoliList();
const poliList = [
  { id: '1', label: 'UMUM',         icon: '👥',  color: '#1a5dc8' },
  { id: '2', label: 'GIGI',         icon: '🦷',  color: '#0891b2' },
  { id: '3', label: 'KB',           icon: '👨‍👩‍👧‍👦', color: '#7c3aed' },
  { id: '5', label: 'UP 24JAM',     icon: '⏰',  color: '#dc2626' },
  { id: '6', label: 'MTBS',         icon: '👶',  color: '#0b7a3e' },
  { id: '7', label: 'TB',           icon: '🫁',  color: '#065f46' },
  { id: '8', label: 'LANSIA',       icon: '👴',  color: '#d97706' },
  { id: '9', label: 'GIZI',         icon: '🍎',  color: '#16a34a' },
  { id: '10', label: 'IMUNISASI',    icon: '💉',  color: '#9333ea' },
  { id: '11', label: 'PTM',          icon: '❤️',  color: '#e11d48' },
  { id: '12', label: 'PSIKOLOGI',    icon: '🧠',  color: '#2563eb' },
  { id: '14', label: 'UBM',          icon: '🙌',  color: '#0d9488' },
  { id: '15', label: 'LAVENDER',     icon: '💜',  color: '#7c3aed' },
  { id: '17', label: 'CATIN',        icon: '💑',  color: '#ec4899' },
  { id: '18', label: 'HAJI',         icon: '🕌',  color: '#064e2c' },
  { id: '19', label: 'KONSELING',    icon: '💬',  color: '#1043a0' },
  { id: '21', label: 'RUANG BERSALIN', icon: '🤱', color: '#be185d' },
  { id: '22', label: 'APOTEK',       icon: '💊',  color: '#166534' },
  { id: '23', label: 'LOKET',        icon: '🎫',  color: '#c2410c' },
  { id: '24', label: 'LAB',          icon: '🔬',  color: '#1e40af' },
  { id: '25', label: 'DEWASA 1',     icon: '🧑',  color: '#1d4ed8' },
  { id: '26', label: 'DEWASA 2',     icon: '🧑',  color: '#1d4ed8' },
  { id: '29', label: 'ANAK 1',       icon: '👧',  color: '#ec4899' },
  { id: '30', label: 'ANAK 2',       icon: '👦',  color: '#f97316' }
];

// Poli yang hanya boleh antrian prioritas
const PRIORITAS_ONLY = ['LANSIA', 'RUANG BERSALIN'];

let selectedRating  = null;
let selectedJenis   = null;   // 'prioritas' | 'umum'
let activePoli      = null;
let activeVideoIdx  = 0;

// ── RENDER POLI GRID ──
const grid = document.getElementById('poliGrid');
poliList.forEach((poli, i) => {
  const btn = document.createElement('button');
  btn.className = 'poli-btn';
  btn.style.animationDelay = `${i * 0.03}s`;
  btn.innerHTML = `
    <span class="poli-icon">${poli.icon}</span>
    <span class="poli-label">${poli.label}</span>
  `;
  btn.addEventListener('click', () => bukaModa(poli));
  grid.appendChild(btn);
});

// // ── KONFIGURASI PLAYLIST ──
// // Ganti dengan Video ID YouTube milik puskesmas
// const PLAYLIST_VIDEOS = [
//   { id: 'PL2I1nhIRb4N8KE_Rn1nFmqVodX7e4VLFJ', label: 'Pentingnya Olahraga Rutin',        icon: '🏃' },
//   { id: 'PLaAjUvyQZ1zU2Xjft_rsWPIJj0GxGVbQ8', label: 'Pola Hidup Sehat Setiap Hari',    icon: '🥗' },
//   { id: 'inpok4MKVLM', label: 'Bahaya Merokok & Cara Berhenti',   icon: '🚭' },
//   { id: '7YUoFKrB9YQ', label: 'Vaksinasi & Imunisasi Anak',       icon: '💉' },
// ];

// let ytPlayer       = null;   // instance YT.Player
// let activeVideoIdx = 0;      // index video yang sedang diputar

// // ── LOAD YOUTUBE IFRAME API ──
// // API ini async — memanggil onYouTubeIframeAPIReady saat siap
// const ytScript   = document.createElement('script');
// ytScript.src     = 'https://www.youtube.com/iframe_api';
// document.head.appendChild(ytScript);

// // Callback wajib dipanggil secara global oleh YouTube API
// window.onYouTubeIframeAPIReady = function () {
//   ytPlayer = new YT.Player('ytPlayer', {
//     width:  '100%',
//     height: '100%',
//     videoId: PLAYLIST_VIDEOS[0].id,
//     playerVars: {
//       autoplay:       1,
//       mute:           1,   // wajib mute agar autoplay bekerja di browser
//       controls:       1,
//       rel:            0,   // tidak tampilkan video rekomendasi dari channel lain
//       modestbranding: 1,
//       playsinline:    1,
//     },
//     events: {
//       onReady:       onPlayerReady,
//       onStateChange: onPlayerStateChange,
//     },
//   });
// };

// function onPlayerReady(event) {
//   event.target.playVideo();
//   renderPlaylist();           // render thumbnail setelah player siap
//   highlightPlaylist(0);
// }

// function onPlayerStateChange(event) {
//   // YT.PlayerState.ENDED = 0
//   if (event.data === YT.PlayerState.ENDED) {
//     activeVideoIdx++;

//     if (activeVideoIdx >= PLAYLIST_VIDEOS.length) {
//       // Sudah video terakhir → mulai dari awal
//       activeVideoIdx = 0;
//     }

//     ytPlayer.loadVideoById(PLAYLIST_VIDEOS[activeVideoIdx].id);
//     ytPlayer.playVideo();
//     highlightPlaylist(activeVideoIdx);
//   }

//   // Sinkron highlight saat user klik manual di kontrol YouTube
//   if (event.data === YT.PlayerState.PLAYING) {
//     highlightPlaylist(activeVideoIdx);
//   }
// }

// // ── RENDER PLAYLIST THUMBNAIL ──
// function renderPlaylist() {
//   const playlistEl = document.getElementById('playlist');
//   playlistEl.innerHTML = '';

//   PLAYLIST_VIDEOS.forEach((v, i) => {
//     const item = document.createElement('div');
//     item.className  = 'playlist-item';
//     item.id         = `playlist-item-${i}`;
//     item.innerHTML  = `
//       <div class="playlist-thumb">
//         <img
//           src="https://img.youtube.com/vi/${v.id}/mqdefault.jpg"
//           alt="${v.label}"
//           onerror="this.style.display='none'"
//         >
//         <div class="playlist-play-overlay">▶️</div>
//       </div>
//       <div class="playlist-info">
//         <div class="playlist-label">${v.icon} ${v.label}</div>
//       </div>
//     `;
//     item.addEventListener('click', () => gantiVideo(i));
//     playlistEl.appendChild(item);
//   });

//   highlightPlaylist(0);
// }

// function gantiVideo(idx) {
//   if (!ytPlayer || typeof ytPlayer.loadVideoById !== 'function') return;
//   activeVideoIdx = idx;
//   ytPlayer.loadVideoById(PLAYLIST_VIDEOS[idx].id);
//   ytPlayer.playVideo();
//   highlightPlaylist(idx);
// }

// function highlightPlaylist(idx) {
//   document.querySelectorAll('.playlist-item').forEach((el, i) => {
//     el.classList.toggle('active', i === idx);
//   });
// }

// ── DATA VIDEO (ganti video_id sesuai kebutuhan) ──
const videoList = [
  { id: 'y55DCTqyU3c', label: 'Inovasi Pinterest', icon: '🥗' },
  { id: 'Uqik5g1APZY', label: 'GKM Kartu Cinta', icon: '🏃' },
  { id: 'nBZE95f95qY', label: 'Mengenal Penyakit Tidak Menular, Apa Saja Penyebabnya', icon: '🚭' },
  { id: '6BLe0LaAeig', label: 'Konsep SDIDTK dan PMBA', icon: '💉' },
];

// ── RENDER PLAYLIST ──
const playlistEl = document.getElementById('playlist');
videoList.forEach((v, i) => {
  const item = document.createElement('div');
  item.className = 'playlist-item' + (i === 0 ? ' active' : '');
  item.innerHTML = `
    <div class="playlist-thumb">
      <img src="https://img.youtube.com/vi/${v.id}/mqdefault.jpg" alt="${v.label}" onerror="this.style.display='none'">
      <div class="playlist-play-overlay">▶️</div>
    </div>
    <div class="playlist-info">
      <div class="playlist-label">${v.icon} ${v.label}</div>
    </div>
  `;
  item.addEventListener('click', () => gantiVideo(i, item));
  playlistEl.appendChild(item);
});

function gantiVideo(idx, itemEl) {
  activeVideoIdx = idx;
  document.querySelectorAll('.playlist-item').forEach(el => el.classList.remove('active'));
  itemEl.classList.add('active');
  const iframe = document.getElementById('ytPlayer');
  iframe.src = `https://www.youtube.com/embed/${videoList[idx].id}?autoplay=1&mute=1&controls=1&rel=0&modestbranding=1`;
}

// ── MODAL ──
function bukaModa(poli) {
  activePoli     = poli;
  selectedRating = null;
  selectedJenis  = null;

  const isPrioritasOnly = PRIORITAS_ONLY.includes(poli.label);

  document.getElementById('modalPoliName').textContent = poli.label;
  document.getElementById('modalIcon').textContent     = poli.icon;
  document.getElementById('formContent').style.display = 'block';
  document.getElementById('thanksBox').classList.remove('show');

  // Reset step UI
  tampilkanStepJenis();

  // Tampilkan/sembunyikan pilihan sesuai tipe poli
  const jenisRow          = document.getElementById('jenisRow');
  const prioritasOnlyInfo = document.getElementById('prioritasOnlyInfo');
  const btnLanjut         = document.getElementById('btnLanjut');

  if (isPrioritasOnly) {
    // Hanya prioritas — sembunyikan pilihan, auto-set
    jenisRow.style.display          = 'none';
    prioritasOnlyInfo.classList.add('show');
    selectedJenis                   = 'prioritas';
    btnLanjut.disabled              = false;
  } else {
    // Tampilkan dua pilihan
    jenisRow.style.display = '';
    prioritasOnlyInfo.classList.remove('show');
    document.querySelectorAll('.jenis-btn').forEach(b => b.classList.remove('selected'));
    btnLanjut.disabled = true;
  }

  document.getElementById('modalOverlay').classList.add('show');
}

function tampilkanStepJenis() {
  document.getElementById('stepJenis').classList.add('show');
  document.getElementById('stepRating').classList.remove('show');
  // Step indicator
  document.getElementById('stepDot1').classList.add('active');
  document.getElementById('stepDot1').classList.remove('done');
  document.getElementById('stepDot2').classList.remove('active','done');
  document.getElementById('stepLine1').classList.remove('done');
}

function tampilkanStepRating() {
  document.getElementById('stepJenis').classList.remove('show');
  document.getElementById('stepRating').classList.add('show');
  // Reset rating
  document.querySelectorAll('.rating-btn').forEach(b => b.classList.remove('active'));
  selectedRating = null;
  document.getElementById('btnKirim').disabled = true;
  // Step indicator
  document.getElementById('stepDot1').classList.remove('active');
  document.getElementById('stepDot1').classList.add('done');
  document.getElementById('stepLine1').classList.add('done');
  document.getElementById('stepDot2').classList.add('active');
}

function pilihJenis(btn, jenis) {
  document.querySelectorAll('.jenis-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
  selectedJenis = jenis;
  document.getElementById('btnLanjut').disabled = false;
}

function lanjutKeRating() {
  if (!selectedJenis) return;
  tampilkanStepRating();
}

function kembaliKeJenis() {
  tampilkanStepJenis();
  // Re-terapkan state prioritas-only jika perlu
  const isPrioritasOnly = PRIORITAS_ONLY.includes(activePoli?.label);
  if (!isPrioritasOnly) {
    document.getElementById('btnLanjut').disabled = !selectedJenis;
  }
}

function tutupModal() {
  document.getElementById('modalOverlay').classList.remove('show');
  activePoli = null; selectedRating = null; selectedJenis = null;
}

function pilihRating(btn) {
  document.querySelectorAll('.rating-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  selectedRating = btn.dataset.val;
  document.getElementById('btnKirim').disabled = false;
}

// ── RATING META ──
const RATING_META = {
  '4': { label: 'Sangat Puas', stars: '★★★★★' },
  '3': { label: 'Puas',        stars: '★★★★☆' },
  '2': { label: 'Kurang Puas', stars: '★★★☆☆' },
  '1': { label: 'Tidak Puas',  stars: '★★☆☆☆' },
};

function kirimSurvei() {
  if (!selectedRating || !selectedJenis) return;
  // TODO: kirim ke backend, misal:
  $.ajax({
    type:     'POST',
    dataType: 'json',
    url:      '/matraman/skp/survei_kepuasan/simpan',
    data:     {
      id_poli: activePoli.id,
      prioritas: selectedJenis,
      rating: selectedRating
    },
    success: function(response) {
      console.log('Survei disimpan:', response);
      const noAntrian = selectedJenis === 'prioritas'
          ? 'P' + response.no_antrian.toString().padStart(3, '0')
          :       response.no_antrian.toString().padStart(3, '0');

        // Isi data struk
        isikanStruk({
          noAntrian,
          poli:   activePoli.label,
          jenis:  selectedJenis,
          rating: selectedRating,
        });
  },
    error:   (xhr, status, err) => reject(new Error(`${status}: ${err}`)),
  });

  
  // $.post('/matraman/skp/survei_kepuasan/simpan', { poli: activePoli.label, jenis: selectedJenis, rating: selectedRating });
  // console.log('Survei dikirim:', { poli: activePoli?.label, jenis: selectedJenis, rating: selectedRating });

  document.getElementById('formContent').style.display = 'none';
  document.getElementById('thanksBox').classList.add('show');

  // Cetak 2 kali — jeda antar cetak agar dialog print pertama sempat selesai
  cetakStruk(2);

  setTimeout(tutupModal, 4000);
}

/**
 * Cetak struk sebanyak N kali secara berurutan.
 * @param {number} jumlah  - berapa kali cetak
 * @param {number} jeda    - jeda antar cetak dalam ms (default 800)
 */
function cetakStruk(jumlah = 1, jeda = 800) {
  let count = 0;

  function doprint() {
    if (count >= jumlah) return;
    count++;
    window.print();
    // Setelah print dialog ditutup user, cetak berikutnya
    setTimeout(doprint, jeda);
  }

  // Delay awal agar modal thanks sempat terrender
  setTimeout(doprint, 300);
}

function isikanStruk({ noAntrian, poli, jenis, rating }) {
  const now = new Date();

  const HARI_STR  = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const BULAN_STR = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];

  const tgl = `${HARI_STR[now.getDay()]}, ${now.getDate()} ${BULAN_STR[now.getMonth()]} ${now.getFullYear()}`;
  const jam = `${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}:${String(now.getSeconds()).padStart(2,'0')}`;

  const meta = RATING_META[rating] ?? { label: '-', stars: '—' };

  document.getElementById('strukNoAntrian').textContent   = noAntrian;
  document.getElementById('strukJenisBadge').textContent  = jenis === 'prioritas' ? '⭐ PRIORITAS' : '👥 UMUM';
  document.getElementById('strukPoli').textContent        = poli;
  document.getElementById('strukJenis').textContent       = jenis === 'prioritas' ? 'Prioritas' : 'Umum';
  document.getElementById('strukTanggal').textContent     = tgl;
  document.getElementById('strukJam').textContent         = jam;
  document.getElementById('strukStars').textContent       = meta.stars;
  document.getElementById('strukRatingLabel').textContent = meta.label;
}

// Tutup modal jika klik overlay
document.getElementById('modalOverlay').addEventListener('click', function(e) {
  if (e.target === this) tutupModal();
});

// ── CLOCK ──
const HARI  = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
const BULAN = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

function updateClock() {
  const now  = new Date();
  const hh   = String(now.getHours()).padStart(2,'0');
  const mm   = String(now.getMinutes()).padStart(2,'0');
  const time = `${hh}:${mm}`;
  const date = `${HARI[now.getDay()]}, ${now.getDate()} ${BULAN[now.getMonth()]} ${now.getFullYear()}`;
  ['topClock','botClock'].forEach(id => document.getElementById(id).textContent = time);
  ['topDate','botDate'].forEach(id   => document.getElementById(id).textContent = date);
}
updateClock();
setInterval(updateClock, 1000);
</script>

<!-- ── STRUK CETAK (hidden, hanya tampil saat print) ── -->
<div id="strukPrint">
  <div class="struk-wrap">

    <!-- Header -->
    <div class="struk-center">
      <div class="struk-logo">PUSKESMAS MATRAMAN</div>
      <div class="struk-sub">Jl. Galur Sari Timur, RT.14/RW.1</div>
      <div class="struk-sub">Utan Kayu Sel, Matraman</div>
      <div class="struk-sub">Telp: (021)21011622</div>
    </div>

    <hr class="struk-divider">

    <div class="struk-center">
      <div class="struk-title">Bukti Antrian Farmasi</div>
    </div>

    <hr class="struk-divider">

    <!-- Nomor Antrian — besar di tengah -->
    <div class="struk-center">
      <div class="struk-sub" style="margin-top:2mm;">Nomor Antrian</div>
      <div class="struk-no-antrian" id="strukNoAntrian">—</div>
      <div class="struk-jenis-badge" id="strukJenisBadge">UMUM</div>
    </div>

    <hr class="struk-divider">

    <!-- Detail -->
    <div class="struk-row">
      <span class="lbl">Asal Poli</span>
      <span class="val" id="strukPoli">—</span>
    </div>
    <div class="struk-row">
      <span class="lbl">Jenis Pasien</span>
      <span class="val" id="strukJenis">—</span>
    </div>
    <div class="struk-row">
      <span class="lbl">Tanggal</span>
      <span class="val" id="strukTanggal">—</span>
    </div>
    <div class="struk-row">
      <span class="lbl">Jam Daftar</span>
      <span class="val" id="strukJam">—</span>
    </div>

    <hr class="struk-divider">

    <!-- Rating -->
    <div class="struk-center">
      <div class="struk-sub">Penilaian Anda</div>
      <div class="struk-stars" id="strukStars">★★★★☆</div>
      <div class="struk-rating-label" id="strukRatingLabel">Puas</div>
    </div>

    <hr class="struk-divider">

    <!-- Footer -->
    <div class="struk-center struk-footer">
      <div>Silakan menuju ruang farmasi</div>
      <div>dan tunggu nomor Anda dipanggil.</div>
      <div style="margin-top:3mm;">Terima kasih atas kepercayaan Anda.</div>
      <div style="margin-top:4mm; font-size:7pt; color:#666;">
        ★ Kesehatan Anda adalah prioritas kami ★
      </div>
    </div>

  </div>
</div>
</body>
</html>
