<?php
require_once __DIR__ . '/spreadsheet.php';

function getLastSuratNumber() {
    $service = getGoogleSheetService();
    $spreadsheetId = '1C9wpRQC_qoYiMFQ7Rwc73v1Ve2gV3F4TvOQK4ij9bdY';
    $range = 'Surat Keluar!A3:A'; // Cek kolom nomor urut

    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $rows = $response->getValues();

    if (is_array($rows) && count($rows) > 0) {
        $lastRow = end($rows);
        return intval($lastRow[0]);
    }
    return 0;
}

function insertSuratData($data) {
    try {
        $service = getGoogleSheetService();
        $spreadsheetId = '1C9wpRQC_qoYiMFQ7Rwc73v1Ve2gV3F4TvOQK4ij9bdY';
        $range = 'Surat Keluar!A3:F';
        $body = new Google\Service\Sheets\ValueRange(['values' => $data]);
        $params = ['valueInputOption' => 'USER_ENTERED'];
        $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
        return true;
    } catch (Exception $e) {
        return false;
    }
}
