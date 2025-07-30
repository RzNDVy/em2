<!-- File: public/form_tamu.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tamu - E-Mailkomp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional: Tambahin custom theme Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a',     // biru tua
                        secondary: '#3b82f6',   // biru terang
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md text-center">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-primary mb-6">Masuk Sebagai Tamu</h1>
        <p class="text-gray-600 mb-8">Silakan pilih aksi yang ingin Anda lakukan:</p>

        <!-- Tombol Pilihan -->
        <div class="space-y-4">
            <a href="request_surat.php"
               class="block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded transition duration-200">
                📝 Request Surat Baru
            </a>
        </div>

        <!-- Back to Home -->
        <div class="mt-6">
            <a href="index.php" class="text-sm text-primary hover:underline">⬅️ Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
