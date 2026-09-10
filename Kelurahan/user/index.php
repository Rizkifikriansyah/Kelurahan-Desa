<?php
include '../admin/db.php';

// Query berita
$query = "SELECT * FROM berita ORDER BY id DESC";

// Pencarian berita
if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM berita 
              WHERE judul LIKE '%$search%' 
              ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelurahan Oimbo</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Feather -->
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
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:999;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:1rem 7%;
    background:#007bff;
}

.navbar-logo{
    color:white;
    text-decoration:none;
    font-size:1.8rem;
    font-weight:700;
}

.navbar-logo span{
    color:yellow;
}

.navbar-nav a{
    color:white;
    text-decoration:none;
    margin-left:1.5rem;
    font-size:1rem;
}

.navbar-nav a:hover{
    color:yellow;
}

/* HERO */

.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
    background-image:url("../img/kel.jpg");
    background-size:cover;
    background-position:center;
    position:relative;
}

.hero::after{
    content:'';
    position:absolute;
    bottom:0;
    width:100%;
    height:30%;
    background:linear-gradient(0deg,#f5f5f5 8%, rgba(255,255,255,0) 50%);
}

.hero .content{
    padding:1.4rem 7%;
    max-width:60rem;
}

.hero .content h1{
    font-size:3rem;
    color:white;
}

.hero .content h1 span{
    color:yellow;
}

.hero .content h3{
    color:white;
    margin-top:1rem;
    font-weight:300;
    line-height:1.6;
}

.cta{
    display:inline-block;
    margin-top:1.5rem;
    padding:0.8rem 2rem;
    background:#007bff;
    color:white;
    border-radius:5px;
    text-decoration:none;
}

/* SECTION */

section{
    padding:6rem 7% 2rem;
}

section h2{
    text-align:center;
    margin-bottom:2rem;
    font-size:2rem;
}

section h2 span{
    color:#007bff;
}

/* ABOUT */

.about .row{
    display:flex;
    flex-wrap:wrap;
    gap:2rem;
    align-items:center;
}

.about-img img{
    width:400px;
    border-radius:10px;
}

.about .content{
    flex:1;
}

.about .content h3{
    margin-bottom:1rem;
}

/* BERITA */

.news-container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:1.5rem;
}

.news-card{
    width:300px;
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    transition:0.3s;
}

.news-card:hover{
    transform:translateY(-5px);
}

.news-card-img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.news-card-content{
    padding:1rem;
}

.news-card-title{
    margin-bottom:0.5rem;
}

.news-card-date{
    color:gray;
    margin-bottom:1rem;
    font-size:0.9rem;
}

.news-card-link{
    color:#007bff;
    text-decoration:none;
    font-weight:bold;
}

/* FEATURES */

.features{
    background:white;
}

.feature-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:1.5rem;
}

.feature-item{
    background:#f8f8f8;
    text-align:center;
    padding:1rem;
    border-radius:10px;
    transition:0.3s;
}

.feature-item:hover{
    transform:translateY(-5px);
}

.feature-item img{
    width:100px;
    height:100px;
    object-fit:cover;
    margin-bottom:1rem;
}

.feature-item a{
    text-decoration:none;
    color:black;
}

/* FOOTER */

footer{
    background:#007bff;
    color:white;
    text-align:center;
    padding:2rem;
    margin-top:3rem;
}

.socials{
    margin-bottom:1rem;
}

.socials a{
    color:white;
    margin:0 0.5rem;
}

/* CHATBOT */

#chatbot-container{
    position:fixed;
    bottom:20px;
    right:20px;
    width:320px;
    z-index:9999;
}

#chat-header{
    background:#007bff;
    color:white;
    padding:12px;
    text-align:center;
    border-radius:10px 10px 0 0;
    cursor:pointer;
    font-weight:bold;
}

#chat-body{
    display:none;
    background:white;
    border-radius:0 0 10px 10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

#chat-box{
    height:250px;
    overflow-y:auto;
    padding:10px;
    background:#f5f5f5;
}

.chat-form{
    padding:10px;
}

