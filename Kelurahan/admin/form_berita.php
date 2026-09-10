<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$editMode = $id > 0;
$success = '';
$error = '';

// Ambil data berita jika sedang edit
if ($editMode) {
    $stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $berita = $result->fetch_assoc();
    $stmt->close();
}

// Simpan form (Add atau Edit)
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $tanggal = $_POST['tanggal'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image']['name'];

    // Gambar baru di-upload
    if ($image) {
        $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
        if (in_array($_FILES['image']['type'], $allowed)) {
            $target = "../img/menu/" . basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                // Update atau Insert
                if ($editMode) {
                    $stmt = $conn->prepare("UPDATE berita SET name=?, tanggal=?, description=?, image=? WHERE id=?");
                    $stmt->bind_param("ssssi", $name, $tanggal, $description, $image, $id);
                } else {
                    $stmt = $conn->prepare("INSERT INTO berita (name, tanggal, description, image) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $name, $tanggal, $description, $image);
                }
                if ($stmt->execute()) {
                    $success = $editMode ? "Berita berhasil diubah." : "Berita berhasil ditambahkan.";
                } else {
                    $error = "Gagal menyimpan ke database.";
                }
                $stmt->close();
            } else {
                $error = "Upload gambar gagal.";
            }
        } else {
            $error = "Format gambar tidak valid.";
        }
    } else {
        // Tidak upload gambar baru (hanya update teks)
        if ($editMode) {
            $stmt = $conn->prepare("UPDATE berita SET name=?, tanggal=?, description=? WHERE id=?");
            $stmt->bind_param("sssi", $name, $tanggal, $description, $id);
            if ($stmt->execute()) {
                $success = "Berita berhasil diubah.";
            } else {
                $error = "Gagal update berita.";
            }
            $stmt->close();
        } else {
            $error = "Gambar wajib diunggah untuk berita baru.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $editMode ? "Edit Berita" : "Tambah Berita"; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .alert {
            padding: 10px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 5px;
        }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

<h2 style="text-align:center;"><?php echo $editMode ? "Edit Berita" : "Tambah Berita"; ?></h2>

<?php if ($success): ?>
    <div class="alert success"><?php echo $success; ?></div>
<?php elseif ($error): ?>
    <div class="alert error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <label>Judul Berita</label>
    <input type="text" name="name" required value="<?php echo $editMode ? htmlspecialchars($berita['name']) : ''; ?>">

    <label>Tanggal</label>
    <input type="date" name="tanggal" required value="<?php echo $editMode ? htmlspecialchars($berita['tanggal']) : ''; ?>">

    <label>Deskripsi</label>
    <textarea name="description" rows="5" required><?php echo $editMode ? htmlspecialchars($berita['description']) : ''; ?></textarea>

    <label>Gambar <?php if ($editMode): ?> (Kosongkan jika tidak ingin ganti)<?php endif; ?></label>
    <input type="file" name="image" <?php echo $editMode ? '' : 'required'; ?>>

    <button type="submit" name="submit"><?php echo $editMode ? "Simpan Perubahan" : "Tambah Berita"; ?></button>
</form>

</body>
</html>
