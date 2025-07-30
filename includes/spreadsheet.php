<?php
require __DIR__ . '/../vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

function getGoogleSheetService() {
    $client = new Client();
    $client->setAuthConfig(__DIR__ . '/../credentials/credentials.json');
    $client->addScope(Sheets::SPREADSHEETS);
    return new Sheets($client);
}

function getLastRowNumber($spreadsheetId, $range) {
    try {
        $service = getGoogleSheetService();
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        if (!is_array($values) || count($values) === 0) return 0;

        $validRows = array_filter($values, fn($row) => isset($row[0]) && trim($row[0]) !== '');
        $lastRow = end($validRows);
        return intval($lastRow[0]); // Asumsi kolom A menyimpan no urut
    } catch (Exception $e) {
        return 0;
    }
}

function tambahDataKeSpreadsheet($data) {
    $spreadsheetId = '1C9wpRQC_qoYiMFQ7Rwc73v1Ve2gV3F4TvOQK4ij9bdY';
    $range = 'Surat Keluar!A4:F'; // Mulai dari row 4 karena row 1–3 header
    $service = getGoogleSheetService();

    $body = new Google_Service_Sheets_ValueRange([
        'values' => [$data]
    ]);

    $params = ['valueInputOption' => 'USER_ENTERED'];
    return $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
}
