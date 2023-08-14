<?php
session_start();

require 'koneksi.php';

if (isset($_POST['submit'])) {
    $token = $_POST['token'];
    $stmt = $conn->prepare("SELECT * FROM token WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['authenticated'] = true;
        $currentDomain = $_SERVER['HTTP_HOST'];
        $newBaseDirectory = "https://" . $currentDomain;
        $baseDirectory = $newBaseDirectory;
        $targetUrl = "$baseDirectory/input";
        header("Location: input");
    } else {
        echo "Password (Token) salah. Verifikasi gagal!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Token</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <div class="form-container">
        <h2>Verifikasi Token</h2>
        <form action="verifikasi_token.php" method="post">
            <div class="form-group">
                <label for="token">Token :</label>
                <input type="password" id="token" name="token" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Verifikasi">
            </div>
        </form>
    </div>
</body>

</html>