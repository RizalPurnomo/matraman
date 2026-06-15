<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Pemanggil - Antrian KB</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap');

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Inter', sans-serif;
    background: #f5f5f5;
    min-height: 100vh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 20px;
  }

  .card {
    background: #fff;
    border: 2px solid #e53935;
    border-radius: 10px;
    width: 100%;
    max-width: 520px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(229, 57, 53, 0.10);
  }

  /* Header */
  .card-header {
    border-bottom: 2px solid #1565C0;
    padding: 16px 20px 12px;
  }

  .card-header .title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1a1a2e;
    text-transform: uppercase;
    letter-spacing: 0.08em;
  }

  .card-header .subtitle {
    font-size: 0.78rem;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-top: 2px;
  }

  /* Prefix tabs */
  .prefix-tabs {
    display: flex;
    gap: 6px;
    margin-top: 12px;
  }

  .prefix-tab {
    width: 34px;
    height: 34px;
    border-radius: 6px;
    border: 1.5px solid #ccc;
    background: #fff;
    font-size: 0.85rem;
    font-weight: 700;
    color: #555;
    cursor: pointer;
    transition: all 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .prefix-tab:hover {
    border-color: #1565C0;
    color: #1565C0;
  }

  .prefix-tab.active {
    background: #1565C0;
    border-color: #1565C0;
    color: #fff;
  }

  /* Sections */
  .section {
    border-bottom: 2px solid #1565C0;
    padding: 18px 20px;
  }

  .section:last-of-type { border-bottom: none; }

  .section-label {
    font-size: 0.78rem;
    font-weight: 600;
    color: #555;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }

  .input-row {
    display: flex;
    gap: 8px;
    align-items: center;
  }

  .input-row input {
    flex: 1;
    border: 1.5px solid #d0d0d0;
    border-radius: 6px;
    padding: 9px 12px;
    font-size: 0.95rem;
    font-family: inherit;
    color: #1a1a2e;
    outline: none;
    transition: border-color 0.15s;
  }

  .input-row input:focus {
    border-color: #1565C0;
    box-shadow: 0 0 0 3px rgba(21,101,192,0.1);
  }

  .input-row input::placeholder { color: #bbb; }

  .btn-call-icon {
    width: 36px;
    height: 36px;
    border-radius: 6px;
    background: #f5f5f5;
    border: 1.5px solid #d0d0d0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #555;
    transition: all 0.15s;
    flex-shrink: 0;
  }

  .btn-call-icon:hover {
    background: #1565C0;
    border-color: #1565C0;
    color: #fff;
  }

  /* Current number display */
  .current-section {
    padding: 22px 20px 18px;
    text-align: center;
    border-bottom: 2px solid #1565C0;
  }

  .current-number {
    font-size: 3.2rem;
    font-weight: 900;
    color: #1a1a2e;
    letter-spacing: 0.05em;
    line-height: 1.1;
  }

  /* Action buttons */
  .action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
    margin-top: 12px;
  }

  .btn {
    padding: 8px 22px;
    border-radius: 6px;
    border: none;
    font-size: 0.88rem;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.15s;
    letter-spacing: 0.03em;
  }

  .btn-reply {
    background: #1565C0;
    color: #fff;
  }

  .btn-reply:hover { background: #0D47A1; }

  .btn-next {
    background: #43A047;
    color: #fff;
  }

  .btn-next:hover { background: #2E7D32; }

  .btn-separator {
    color: #bbb;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
  }

  /* Footer */
  .card-footer {
    padding: 10px 20px;
    text-align: center;
    font-size: 0.8rem;
    color: #e53935;
    font-weight: 600;
    letter-spacing: 0.06em;
    border-top: 1px solid #fce4e4;
  }

  /* Queue type selector */
  .queue-type-selector {
    display: flex;
    gap: 6px;
    margin-top: 10px;
  }

  .type-tab {
    flex: 1;
    padding: 7px 6px;
    border-radius: 6px;
    border: 1.5px solid #d0d0d0;
    background: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    color: #888;
    cursor: pointer;
    transition: all 0.15s;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }

  .type-tab:hover { border-color: #1565C0; color: #1565C0; }

  .type-tab.active {
    background: #E3F2FD;
    border-color: #1565C0;
    color: #1565C0;
  }

  /* Status badge */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.7rem;
    color: #888;
    margin-top: 8px;
  }

  .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ccc;
    transition: background 0.3s;
  }

  .dot.on { background: #43A047; }
  .dot.blink {
    animation: blink 1s infinite;
  }

  @keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.2; }
  }

  /* Counter info */
  .counter-display {
    font-size: 0.78rem;
    color: #999;
    margin-top: 4px;
  }

  /* Toast */
  .toast {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%) translateY(80px);
    background: #1a1a2e;
    color: #fff;
    padding: 10px 22px;
    border-radius: 8px;
    font-size: 0.88rem;
    font-weight: 600;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 999;
    white-space: nowrap;
  }

  .toast.show {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
  }
</style>
</head>
<body>

<div class="card">
  <!-- Header -->
  <div class="card-header">
    <div class="title">ANTRIAN KB</div>
    <div class="subtitle" id="prefixLabel">PREFIX A</div>

    <div class="prefix-tabs" id="prefixTabs">
      <button class="prefix-tab active" data-prefix="A" onclick="selectPrefix(this)">A</button>
      <button class="prefix-tab" data-prefix="B" onclick="selectPrefix(this)">B</button>
      <button class="prefix-tab" data-prefix="C" onclick="selectPrefix(this)">C</button>
      <button class="prefix-tab" data-prefix="D" onclick="selectPrefix(this)">D</button>
      <button class="prefix-tab" data-prefix="E" onclick="selectPrefix(this)">E</button>
    </div>

    <!-- Tipe loket -->
    <div class="queue-type-selector" id="queueTypeTabs">
      <button class="type-tab active" data-type="KB" onclick="selectType(this)">KB</button>
      <button class="type-tab" data-type="KI" onclick="selectType(this)">KI</button>
      <button class="type-tab" data-type="UP" onclick="selectType(this)">U P 24 JAM</button>
    </div>

    <div class="status-badge">
      <span class="dot" id="statusDot"></span>
      <span id="statusText">Belum terhubung ke display</span>
    </div>
  </div>

  <!-- Manual call -->
  <div class="section">
    <div class="section-label">Panggil Manual</div>
    <div class="input-row">
      <input type="text" id="manualInput" placeholder="Ketik nomor antrian (contoh: CA-5)" />
      <button class="btn-call-icon" title="Panggil" onclick="callManual()">📢</button>
    </div>
  </div>

  <!-- Call by name -->
  <div class="section">
    <div class="section-label">Panggil Berdasarkan Nama</div>
    <div class="input-row">
      <input type="text" id="nameInput" placeholder="Masukkan nama" />
      <button class="btn-call-icon" title="Panggil berdasarkan nama" onclick="callByName()">🔍</button>
    </div>
  </div>

  <!-- Current number + actions -->
  <div class="current-section">
    <div class="current-number" id="currentDisplay">CA-0</div>
    <div class="counter-display" id="counterDisplay">Loket: <strong id="currentType">KB</strong> — Prefix: <strong id="currentPrefix">A</strong></div>

    <div class="action-buttons">
      <button class="btn btn-reply" onclick="replyCall()">Reply</button>
      <span class="btn-separator">-</span>
      <button class="btn btn-next" onclick="nextCall()">Next</button>
    </div>
  </div>

  <div class="card-footer">Form Pemanggil</div>
</div>

<div class="toast" id="toast"></div>

<script>
  // ——— State ———
  let state = {
    prefix: 'A',
    queueType: 'KB',
    counters: {
      KB: { A:0, B:0, C:0, D:0, E:0 },
      KI: { A:0, B:0, C:0, D:0, E:0 },
      UP: { A:0, B:0, C:0, D:0, E:0 }
    },
    lastCalled: null,
    lastName: null
  };

  // Prefix map → nomor awal per tipe
  const prefixMap = { KB: 'C', KI: 'D', UP: 'E' };

  // ——— BroadcastChannel ———
  const channel = new BroadcastChannel('antrian_channel');
  let displayConnected = false;

  // Ping display setiap 3 detik
  function pingDisplay() {
    channel.postMessage({ type: 'ping' });
  }
  setInterval(pingDisplay, 3000);
  pingDisplay();

  channel.onmessage = (e) => {
    if (e.data.type === 'pong') {
      displayConnected = true;
      document.getElementById('statusDot').classList.add('on');
      document.getElementById('statusText').textContent = 'Display TV terhubung ✓';
    }
  };

  // ——— Helpers ———
  function buildNumber(type, prefix, num) {
    const letter = prefixMap[type] || 'X';
    return `${letter}${prefix}-${num}`;
  }

  function getCurrentNumber() {
    const num = state.counters[state.queueType][state.prefix];
    return buildNumber(state.queueType, state.prefix, num);
  }

  function updateDisplay() {
    const num = getCurrentNumber();
    document.getElementById('currentDisplay').textContent = num;
    document.getElementById('currentType').textContent = state.queueType;
    document.getElementById('currentPrefix').textContent = state.prefix;
  }

  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2800);
  }

  function sendCall(number, name = null) {
    const counterStr = `${state.queueType} / Prefix ${state.prefix}`;
    const payload = {
      type: 'call',
      number,
      counter: counterStr,
      name: name || null,
      prefix: state.prefix,
      queueType: state.queueType,
      timestamp: Date.now()
    };
    channel.postMessage(payload);
    state.lastCalled = number;
    state.lastName = name;

    if (!displayConnected) {
      showToast('⚠️ Display TV belum terhubung — buka display_tv_antrian.html');
    } else {
      showToast(`📢 Memanggil ${number}${name ? ' (' + name + ')' : ''}`);
    }
  }

  // ——— Actions ———
  function selectPrefix(el) {
    document.querySelectorAll('.prefix-tab').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    state.prefix = el.dataset.prefix;
    document.getElementById('prefixLabel').textContent = `PREFIX ${state.prefix}`;
    updateDisplay();
  }

  function selectType(el) {
    document.querySelectorAll('.type-tab').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    state.queueType = el.dataset.type;
    updateDisplay();
  }

  function nextCall() {
    state.counters[state.queueType][state.prefix]++;
    const number = getCurrentNumber();
    updateDisplay();
    sendCall(number);
  }

  function replyCall() {
    if (!state.lastCalled) {
      showToast('Belum ada panggilan sebelumnya');
      return;
    }
    sendCall(state.lastCalled, state.lastName);
    showToast(`🔁 Memanggil ulang ${state.lastCalled}`);
  }

  function callManual() {
    const val = document.getElementById('manualInput').value.trim();
    if (!val) { showToast('Masukkan nomor antrian terlebih dahulu'); return; }
    sendCall(val.toUpperCase());
    document.getElementById('manualInput').value = '';
  }

  function callByName() {
    const name = document.getElementById('nameInput').value.trim();
    if (!name) { showToast('Masukkan nama pasien terlebih dahulu'); return; }
    // Auto-increment dan panggil dengan nama
    state.counters[state.queueType][state.prefix]++;
    const number = getCurrentNumber();
    updateDisplay();
    sendCall(number, name);
    document.getElementById('nameInput').value = '';
  }

  // Enter key support
  document.getElementById('manualInput').addEventListener('keydown', e => { if(e.key==='Enter') callManual(); });
  document.getElementById('nameInput').addEventListener('keydown', e => { if(e.key==='Enter') callByName(); });

  // Init
  updateDisplay();
</script>
</body>
</html>
