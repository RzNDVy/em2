<?php
session_start();

// Ambil data dari session
$data = $_SESSION['last_data'] ?? null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>📄 Preview Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl border-t-4 border-blue-600">
        <h2 class="text-2xl font-bold text-blue-700 mb-6">📄 Preview Surat yang Baru Dibuat</h2>

        <?php if (!$data): ?>
            <div class="text-red-600 font-semibold">⚠️ Tidak ada data yang bisa ditampilkan. Silakan request surat terlebih dahulu.</div>
        <?php else: ?>
            <div class="grid grid-cols-1 gap-4 text-sm text-gray-700">
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Nomor Urut:</span>
                    <span><?= htmlspecialchars($data['no_urut'] ?? '-') ?></span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Nomor Surat:</span>
                    <span class="text-blue-800"><?= htmlspecialchars($data['nomor_surat'] ?? '-') ?></span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Tanggal Surat:</span>
                    <span><?= htmlspecialchars($data['tanggal_surat'] ?? '-') ?></span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Tujuan Surat:</span>
                    <span><?= htmlspecialchars($data['tujuan_surat'] ?? '-') ?></span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Perihal:</span>
                    <span><?= htmlspecialchars($data['perihal'] ?? '-') ?></span>
                </div>
                <div class="flex justify-between border-b pb-2">
                    <span class="font-semibold">Penanggung Jawab:</span>
                    <span><?= htmlspecialchars($data['pj'] ?? '-') ?></span>
                </div>
            </div>

            <div class="mt-6 text-right">
                <a href="form_tamu.php" class="text-blue-600 hover:underline mr-4">🔙 Kembali</a>
                <a href="request_surat.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Lagi</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
