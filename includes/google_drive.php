<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/drive_oauth_client.php';
$driveFolders = [
    'lpj' => '1Y8qDQkfz0ax-Fbs_fLpEeFT-3jmfJw8H',
    'proposal' => '1HB5lkFuv_C7FUTNEIglt02pMMtElemZX',
    'notulensi' => '1OYD0ZQFl7f-kaOaFpV9c4v4gek23P-Wu',
    'presensi' => '1xymmnC6DkelJM668F2K6LSd2GBbSkRoL',
    'template' => '1eQu6AYq9RKsdTExUUDIroeuWlOfUNSa0',
];
function getDriveService() {
    $client = getClient();
    return new Google\Service\Drive($client);
}

class GoogleDriveService {
    private $service;

    public function __construct() {
        $client = getClient();
        $this->service = new Google\Service\Drive($client);
    }
    public function getService() {
        return $this->service;
    }
    /**
     * Upload file ke Google Drive
     */
    public function uploadFile($filePath, $fileName, $folderId, $mimeType) {
        $fileMetadata = new Google\Service\Drive\DriveFile([
            'name' => $fileName,
            'parents' => [$folderId]
        ]);

        $content = file_get_contents($filePath);

        $file = $this->service->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $mimeType,
            'uploadType' => 'multipart',
            'fields' => 'id, name, webViewLink'
        ]);

        return $file; // return full file object (id, name, webViewLink)
    }

    /**
     * Update nama file di Google Drive
     */
    public function renameFile($fileId, $newName) {
        $fileMetadata = new Google\Service\Drive\DriveFile([
            'name' => $newName
        ]);

        $updatedFile = $this->service->files->update($fileId, $fileMetadata, [
            'fields' => 'id, name, webViewLink'
        ]);

        return $updatedFile;
    }

    /**
     * Hapus file dari Google Drive
     */
    public function deleteFile($fileId) {
        return $this->service->files->delete($fileId);
    }
}