.chat-form input{
    width:100%;
    padding:10px;
    margin-bottom:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

.chat-form button{
    width:100%;
    padding:10px;
    background:#007bff;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

.chat-form button:hover{
    background:#0056b3;
}

.user-chat{
    background:#007bff;
    color:white;
    padding:8px;
    border-radius:10px;
    margin-bottom:10px;
}

.bot-chat{
    background:#e9e9e9;
    padding:8px;
    border-radius:10px;
    margin-bottom:10px;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">

    <a href="#" class="navbar-logo">
        Kelurahan<span>Oimbo</span>
    </a>

    <div class="navbar-nav">
        <a href="#">Home</a>
        <a href="#about">Tentang</a>
        <a href="#berita">Berita</a>
        <a href="../admin/login-admin.php">Admin</a>
    </div>

</nav>

<!-- HERO -->
<section class="hero">

    <main class="content">

        <h1>
            Selamat Datang di Website Kelurahan 
            <span>Oimbo</span>
        </h1>

        <h3>
            Sistem Informasi Kelurahan berbasis Web 
            dengan Integrasi Chatbot Pengaduan Masyarakat
        </h3>

        <a href="#berita" class="cta">
            Lihat Berita
        </a>

    </main>

</section>

<!-- ABOUT -->
<section id="about" class="about">

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
                Mewujudkan Kelurahan Oimbo yang maju, 
                mandiri, dan berbasis teknologi informasi.
            </p>

            <h3>Misi</h3>

            <p>
                Meningkatkan pelayanan publik, 
                transparansi informasi, dan mempermudah masyarakat 
                dalam menyampaikan pengaduan secara online.
            </p>

        </div>

    </div>

</section>

<!-- BERITA -->
<section id="berita">

    <h2>
        <span>Berita</span> Terkini
    </h2>

    <div class="news-container">

        <?php while($row = mysqli_fetch_assoc($result)) : ?>

        <div class="news-card">

            <img src="../img/menu/<?php echo $row['gambar']; ?>" class="news-card-img">

            <div class="news-card-content">

                <h3 class="news-card-title">
                    <?php echo $row['judul']; ?>
                </h3>

                <p class="news-card-date">
                    <?php echo date('d-m-Y', strtotime($row['tanggal'])); ?>
                </p>

                <a href="lihat_berita.php?id=<?php echo $row['id']; ?>" class="news-card-link">
                    Lihat Berita
                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</section>

<!-- INFORMASI -->
<section class="features">

    <h2>
        <span>Informasi</span> Kelurahan
    </h2>

    <div class="feature-grid">

        <div class="feature-item">
            <a href="info_penduduk.php">
                <img src="../img/diagram.jpeg">
                <p>Informasi Penduduk</p>
            </a>
        </div>

        <div class="feature-item">
            <a href="struktur.php">
                <img src="../img/kerja.jpg">
                <p>Struktur Organisasi</p>
            </a>
        </div>

        <div class="feature-item">
            <a href="peta.php">
                <img src="../img/map.jpeg">
                <p>Peta Wilayah</p>
            </a>
        </div>

        <div class="feature-item">
            <a href="penghargaan.php">
                <img src="../img/penghargaan.jpg">
                <p>Penghargaan</p>
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
            Created By Rizki Fikriansyah | © 2026
        </p>
    </div>

</footer>

<!-- CHATBOT -->
<div id="chatbot-container">

    <div id="chat-header" onclick="toggleChat()">
        💬 Chat Pengaduan
    </div>

    <div id="chat-body">

        <div id="chat-box"></div>

        <div class="chat-form">

            <input type="text" id="nama" placeholder="Nama Anda">

            <input type="text" id="user-input" placeholder="Tulis pesan...">

            <button type="button" onclick="sendMessage()">
                Kirim
            </button>

        </div>

    </div>

</div>

<!-- JS -->
<script>

feather.replace();

function toggleChat(){

    let chatBody = document.getElementById("chat-body");

    if(chatBody.style.display === "block"){
        chatBody.style.display = "none";
    }else{
        chatBody.style.display = "block";
    }
}

async function sendMessage(){

    let nama = document.getElementById("nama").value;

    let input = document.getElementById("user-input");

    let chatBox = document.getElementById("chat-box");

    let message = input.value.trim();

    if(message === ""){
        return;
    }

    // tampil pesan user
    chatBox.innerHTML += `
        <div class="user-chat">
            <b>Anda:</b> ${message}
        </div>
    `;

    input.value = "";

    let formData = new FormData();

    formData.append("nama", nama);
    formData.append("message", message);

    try{

        let response = await fetch("chatbot.php", {
            method: "POST",
            body: formData
        });

        let data = await response.json();

        // tampil jawaban bot
        chatBox.innerHTML += `
            <div class="bot-chat">
                <b>Bot:</b> ${data.reply}
            </div>
        `;

        chatBox.scrollTop = chatBox.scrollHeight;

    }catch(error){

        chatBox.innerHTML += `
            <div class="bot-chat">
                <b>Bot:</b> Sistem error
            </div>
        `;
    }
}

</script>

</body>
</html>