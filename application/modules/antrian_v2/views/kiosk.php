<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Tebet - Layanan Pendaftaran</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background-color: #fff;
    color: #003300;
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

header {
    text-align: center;
    border-bottom: 4px solid #0c7b26;
    padding-bottom: 10px;
}

.logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
}

.logo img {
    height: 70px;
}

.header-text h2 {
    margin: 0;
    font-size: 24px;
    color: #222;
}

main {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.left {
    width: 65%;
}

.right {
    width: 30%;
}

.card {
    background-color: #f4fdf5;
    border-left: 10px solid #0c7b26;
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 20px;
    position: relative;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}

.card h3 {
    margin-top: 0;
    color: #0c7b26;
    font-size: 18px;
}

.card ul {
    margin: 10px 0 0 15px;
    padding: 0;
}

.card ul li {
    list-style-type: disc;
    font-size: 15px;
    color: #333;
}

.card p {
    font-size: 15px;
    margin: 10px 0;
}

.button {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background-color: #0c7b26;
    color: white;
    font-weight: bold;
    font-size: 22px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
}

.right-card {
    text-align: left;
}

footer {
    border-top: 4px solid #0c7b26;
    text-align: center;
    padding-top: 10px;
    margin-top: 40px;
}

.footer-links {
    color: #006600;
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="https://puskesmastbt.jakarta.go.id/wp-content/uploads/2022/03/logo.png" alt="Logo Puskesmas Tebet">
                <div class="header-text">
                    <h2>SILAKAN PILIH PENDAFTARAN SESUAI</h2>
                    <h2>DENGAN KATEGORI PELAYANAN</h2>
                </div>
            </div>
        </header>

        <main>
            <section class="left">
                <div class="card">
                    <h3>KLASTER IBU DAN ANAK</h3>
                    <ul>
                        <li>Ibu Hamil</li>
                        <li>Ibu Nifas</li>
                        <li>KB</li>
                        <li>Bayi & Balita</li>
                        <li>Anak Sekolah & Remaja</li>
                    </ul>
                    <div class="button">A</div>
                </div>

                <div class="card">
                    <h3>KLASTER USIA DEWASA & LANSIA</h3>
                    <ul>
                        <li>Usia Dewasa 18 s/d 60 th</li>
                        <li>Lansia & ≥ 60 th</li>
                    </ul>
                    <div class="button">B</div>
                </div>

                <div class="card">
                    <h3>PRIORITAS</h3>
                    <ul>
                        <li>Disabilitas</li>
                        <li>Ibu Hamil & Balita</li>
                        <li>Check-in Online</li>
                    </ul>
                    <div class="button">C</div>
                </div>
            </section>

            <section class="right">
                <div class="card right-card">
                    <h3>INFORMASI / PPIP</h3>
                    <p>Petugas Pemberi Informasi Layanan</p>
                    <div class="button">D</div>
                </div>

                <div class="card right-card">
                    <h3>KASIR</h3>
                    <div class="button">E</div>
                </div>
            </section>
        </main>

        <footer>
            <div class="footer-links">
                <span>puskesmastbt.jakarta.go.id</span> |
                <span>www.pkttebet.com</span> |
                <span>@pkttebet.official</span>
            </div>
        </footer>
    </div>
</body>
</html>
