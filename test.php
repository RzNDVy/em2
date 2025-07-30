<?php
require_once __DIR__ . '/includes/spreadsheet.php';

$spreadsheetId = '1C9wpRQC_qoYiMFQ7Rwc73v1Ve2gV3F4TvOQK4ij9bdY';
$range = 'Surat Keluar!A3:F120';

$data = readSpreadsheetData($spreadsheetId, $range);

echo "<h2>✅ Output dari Google Sheets:</h2><pre>";
print_r($data);
echo "</pre>";
