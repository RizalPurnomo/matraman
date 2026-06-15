<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display TV Antrian - Lantai 1</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap');

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Inter', sans-serif;
    background: #f0f4f8;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 20px;
  }

  .header {
    background: #fff;
    border: 2px solid #1565C0;
    border-radius: 8px 8px 0 0;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .header h1 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a1a2e;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }

  .header h1 span {
    font-weight: 400;
    font-size: 0.85rem;
    color: #555;
    text-transform: uppercase;
    letter-spacing: 0.12em;
  }

  .main-panel {
    background: #fff;
    border: 2px solid #1565C0;
    border-top: none;
    border-radius: 0 0 8px 8px;
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }

  /* NOW CALLING section */
  .now-calling {
    background: #fff;
    border-bottom: 2px solid #4CAF50;
    padding: 28px 40px 20px;
    text-align: center;
    flex: 0 0 auto;
  }

  .now-calling .current-number {
    font-size: 5rem;
    font-weight: 900;
    color: #1a1a2e;
    letter-spacing: 0.05em;
    line-height: 1;
    transition: all 0.3s ease;
  }

  .now-calling .current-number.flash {
    animation: flashPulse 0.5s ease-in-out 3;
  }

  @keyframes flashPulse {
    0%, 100% { color: #1a1a2e; transform: scale(1); }
    50% { color: #1565C0; transform: scale(1.05); }
  }

  .now-calling .separator {
    font-size: 2rem;
    color: #999;
    margin: 4px 0;
  }

  .now-calling .counter-info {
    font-size: 0.9rem;
    color: #888;
    margin-top: 4px;
  }

  /* Queue cards grid */
  .queue-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-top: 1px solid #e0e0e0;
    flex: 1;
  }

  .queue-card {
    border-right: 1px solid #e0e0e0;
    padding: 20px 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }

  .queue-card:last-child { border-right: none; }

  .queue-card .label {
    font-size: 1rem;
    font-weight: 700;
    color: #1565C0;
    letter-spacing: 0.05em;
    text-align: center;
  }

  .queue-card .number {
    font-size: 2.6rem;
    font-weight: 900;
    color: #1a1a2e;
    letter-spacing: 0.04em;
  }

  /* Message bar */
  .message-bar {
    border-top: 1px solid #e0e0e0;
    padding: 10px 20px;
    font-size: 0.85rem;
    color: #777;
    min-height: 36px;
    display: flex;
    align-items: center;
  }

  /* Footer */
  .footer {
    text-align: center;
    padding: 10px;
    font-size: 0.8rem;
    color: #1565C0;
    font-weight: 600;
    letter-spacing: 0.05em;
    cursor: pointer;
  }

  /* Overlay saat dipanggil */
  .call-overlay {
    position: fixed;
    inset: 0;
    background: rgba(21, 101, 192, 0.92);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
  }

  .call-overlay.show {
    opacity: 1;
    pointer-events: all;
  }

  .call-overlay .overlay-label {
    font-size: 1.4rem;
    color: rgba(255,255,255,0.8);
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 12px;
  }

  .call-overlay .overlay-number {
    font-size: 9rem;
    font-weight: 900;
    color: #fff;
    letter-spacing: 0.04em;
    animation: bounceIn 0.4s ease;
  }

  .call-overlay .overlay-counter {
    font-size: 1.6rem;
    color: rgba(255,255,255,0.7);
    margin-top: 8px;
  }

  .call-overlay .overlay-name {
    font-size: 2rem;
    color: #FFE082;
    font-weight: 700;
    margin-top: 16px;
  }

  @keyframes bounceIn {
    0% { transform: scale(0.6); opacity: 0; }
    70% { transform: scale(1.08); }
    100% { transform: scale(1); opacity: 1; }
  }

  .status-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #ccc;
    display: inline-block;
    margin-right: 6px;
    transition: background 0.3s;
  }

  .status-dot.connected { background: #4CAF50; }

  .status-bar {
    padding: 4px 20px;
    font-size: 0.72rem;
    color: #aaa;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #f0f0f0;
  }
</style>
</head>
<body>

<div class="header">
  <h1>ANTRIAN <span>LANTAI 1</span></h1>
</div>

<div class="main-panel">
  <div class="status-bar">
    <span class="status-dot" id="statusDot"></span>
    <span id="statusText">Menunggu koneksi form pemanggil...</span>
  </div>

  <div class="now-calling">
    <div class="current-number" id="currentNumber">---0</div>
    <div class="separator">-</div>
    <div class="counter-info" id="counterInfo">0 - -</div>
  </div>

  <div class="queue-grid">
    <div class="queue-card">
      <div class="label">KB</div>
      <div class="number" id="numKB">CA-0</div>
    </div>
    <div class="queue-card">
      <div class="label">KI</div>
      <div class="number" id="numKI">DA-0</div>
    </div>
    <div class="queue-card">
      <div class="label">U P 24 JAM</div>
      <div class="number" id="numUP">EA-0</div>
    </div>
  </div>

  <div class="message-bar" id="messagebar">(belum ada pesan)</div>
</div>

<div class="footer" onclick="window.location.reload()">Display TV Antrian</div>

<!-- Overlay panggilan -->
<div class="call-overlay" id="callOverlay">
  <div class="overlay-label">Nomor Antrian Dipanggil</div>
  <div class="overlay-number" id="overlayNumber">---</div>
  <div class="overlay-counter" id="overlayCounter"></div>
  <div class="overlay-name" id="overlayName"></div>
</div>

<script>
  // ——— State ———
  const state = {
    current: { number: '---0', counter: '0 - -' },
    queues: { KB: 'CA-0', KI: 'DA-0', UP: 'EA-0' },
    message: '(belum ada pesan)'
  };

  // ——— DOM refs ———
  const currentNumberEl = document.getElementById('currentNumber');
  const counterInfoEl   = document.getElementById('counterInfo');
  const numKB = document.getElementById('numKB');
  const numKI = document.getElementById('numKI');
  const numUP = document.getElementById('numUP');
  const messagebar = document.getElementById('messagebar');
  const callOverlay = document.getElementById('callOverlay');
  const overlayNumber = document.getElementById('overlayNumber');
  const overlayCounter = document.getElementById('overlayCounter');
  const overlayName = document.getElementById('overlayName');
  const statusDot = document.getElementById('statusDot');
  const statusText = document.getElementById('statusText');

  // ——— BroadcastChannel ———
  const channel = new BroadcastChannel('antrian_channel');

  channel.onmessage = (event) => {
    const data = event.data;

    if (data.type === 'ping') {
      statusDot.classList.add('connected');
      statusText.textContent = 'Form pemanggil terhubung ✓';
      channel.postMessage({ type: 'pong' });
      return;
    }

    if (data.type === 'call') {
      handleCall(data);
    }

    if (data.type === 'update_queue') {
      updateQueueDisplay(data);
    }
  };

  function handleCall(data) {
    // Update tampilan utama
    const { number, counter, name, prefix, queueType } = data;

    currentNumberEl.textContent = number;
    counterInfoEl.textContent = counter || '0 - -';

    // Update kartu sesuai tipe
    if (queueType === 'KB') numKB.textContent = number;
    else if (queueType === 'KI') numKI.textContent = number;
    else if (queueType === 'UP') numUP.textContent = number;

    // Flash animasi
    currentNumberEl.classList.remove('flash');
    void currentNumberEl.offsetWidth;
    currentNumberEl.classList.add('flash');

    // Show overlay
    overlayNumber.textContent = number;
    overlayCounter.textContent = counter || '';
    overlayName.textContent = name ? `— ${name}` : '';
    callOverlay.classList.add('show');

    // Suara TTS
    speakCall(number, name, queueType);

    // Hilangkan overlay setelah 5 detik
    setTimeout(() => {
      callOverlay.classList.remove('show');
    }, 5000);

    // Update pesan
    if (name) {
      messagebar.textContent = `Pasien "${name}" harap menuju loket ${queueType}`;
    } else {
      messagebar.textContent = `Nomor ${number} harap menuju loket`;
    }
  }

  function speakCall(number, name, queueType) {
    if (!window.speechSynthesis) return;

    // Pisahkan prefix dan nomor untuk dibaca lebih alami
    // mis. "CA-5" → "C A 5"
    const readable = number.replace(/([A-Z]+)-(\d+)/, (_, prefix, num) => {
      return prefix.split('').join(' ') + ' ' + num;
    });

    let text = `Nomor antrian ${readable}`;
    if (queueType) text += `, loket ${queueType}`;
    if (name) text += `, atas nama ${name}`;
    text += `, silakan menuju loket.`;

    // Ulangi 2x
    const utterance1 = new SpeechSynthesisUtterance(text);
    const utterance2 = new SpeechSynthesisUtterance(text);
    utterance1.lang = 'id-ID';
    utterance2.lang = 'id-ID';
    utterance1.rate = 0.9;
    utterance2.rate = 0.9;
    utterance1.volume = 1;
    utterance2.volume = 1;

    window.speechSynthesis.cancel();
    window.speechSynthesis.speak(utterance1);
    utterance1.onend = () => {
      setTimeout(() => window.speechSynthesis.speak(utterance2), 800);
    };
  }

  function updateQueueDisplay(data) {
    if (data.KB !== undefined) numKB.textContent = data.KB;
    if (data.KI !== undefined) numKI.textContent = data.KI;
    if (data.UP !== undefined) numUP.textContent = data.UP;
  }

  // Klik overlay untuk tutup manual
  callOverlay.addEventListener('click', () => {
    callOverlay.classList.remove('show');
    window.speechSynthesis && window.speechSynthesis.cancel();
  });
</script>
</body>
</html>
