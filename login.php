<?php

$mysqli = new mysqli("localhost", "root", "", "chiper");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function vigenereDecrypt($encryptedPassword, $key)
{
    $result = '';
    $keyLength = strlen($key);
    $decoded = base64_decode($encryptedPassword);
    for ($i = 0; $i < strlen($decoded); $i++) {
        $char = $decoded[$i];
        $keyChar = $key[$i % $keyLength];

        // Decrypt lowercase letters
        $decryptedChar = chr(((ord($char) - ord('a') - (ord($keyChar) - ord('a')) + 26) % 26) + ord('a'));
        $result .= $decryptedChar;
    }
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT password FROM akun WHERE id = '$username'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        $key = "iman";
        $decryptedPassword = vigenereDecrypt($storedPassword, $key);

        if ($password === $decryptedPassword) {
            echo "<script>alert('Login berhasil!'); window.location.href='login-site.php';</script>";
        } else {
            echo "<script>alert('Login gagal. Password atau Username salah!'); window.location.href='login-site.php';</script>";
        }
    } else {
        echo "<script>alert('Login gagal. Password atau Username salah!'); window.location.href='login-site.php';</script>";
    }
}

$mysqli->close();
