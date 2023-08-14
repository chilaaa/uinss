<?php
require 'koneksi.php';
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    $id = $_GET['id'];
    $currentDomain = $_SERVER['HTTP_HOST'];
    $newBaseDirectory = "https://" . $currentDomain;
    $baseDirectory = $newBaseDirectory;
    $targetUrl = "$baseDirectory/password/$id";
    header("Location: $targetUrl");
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM kegiatan WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // Cek apakah data kegiatan ditemukan
    if (mysqli_num_rows($result) > 0) {
        $kegiatan = mysqli_fetch_assoc($result);
        // Ambil nilai dari setiap kolom
        $nama = $kegiatan['nama'];
        $jabatan = $kegiatan['jabatan'];
        $kehadiran = $kegiatan['kehadiran'];
        $jam1 = $kegiatan['jam1'];
        $jam2 = $kegiatan['jam2'];
        $jam3 = $kegiatan['jam3'];
        $jam4 = $kegiatan['jam4'];
        $jam5 = $kegiatan['jam5'];
        $menit1 = $kegiatan['menit1'];
        $menit2 = $kegiatan['menit2'];
        $menit3 = $kegiatan['menit3'];
        $menit4 = $kegiatan['menit4'];
        $menit5 = $kegiatan['menit5'];
        $kegiatan1 = $kegiatan['kegiatan1'];
        $kegiatan2 = $kegiatan['kegiatan2'];
        $kegiatan3 = $kegiatan['kegiatan3'];
        $kegiatan4 = $kegiatan['kegiatan4'];
        $kegiatan5 = $kegiatan['kegiatan5'];
        $password = $kegiatan['password'];
    } else {
        // echo '<script>alert("Data kegiatan tidak ditemukan.");</script>';
        $currentDomain = $_SERVER['HTTP_HOST'];
        $newBaseDirectory = "https://" . $currentDomain;
        $baseDirectory = $newBaseDirectory;
        $targetUrl = "$baseDirectory";
        header("Location: $targetUrl");
        exit();
    }
}

if (isset($_POST['delete'])) {

    $querydelete = "DELETE FROM kegiatan
        WHERE id = $id";

    $resultdelete = mysqli_query($conn, $querydelete);
    if ($resultdelete) {
        // echo '<script>alert("Data kegiatan berhasil dihapus.");</script>';
        // echo ['HTTP_HOST'];
        $currentDomain = $_SERVER['HTTP_HOST'];
        $newBaseDirectory = "https://" . $currentDomain;
        $baseDirectory = $newBaseDirectory;
        $targetUrl = "$baseDirectory";
        header("Location: $targetUrl");
    } else {
        echo '<script>alert("Terjadi Kesalahan saat menghapus data kegiatan.");</script>';
    }
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
    $queryupdate = "UPDATE kegiatan SET 
                    nama = '$nama', 
                    jabatan = '$jabatan', 
                    kehadiran = '$kehadiran', 
                    jam1 = '$jam1',
                    jam2 = '$jam2', 
                    jam3 = '$jam3', 
                    jam4 = '$jam4', 
                    jam5 = '$jam5', 
                    menit1 = '$menit1', 
                    menit2 = '$menit2', 
                    menit3= '$menit3', 
                    menit4 = '$menit4', 
                    menit5 = '$menit5', 
                    kegiatan1= '$kegiatan1', 
                    kegiatan2 = '$kegiatan2', 
                    kegiatan3 = '$kegiatan3', 
                    kegiatan4 = '$kegiatan4', 
                    kegiatan5 = '$kegiatan5',
                    password = '$password'
                    WHERE id = $id";
    $resultupdate = mysqli_query($conn, $queryupdate);
    if ($resultupdate) {
        echo '<script>alert("Data kegiatan berhasil diupdate.");</script>';
        $currentDomain = $_SERVER['HTTP_HOST'];
        $newBaseDirectory = "https://" . $currentDomain;
        $baseDirectory = $newBaseDirectory;
        $targetUrl = "$baseDirectory";
        header("Location: $targetUrl");
    } else {
        echo '<script>alert("Terjadi Kesalahan saat mengupdate data kegiatan.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <link rel="stylesheet" href="/adminstyle.css">
</head>

<body>
    <div class="form-container">
        <h2>Edit Kegiatan</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatan" name="jabatan" value="<?php echo $jabatan; ?>" required>
            </div>
            <div class="form-group">
                <label for="kehadiran">Status:</label>
                <select id="kehadiran" name="kehadiran" required>
                    <option value="HADIR" <?php if ($kehadiran == 'HADIR') echo 'selected'; ?>>HADIR</option>
                    <option value="TIDAK HADIR" <?php if ($kehadiran == 'TIDAK HADIR') echo 'selected'; ?>>TIDAK HADIR</option>
                    <option value="CUTI" <?php if ($kehadiran == 'CUTI') echo 'selected'; ?>>CUTI</option>
                    <option value="DINAS LUAR" <?php if ($kehadiran == 'DINAS LUAR') echo 'selected'; ?>>DINAS LUAR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam1">Jam 1:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam1" name="jam1" value="<?php echo $jam1; ?>">
                    <span> : </span>
                    <input type="text" id="menit1" name="menit1" value="<?php echo $menit1; ?>">
                </div>
                <label for="kegiatan1">Kegiatan 1:</label>
                <input type="text" id="kegiatan1" name="kegiatan1" value="<?php echo $kegiatan1; ?>">
            </div>
            <div class="form-group">
                <label for="jam2">Jam 2:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam2" name="jam2" value="<?php echo $jam2; ?>">
                    <span> : </span>
                    <input type="text" id="menit2" name="menit2" value="<?php echo $menit2; ?>">
                </div>
                <label for="kegiatan2">Kegiatan 2:</label>
                <input type="text" id="kegiatan2" name="kegiatan2" value="<?php echo $kegiatan2; ?>">
            </div>
            <div class="form-group">
                <label for="jam3">Jam 3:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam3" name="jam3" value="<?php echo $jam3; ?>">
                    <span> : </span>
                    <input type="text" id="menit3" name="menit3" value="<?php echo $menit3; ?>">
                </div>
                <label for="kegiatan3">Kegiatan 3:</label>
                <input type="text" id="kegiatan3" name="kegiatan3" value="<?php echo $kegiatan3; ?>">
            </div>
            <div class="form-group">
                <label for="jam4">Jam 4:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam4" name="jam4" value="<?php echo $jam4; ?>">
                    <span> : </span>
                    <input type="text" id="menit4" name="menit4" value="<?php echo $menit4; ?>">
                </div>
                <label for="kegiatan4">Kegiatan 4:</label>
                <input type="text" id="kegiatan4" name="kegiatan4" value="<?php echo $kegiatan4; ?>">
            </div>
            <div class="form-group">
                <label for="jam5">Jam 5:</label>
                <div class="input-wrapper">
                    <input type="text" id="jam5" name="jam5" value="<?php echo $jam5; ?>">
                    <span> : </span>
                    <input type="text" id="menit5" name="menit5" value="<?php echo $menit5; ?>">
                </div>
                <label for="kegiatan5">Kegiatan 5:</label>
                <input type="text" id="kegiatan5" name="kegiatan5" value="<?php echo $kegiatan5; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="UPDATE">
            </div>
            <div class="form-group">
                <input type="submit" name="delete" value="DELETE">
            </div>
        </form>
    </div>
</body>

</html>