<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NYEKRE - Sistem Surat</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Config (optional, custom warna) -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1E3A8A',     // biru gelap (dongker)
            secondary: '#93C5FD',   // biru terang
            putihBersih: '#f9f9f9'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-putihBersih to-blue-100 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white shadow-xl rounded-xl p-10 max-w-lg w-full text-center border border-blue-200">
    <h1 class="text-3xl font-bold text-primary mb-4">Selamat Datang di <span class="text-blue-500">Nyekre</span></h1>
    <p class="text-gray-600 mb-8">Sistem Sekretaris Umum<br>Entitas Mahasiswa Ilmu Komputer </p>

    <!-- Tombol Pilihan -->
    <div class="flex flex-col gap-4">
      <a href="form_tamu.php" class="bg-primary hover:bg-blue-900 text-white font-medium py-3 px-6 rounded-md transition duration-200">
        Masuk sebagai Tamu
      </a>
  
    </div>

    <!-- Footer kecil -->
    <p class="text-xs text-gray-400 mt-8">© 2025 E-MAILKOMP - Sistem Sekre</p>
  </div>

</body>
</html>
