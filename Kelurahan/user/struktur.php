<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi Kelurahan</title>
    <style>
        :root {
            --primary: #006ba8;
            --secondary: #f39c12;
            --bg: #010101;
            --text-dark: #333;
            --text-light: white;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }

        body {
            background-color: var(--bg);
            padding: 20px;
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.4rem 7%;
            background-color: rgba(1, 1, 1, 0.8);
            border-bottom: 1px solid #513c28;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }

        .navbar-logo {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            font-style: italic;
            text-decoration: none;
        }

        .navbar-logo span {
            color: var(--primary);
        }

        .navbar-nav {
            display: flex;
            gap: 2rem;
        }

        .navbar-nav a {
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: var(--primary);
        }

        h1 {
            color: var(--primary);
            margin-bottom: 30px;
            text-align: center;
            padding: 60px;
        }

        .organization-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            width: 100%;
        }

        .level {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .position {
            background-color: white;
            border: 2px solid var(--primary);
            border-radius: 8px;
            padding: 10px 15px;
            text-align: center;
            min-width: 150px;
            max-width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .position h3 {
            color: var(--primary);
            font-size: 16px;
            margin-bottom: 8px;
        }

        .position p {
            font-size: 14px;
            color: var(--text-dark);
        }

        .line {
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            position: relative;
            margin: -10px 0 20px 0;
        }

        .photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid var(--secondary);
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            .level {
                flex-direction: column;
                align-items: center;
            }

            .line {
                display: none;
            }
        }
    </style>
</head>
<body>
<nav class="navbar">
        <a href="index.php#" class="navbar-logo">Kelurahan<span>Panggi</span>.</a>
        <div class="navbar-nav">
            <a href="index.php#">Home</a>
            <a href="index.php#about">Tentang</a>
            <a href="index.php#berita">Berita</a>
        </div>
    </nav>

    <h1>Struktur Organisasi Kelurahan Panggi</h1>
    <div class="organization-chart">
        <!-- Level 1 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/wanul.jpeg" alt="Lurah">
                <h3>Lurah</h3>
                <p>Ijwan, S.Sos</p>
                <p>NIP: 19850113</p>
            </div>
        </div>
        <div class="line"></div>
        <!-- Level 2 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/kiki.jpg" alt="Sekretaris">
                <h3>Sekretaris</h3>
                <p>Muhammad Rhoma Putra, SE</p>
                <p>NIP: 19781007</p>
            </div>
        </div>
        <div class="line"></div>
        <!-- Level 3 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/erik.jpeg" alt="Kasi Pemerintahan">
                <h3>Kasi Pemerintahan</h3>
                <p>Salehuddin, S.Sos</p>
                <p>NIP: 19740405</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/nurr.jpeg" alt="Kasi Perekonomian">
                <h3>Kasi Perekonomian</h3>
                <p>Juliah, ST</p>
                <p>NIP: 19811129</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/afri.jpeg" alt="Kasi Pembangunan">
                <h3>Kasi Pembangunan</h3>
                <p>Khaerunnas, S.Sos</p>
                <p>NIP: 19771208</p>
            </div>
        </div>
        <div class="line"></div>
        <!-- Level 4 -->
        <div class="level">
            <div class="position">
                <h3>Staf</h3>
                <p>Zainuddin</p>
                <p>NIP: 197407052007</p>
            </div>
            <div class="position">
                <h3>Staf</h3>
                <p>Suci Susanti</p>
                <p>--</p>
            </div>
            <div class="position">
                <h3>Staf</h3>
                <p>Agus Rahmadi</p>
                <p>--</p>
            </div>
        </div>
    </div>
</body>
</html>
