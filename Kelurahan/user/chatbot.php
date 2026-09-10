<?php
header('Content-Type: application/json');

include '../admin/db.php';

// Ambil data dari chatbot
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$message = isset($_POST['message']) ? strtolower($_POST['message']) : '';

// Validasi pesan kosong
if ($message == '') {

    echo json_encode([
        "reply" => "Pesan tidak boleh kosong."
    ]);

    exit;
}

// ====================================
// RULE BASED CHATBOT
// ====================================

$reply = "";

// Pertanyaan KTP
if (
    strpos($message, 'ktp') !== false
) {

    $reply = "Syarat pembuatan KTP:
1. Fotokopi KK
2. Surat pengantar RT/RW
3. Usia minimal 17 tahun.";

}

// Pertanyaan KK
elseif (
    strpos($message, 'kk') !== false
) {

    $reply = "Syarat pembuatan KK:
1. Fotokopi buku nikah
2. Fotokopi KTP
3. Surat pindah (jika ada).";

}
// keterangan tidak mampu
elseif (
    strpos($message, 'keterangan tidak mampu') !== false
) {

    $reply = "Syarat pembuatan keterangan tidak mampu:
1. Fotokopi KK
2. Fotokopi KTP
3. Foto Rumah.";

}
// Domisili
elseif (
    strpos($message, 'domisili') !== false
) {

    $reply = "Syarat surat domisili:
1. Fotokopi KTP
2. Fotokopi KK
3. Surat pengantar RT/RW.";

}

// Jam pelayanan
elseif (
    strpos($message, 'jam') !== false ||
    strpos($message, 'pelayanan') !== false
) {

    $reply = "Jam pelayanan kelurahan:
Senin - Jumat
08:00 - 14:00 WITA.";

}

// Pengaduan jalan
elseif (
    strpos($message, 'jalan rusak') !== false
) {

    $reply = "Pengaduan jalan rusak telah diterima dan akan diteruskan ke pihak terkait.";

}

// Pengaduan Lomba
elseif (
    strpos($message, 'lomba') !== false
) {

    $reply = "Pengaduan lomba telah diterima dan akan diteruskan ke pihak terkait.";

}

// Pengaduan Event
elseif (
    strpos($message, 'event') !== false
) {

    $reply = "Pengaduan event telah diterima dan akan diteruskan ke pihak terkait.";

}

// Default
else {

    $reply = "Maaf, pertanyaan belum tersedia di sistem chatbot.";

}

// ====================================
// SIMPAN KE DATABASE
// ====================================

$status = "belum dibaca";
$tanggal = date('Y-m-d');

$query = "INSERT INTO pengaduan 
(nama, pesan, status, tanggal) 
VALUES 
('$nama', '$message', '$status', '$tanggal')";

mysqli_query($conn, $query);

// ====================================
// RESPONSE JSON
// ====================================

echo json_encode([
    "reply" => $reply
]);

?>