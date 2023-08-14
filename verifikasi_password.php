<?php
session_start();
require 'koneksi.php';


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM kegiatan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($password === $storedPassword) {
            $_SESSION['authenticated'] = true;
            $currentDomain = $_SERVER['HTTP_HOST'];
            $newBaseDirectory = "https://" . $currentDomain;
            $baseDirectory = $newBaseDirectory;
            $targetUrl = "$baseDirectory/edit/$id";
            header("Location: $targetUrl");
            exit();
        } else {
            echo '<script>alert("Password yang Anda masukkan salah.");</script>';
        }
    } else {
        echo '<script>alert("Data kegiatan tidak ditemukan.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Password</title>
    <link rel="stylesheet" href="/adminstyle.css">
</head>

<body>
    <div class="form-container">
        <h2>Verifikasi Password</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="katasandi" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Verifikasi">
            </div>
        </form>
    </div>
</body>

</html>