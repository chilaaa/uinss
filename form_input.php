<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    $currentDomain = $_SERVER['HTTP_HOST'];
    $newBaseDirectory = "https://" . $currentDomain;
    $baseDirectory = $newBaseDirectory;
    $targetUrl = "$baseDirectory/token";
    header("Location: $targetUrl");
    exit();
}


if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kehadiran = $_POST['kehadiran'];
    $jam1 = $_POST['jam1'];
    $jam2 = $_POST['jam2'];
    $jam3 = $_POST['jam3'];
    $jam4 = $_POST['jam4'];
    $jam5 = $_POST['jam5'];
    $menit1 = $_POST['menit1'];
    $menit2 = $_POST['menit2'];
    $menit3 = $_POST['menit3'];
    $menit4 = $_POST['menit4'];
    $menit5 = $_POST['menit5'];
    $kegiatan1 = $_POST['kegiatan1'];
    $kegiatan2 = $_POST['kegiatan2'];
    $kegiatan3 = $_POST['kegiatan3'];
    $kegiatan4 = $_POST['kegiatan4'];
    $kegiatan5 = $_POST['kegiatan5'];
    $password = $_POST['password'];
    
    $dir_upload = "assets/Foto/";
	$nama_gambar = $_FILES['file']['name'];

	if (is_uploaded_file($_FILES['file']['tmp_name'])) {}
	move_uploaded_file ($_FILES['file']['tmp_name'],$dir_upload.$nama_gambar);

    // $nama_gambar = $_FILES['file']['name'];
    // $tmp_gambar = $_FILES['file']['tmp_name'];


    // move_uploaded_file($tmp_gambar, 'assets/Foto/' . $nama_gambar);

    $query = "INSERT INTO kegiatan (nama, password, jabatan, gambar, kehadiran, jam1, menit1, kegiatan1, jam2, menit2, kegiatan2, jam3, menit3, kegiatan3, jam4, menit4, kegiatan4, jam5, menit5, kegiatan5) VALUES ('$nama', '$password', '$jabatan', '$nama_gambar', '$kehadiran', '$jam1', '$menit1', '$kegiatan1', '$jam2', '$menit2', '$kegiatan2', '$jam3', '$menit3', '$kegiatan3', '$jam4', '$menit4', '$kegiatan4', '$jam5', '$menit5', '$kegiatan5')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        // echo '<script>alert("aktivitas behasil ditambahkan");</script>';
        $currentDomain = $_SERVER['HTTP_HOST'];
        $newBaseDirectory = "https://" . $currentDomain;
        $baseDirectory = $newBaseDirectory;
        $targetUrl = "$baseDirectory";
        header("Location: $baseDirectory");
    } else {
        echo '<script>alert("Terjadi Kesalahan");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kegiatan</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <?php echo $_SERVER['HTTP_HOST']; ?>
    <div class="form-container">
        <h2>Form Input Kegiatan</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="kehadiran">Status:</label>
                <select id="kehadiran" name="kehadiran" required>
                    <option value="HADIR">HADIR</option>
                    <option value="TIDAK HADIR">TIDAK HADIR</option>
                    <option value="CUTI">CUTI</option>
                    <option value="DINAS LUAR">DINAS LUAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam1">Jam 1:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam1" name="jam1">
                    <span> : </span>
                    <input type="text" id="menit1" name="menit1">
                </div>
                <label for="kegiatan1">Kegiatan 1:</label>
                <input type="text" id="kegiatan1" name="kegiatan1">
            </div>
            <div class="form-group">
                <label for="jam2">Jam 2:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam2" name="jam2">
                    <span> : </span>
                    <input type="text" id="menit2" name="menit2">
                </div>
                <label for="kegiatan2">Kegiatan 2:</label>
                <input type="text" id="kegiatan2" name="kegiatan2">
            </div>
            <div class="form-group">
                <label for="jam3">Jam 3:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam3" name="jam3">
                    <span> : </span>
                    <input type="text" id="menit3" name="menit3">
                </div>
                <label for="kegiatan3">Kegiatan 3:</label>
                <input type="text" id="kegiatan3" name="kegiatan3">
            </div>
            <div class="form-group">
                <label for="jam4">Jam 4:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam4" name="jam4">
                    <span> : </span>
                    <input type="text" id="menit4" name="menit4">
                </div>
                <label for="kegiatan4">Kegiatan 4:</label>
                <input type="text" id="kegiatan4" name="kegiatan4">
            </div>
            <div class="form-group">
                <label for="jam5">Jam 5:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam5" name="jam5">
                    <span> : </span>
                    <input type="text" id="menit5" name="menit5">
                </div>
                <label for="kegiatan5">Kegiatan 5:</label>
                <input type="text" id="kegiatan5" name="kegiatan5">
            </div>
            <div class="form-group">
                <label for="password">Set Password:</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="file">Upload Foto:</label>
                <input type="file" id="file" name="file" accept="image/*" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>