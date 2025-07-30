<?php
session_start();
require_once '../includes/drive_oauth_client.php';

if (!isset($_GET['code'])) {
    echo '❌ Error: Authorization code not found.';
    exit;
}

$client = getClient();
$client->authenticate($_GET['code']);
$_SESSION['drive_token'] = $client->getAccessToken();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Berhasil Login ke Google Drive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes tada {
      0% {transform: scale(1);}
      10%, 20% {transform: scale(0.9) rotate(-3deg);}
      30%, 50%, 70%, 90% {transform: scale(1.1) rotate(3deg);}
      40%, 60%, 80% {transform: scale(1.1) rotate(-3deg);}
      100% {transform: scale(1) rotate(0);}
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center px-4">
  <div class="bg-white p-10 rounded-xl shadow-lg max-w-md text-center animate-bounce-in">
    <h1 class="text-2xl font-bold text-green-600 animate-pulse">✅ Login Google Drive Berhasil!</h1>
    <p class="mt-4 text-gray-600">Akun Google Drive kamu udah terhubung sama sistem. Sekarang kamu bisa upload file langsung ke Drive. 🔥</p>
    
    <div class="mt-6">
      <a href="upload_file.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition duration-300 inline-block animate-[tada_1s_ease-in-out]">🚀 Lanjut Upload File</a>
    </div>
  </div>
</body>
</html>
