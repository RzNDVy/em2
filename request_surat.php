<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Request Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-blue-700 mb-6">📄 Request Surat Baru</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
                ⚠️ <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="proses_request.php" method="post" class="space-y-4">

            <!-- Tanggal Surat -->
            <div>
                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Tujuan Surat -->
            <div>
                <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                <input type="text" name="tujuan_surat" id="tujuan_surat" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
            </div>

            <!-- Perihal -->
            <div>
                <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal / Isi Surat</label>
                <textarea name="perihal" id="perihal" rows="3" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm"></textarea>
            </div>

            <!-- Penanggung Jawab -->
            <div>
                <label for="pj" class="block text-sm font-medium text-gray-700">Penanggung Jawab (PJ)</label>
                <input type="text" name="pj" id="pj" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
            </div>

            <!-- Bidang -->
            <div>
                <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang</label>
                <select name="bidang" id="bidang" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
                    <option value="K">Ketua Umum</option>
                    <option value="WK">Wakil Ketua</option>
                    <option value="SB">Sekretaris Bendahara</option>
                    <option value="PO">Pengembangan Organisasi</option>
                    <option value="JN">Jaringan</option>
                    <option value="LB">Penelitian dan Pengembangan</option>
                    <option value="MW">Kemahasiswaan</option>
                    <option value="U">Uki</option>
                </select>
            </div>

            <!-- Jenis Surat -->
            <div>
                <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
                    <option value="01">Internal</option>
                    <option value="02">Eksternal</option>
                </select>
            </div>

            <!-- Bulan -->
            <div>
                <label for="bulan_romawi" class="block text-sm font-medium text-gray-700">Bulan (Romawi)</label>
                <select name="bulan_romawi" id="bulan_romawi" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <!-- Tahun -->
            <div>
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <select name="tahun" id="tahun" required
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
                    <?php
                    for ($tahun = 2024; $tahun <= 2050; $tahun++) {
                        echo "<option value=\"$tahun\">$tahun</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                    Submit Request
                </button>
            </div>
        </form>
        <div class="mt-6">
            <a href="form_tamu.php"
               class="block w-full text-center bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded transition">
                🔙 Kembali
            </a>
        </div>
    </div>
</body>
</html>
