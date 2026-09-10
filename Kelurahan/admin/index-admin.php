<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login-admin.php");
    exit;
}

include 'db.php';

// Query berita
$query = "SELECT * FROM berita ORDER BY id DESC";

// Fitur pencarian
if (isset($_GET['search']) && $_GET['search'] != '') {

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM berita 
              WHERE name LIKE '%$search%' 
              ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kelurahan</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    background:#f5f5f5;
}

/* NAVBAR */

.navbar{
    width:100%;
    background:#007bff;
    padding:15px 8%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:sticky;
    top:0;
    z-index:999;
}

.navbar-logo{
    color:#fff;
    text-decoration:none;
    font-size:24px;
    font-weight:700;
}

.navbar-logo span{
    color:#ffd43b;
}

.navbar-nav a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    font-size:15px;
}

.navbar-nav a:hover{
    color:#ffd43b;
}

/* HERO */

.hero{
    min-height:70vh;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    background-image:url("../img/kel.jpg");
    background-size:cover;
    background-position:center;
    position:relative;
}

.hero::after{
    content:'';
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
}

.hero .content{
    position:relative;
    z-index:2;
    color:white;
    width:80%;
}

.hero h1{
    font-size:45px;
    margin-bottom:20px;
}

.hero h1 span{
    color:#ffd43b;
}

.hero h3{
    font-weight:300;
    margin-bottom:25px;
}

.cta{
    display:inline-block;
    padding:12px 25px;
    background:#007bff;
    color:white;
    text-decoration:none;
    border-radius:6px;
    transition:0.3s;
}

.cta:hover{
    background:#0056b3;
}

/* SECTION */

section{
    padding:70px 8%;
}

section h2{
    text-align:center;
    margin-bottom:20px;
    font-size:32px;
}

section h2 span{
    color:#007bff;
}

/* ABOUT */

.row{
    display:flex;
    flex-wrap:wrap;
    gap:30px;
    align-items:center;
}

.about-img{
    flex:1 1 400px;
}

.about-img img{
    width:100%;
    border-radius:10px;
}

.content{
    flex:1 1 400px;
}

.content h3{
    margin-bottom:10px;
    color:#007bff;
}

.content p{
    margin-bottom:15px;
    line-height:1.7;
}

/* SEARCH */

.search-bar{
    margin:30px 0;
    text-align:center;
}

.search-bar input{
    width:300px;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

.search-bar button{
    padding:10px 20px;
    background:#007bff;
    border:none;
    color:white;
    border-radius:5px;
    cursor:pointer;
}

.search-bar button:hover{
    background:#0056b3;
}

/* BERITA */

.news-container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(280px,1fr));
    gap:25px;
}

.news-card{
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
}

.news-card:hover{
    transform:translateY(-5px);
}

.news-card img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.news-card-content{
    padding:20px;
}

.news-card-title{
    font-size:20px;
    margin-bottom:10px;
}

.news-card-date{
    font-size:13px;
    color:gray;
    margin-bottom:10px;
}

.news-card-description{
    line-height:1.6;
    margin-bottom:15px;
}

.news-card-link{
    text-decoration:none;
    color:#007bff;
    font-weight:600;
}

/* FEATURES */

.features{
    background:#fff;
}

.feature-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:25px;
}

.feature-item{
    background:#f9f9f9;
    padding:25px;
    border-radius:10px;
    text-align:center;
    transition:0.3s;
}

.feature-item:hover{
    transform:translateY(-5px);
}

.feature-item img{
    width:80px;
    height:80px;
    object-fit:cover;
    margin-bottom:15px;
    border-radius:10px;
}

.feature-item a{
    text-decoration:none;
    color:black;
}

/* FOOTER */

footer{
    background:#007bff;
    padding:30px;
    text-align:center;
    color:white;
}

.socials{
    margin-bottom:15px;
}

.socials a{
    color:white;
    margin:0 10px;
}

.credit a{
    color:#ffd43b;
    text-decoration:none;
}

/* RESPONSIVE */

