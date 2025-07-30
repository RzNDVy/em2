<form action="upload_file.php" method="post" enctype="multipart/form-data" class="bg-white shadow p-4 rounded">
    <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori) ?>">

    <div class="mb-4">
        <label for="file" class="block font-medium text-gray-700 mb-1">📤 Upload File (PDF, DOCX, XLSX)</label>
        <input type="file" name="file" id="file" required accept=".pdf,.doc,.docx,.xls,.xlsx"
               class="block w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Upload File
    </button>
</form>
