<?php
require 'koneksi.php';

if (isset($_POST['old_token']) && isset($_POST['new_token'])) {
    $old_token = $_POST['old_token'];
    $new_token = $_POST['new_token'];

    $stmt = $conn->prepare("SELECT * FROM token WHERE token = ?");
    $stmt->bind_param("s", $old_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        $stmt_update = $conn->prepare("UPDATE token SET token = ? WHERE user_id = ?");
        $stmt_update->bind_param("si", $new_token, $user_id);
        $stmt_update->execute();

        echo "Token berhasil diganti!";

        $stmt_update->close();
    } else {
        echo "Token lama tidak benar. Gagal mengganti token.";
    }

    $stmt->close();
} else {
    echo "Token lama dan token baru harus diisi.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Token</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
    <div class="form-container">
        <form action="reset_token.php" method="post">
            <div class="form-group">
                <label for="old_token">Token Lama:</label>
                <input type="password" id="old_token" name="old_token" required>
            </div>
            <div class="form-group">
                <label for="new_token">Token Baru:</label>
                <input type="password" id="new_token" name="new_token" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Ganti Token">
            </div>
        </form>
    </div>
</body>

</html>