@media(max-width:768px){

    .navbar{
        flex-direction:column;
    }

    .navbar-nav{
        margin-top:10px;
    }

    .hero h1{
        font-size:30px;
    }

    .search-bar input{
        width:100%;
        margin-bottom:10px;
    }

}

</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">

    <a href="#" class="navbar-logo">
        Kelurahan<span>Panggi</span>
    </a>

    <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang</a>
        <a href="#berita">Berita</a>
        <a href="logout.php">Logout</a>
    </div>

</nav>

<!-- HERO -->
<section class="hero" id="home">

    <main class="content">

        <h1>
            Dashboard Admin Kelurahan
            <span>Panggi</span>
        </h1>

        <h3>
            Kelola berita, informasi, dan layanan website kelurahan
        </h3>

        <a href="form_berita.php" class="cta">
            Tambah Berita
        </a>

    </main>

</section>

<!-- ABOUT -->
<section id="about">

    <h2>
        <span>Tentang</span> Kelurahan
    </h2>

    <div class="row">

        <div class="about-img">
            <img src="../img/struk.jpg">
        </div>

        <div class="content">

            <h3>Visi</h3>

            <p>
                Mewujudkan Kelurahan Panggi yang maju, mandiri,
                dan berbasis pelayanan digital.
            </p>

            <h3>Misi</h3>

            <p>• Meningkatkan pelayanan publik berbasis teknologi.</p>
            <p>• Mendukung transparansi informasi masyarakat.</p>
            <p>• Mengembangkan sistem informasi kelurahan yang modern.</p>

        </div>

    </div>

</section>

<!-- BERITA -->
<section id="berita">

    <h2>
        <span>Berita</span> Kelurahan
    </h2>

    <p align="center">
        Kelola berita dan informasi terbaru Kelurahan Panggi
    </p>

    <!-- SEARCH -->
    <div class="search-bar">

        <form method="GET">

            <input type="text"
                   name="search"
                   placeholder="Cari berita..."
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

            <button type="submit">
                Cari
            </button>

        </form>

    </div>

    <!-- DATA BERITA -->
    <div class="news-container">

        <?php while($row = mysqli_fetch_assoc($result)) : ?>

        <div class="news-card">

            <img src="../img/menu/<?php echo htmlspecialchars($row['image']); ?>">

            <div class="news-card-content">

                <h3 class="news-card-title">
                    <?php echo htmlspecialchars($row['name']); ?>
                </h3>

                <p class="news-card-date">
                    <?php echo date('d-m-Y', strtotime($row['tanggal'])); ?>
                </p>

                <p class="news-card-description">

                    <?php
                    echo mb_strimwidth(
                        htmlspecialchars($row['description']),
                        0,
                        120,
                        "..."
                    );
                    ?>

                </p>

                <a href="form_berita.php?id=<?php echo $row['id']; ?>"
                   class="news-card-link">

                   Edit Berita

                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</section>

<!-- FEATURES -->
<section class="features">

    <h2>
        <span>Menu</span> Admin
    </h2>

    <div class="feature-grid">

        <div class="feature-item">

            <a href="admin_info_penduduk.php">

                <img src="../img/diagram.jpeg">

                <p>Data Penduduk</p>

            </a>

        </div>

        <div class="feature-item">

            <a href="pengaduan.php">

                <img src="../img/kerja.jpg">

                <p>Pengaduan</p>

            </a>

        </div>

        <div class="feature-item">

            <a href="penghargaan-admin.php">

                <img src="../img/penghargaan.jpg">

                <p>Penghargaan</p>

            </a>

        </div>

        <div class="feature-item">

            <a href="logout.php">

                <img src="../img/map.jpeg">

                <p>Logout</p>

            </a>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer>

    <div class="socials">

        <a href="#">
            <i data-feather="instagram"></i>
        </a>

        <a href="#">
            <i data-feather="facebook"></i>
        </a>

        <a href="#">
            <i data-feather="phone"></i>
        </a>

    </div>

    <div class="credit">

        <p>
            Created By
            <a href="#">Rizki Fikriansyah</a>
            | © 2025
        </p>

    </div>

</footer>

<script>
feather.replace();
</script>

</body>
</html>