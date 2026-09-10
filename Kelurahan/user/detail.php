<?php
include '../admin/db.php'; // Koneksi ke database

// Inisialisasi query untuk mengambil data berita
$query = "SELECT * FROM berita";

// Periksa apakah ada pencarian dan lakukan sanitasi input
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= " WHERE title LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kelurahan Panggi</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="../css/detail.css">
    <style>
        /* Root Variables */
        :root {
            --primary: #006ba8;
            --background: #010101;
            --text-light: #fff;
            --text-dark: #333;
            --text-muted: #666;
            --card-bg: #fff;
            --card-shadow: rgba(0, 0, 0, 0.1);
        }

        /* Reset & Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-light);
            padding: 40px 20px;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--background);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-logo {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .navbar-logo span {
            color: var(--text-light);
        }

        .navbar-nav a {
            color: var(--text-light);
            margin-left: 1rem;
            text-decoration: none;
            font-size: 1rem;
        }

        .navbar-nav a:hover {
            color: var(--primary);
        }

        /* Section Berita */
        #berita {
            text-align: center;
            margin-top: 100px;
        }

        #berita h2 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        #berita p {
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .news-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem 0;
        }

        .news-card {
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 8px var(--card-shadow);
            width: 300px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-card-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .news-card-content {
            padding: 1rem;
            display: flex;
            flex-direction: column;
        }

        .news-card-title {
            font-size: 1.2rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .news-card-date {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
        }

        .news-card-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: bold;
        }

        .news-card-link:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            margin-top: 2rem;
            text-align: center;
            color: var(--text-muted);
        }

        .socials a {
            color: var(--text-light);
            margin: 0 10px;
            font-size: 1.5rem;
        }

        .socials a:hover {
            color: var(--primary);
        }

        .credit a {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="index.php" class="navbar-logo">Kelurahan<span>Panggi</span>.</a>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="index.php#about">Tentang</a>
            <a href="index.php#berita">Berita</a>
        </div>
    </nav>

    <!-- News Section -->
    <section id="berita">
        <h2><span>Berita</span> Terkini</h2>
        <p>Berikut adalah berita-berita terbaru seputar Kelurahan Panggi:</p>

        <div class="news-container">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="news-card">
                <img src="../img/menu/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="news-card-img">
                <div class="news-card-content">
                    <h3 class="news-card-title"><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p class="news-card-date">Tanggal: <?php echo date("d-m-Y", strtotime($row['tanggal'])); ?></p>
                    <a href="lihat_berita.php?berita_id=<?php echo $row['id']; ?>" class="news-card-link">Lihat Berita</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/kyy2ez/?hl=en"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="https://wa.me/qr/MOLWMNOP7DXZM1"><i data-feather="phone"></i></a>
        </div>

        <div class="credit">
            <p>Created By <a href="#">RizkiFikriansyah</a>. | &copy; 2025</p>
        </div>
    </footer>

    <!-- Feather Icons Script -->
    <script>
        feather.replace();
    </script>
</body>
</html>
