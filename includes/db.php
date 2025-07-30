<?php
$host = 'localhost';
$db   = 'nyekre_em';
$user = 'root'; // default user XAMPP
$pass = '';     // kosongin kalau belum diubah

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set mode error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Gagal konek ke database: " . $e->getMessage());
}