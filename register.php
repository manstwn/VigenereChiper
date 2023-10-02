<?php
$mysqli = new mysqli("localhost", "root", "", "chiper");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function vigenereEncrypt($word, $key) {
    $result = '';
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($word); $i++) {
        $char = $word[$i];
        $keyChar = $key[$i % $keyLength];

        // Encrypt lowercase letters
        $encryptedChar = chr(((ord($char) - ord('a') + ord($keyChar) - ord('a')) % 26) + ord('a'));
        $result .= $encryptedChar;
    }
    return base64_encode($result);
}function vigenereDecrypt($encryptedPassword, $key) {
    $result = '';
    $keyLength = strlen($key);
    $decoded = base64_decode($encryptedPassword);
    for ($i = 0; $i < strlen($decoded); $i++) {
        $char = $decoded[$i];
        $keyChar = $key[$i % $keyLength];
        $decryptedChar = chr(ord($char) - ord($keyChar));
        $result .= $decryptedChar;
    }
    return $result;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $key = "iman";
    $encryptedPassword = vigenereEncrypt($password, $key);
    $query = "INSERT INTO akun (id, password) VALUES ('$username', '$encryptedPassword')";
    if ($mysqli->query($query) === TRUE) {
        echo "<script>alert('Registrasi berhasil. Silakan login'); window.location.href='login-site.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal. Silakan Coba lagi.'); window.location.href='register-site.php';</script>";
    }
}

$mysqli->close();
