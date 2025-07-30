<?php
require_once '../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-lg font-semibold">📊 Dashboard Admin</h1>
        <a href="logout.php" class="hover:underline">🔓 Logout</a>
    </nav>

    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?>!</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="kelola_file.php" class="bg-white shadow rounded p-4 hover:bg-blue-50 border border-blue-200">
                📁 Kelola Dokumen
            </a>
        </div>
    </div>
</body>
</html>
