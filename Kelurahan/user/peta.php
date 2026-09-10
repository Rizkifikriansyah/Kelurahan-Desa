<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Panggi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #006ba8;
            --bg: #010101;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: #fff;
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

        #about {
            padding: 8rem 7% 3rem;
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .about-img {
            flex: 1 1 45%;
        }

        .about-img img {
            width: 100%;
            border-radius: 10px;
        }

        .content {
            flex: 1 1 45%;
            padding: 1rem;
        }

        .content h2 {
            font-size: 2.6rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .content h2 span {
            color: var(--primary);
        }

        .content h3 {
            color: var(--primary);
            font-size: 1.8rem;
            margin-top: 1rem;
        }

        .content p {
            font-size: 1.4rem;
            line-height: 1.6;
            margin-top: 0.5rem;
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="navbar-logo">Kelurahan<span>Panggi</span>.</a>
        <div class="navbar-nav">
            <a href="index.php#">Home</a>
            <a href="index.php#about">Tentang</a>
            <a href="index.php#berita">Berita</a>
        </div>
    </nav>
  
    <section id="about" class="about">
        <div class="about-img">
            <img src="../img/peta.png" alt="Struktur Organisasi Kelurahan Panggi">
        </div>
        <div class="content">
            <h2><span>Data Monografi</span> Kelurahan </h2>
            <p>1. Desa/Kelurahan            : Panggi</p>
            <p>2. Nomor kode                : 52.72.051.008</p>
            <p>3. Tingkat Perkembangan      : Cepat Berkembang</p>
            <p>4. Kecamatan                 : Mpunda</p>
            <p>5. Kabupaten/Kota            : Bima</p>
            <p>6. Luas                      : 351.00 KM<sup>2</sup></p>
            <h3>Batas Wilayah</h3>
            <p>Sebelah Barat Kelurahan Sambinae</p>
            <p>Sebelah Timur Kelurahan Rontu</p>
            <p>Sebelah Utara Kelurahan Mande</p>
            <p>Sebelah Selatan Desa Teke Kab.Bima</p>
        </div>
    </section>

</body>
</html>
