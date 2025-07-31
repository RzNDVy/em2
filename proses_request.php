<?php
session_start();
require_once(__DIR__ . '/../includes/spreadsheet.php');
$service = getGoogleSheetService();
// Validasi input
$required_fields = ['tanggal_surat', 'tujuan_surat', 'perihal', 'pj', 'bidang', 'jenis_surat', 'bulan_romawi', 'tahun'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        header('Location: request_surat.php?error=⚠️ Semua field wajib diisi.');
        exit;
    }
}

// Ambil data dari form
$tanggal_surat = $_POST['tanggal_surat'];
$tujuan_surat = $_POST['tujuan_surat'];
$perihal = $_POST['perihal'];
$pj = $_POST['pj'];
$bidang = $_POST['bidang'];
$jenis_surat = $_POST['jenis_surat']; // 01 = IN, 02 = EKS
$bulan_romawi = $_POST['bulan_romawi'];
$tahun = $_POST['tahun'];

// ID spreadsheet dan nama sheet
define('SPREADSHEET_ID', '1C9wpRQC_qoYiMFQ7Rwc73v1Ve2gV3F4TvOQK4ij9bdY');
$spreadsheetId = SPREADSHEET_ID;
$sheetName = 'Surat Keluar';

// Ambil data dari baris ke-4 ke bawah
$response = $service->spreadsheets_values->get($spreadsheetId, "'$sheetName'!A4:F");

$values = $response->getValues();

// Filter baris valid (kolom A terisi)
$validRows = array_filter($values, function($row) {
    return isset($row[0]) && trim($row[0]) !== '';
});

// Hitung nomor urut (dari data sebelumnya)
$no_urut = count($validRows) + 1;
$no_urut_str = str_pad($no_urut, 3, '0', STR_PAD_LEFT);

// Format nomor surat
$nomor_surat = "{$no_urut_str}/UNS27.21/V21.{$bidang}{$jenis_surat}.{$bulan_romawi}/{$tahun}";

// Data baru untuk ditulis ke spreadsheet
$data = [
    [$no_urut, $nomor_surat, $tanggal_surat, $tujuan_surat, $perihal, $pj]
];

// Append data ke spreadsheet
$range = "'$sheetName'!A:F";
$body = new Google\Service\Sheets\ValueRange(['values' => $data]);
$params = ['valueInputOption' => 'RAW'];
$service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

// Simpan ke session buat preview
$_SESSION['last_data'] = [
    'no_urut' => $no_urut,
    'nomor_surat' => $nomor_surat,
    'tanggal_surat' => $tanggal_surat,
    'tujuan_surat' => $tujuan_surat,
    'perihal' => $perihal,
    'pj' => $pj,
];

// Redirect ke preview
header('Location: preview_surat.php');
exit;
?>
