<?php
require_once __DIR__ . '/../vendor/autoload.php';

function getClient() {
    $client = new Google\Client();
    $client->setAuthConfig(__DIR__ . '/../credentials/oauth_credentials.json');
    $client->addScope(Google\Service\Drive::DRIVE);
    $client->setAccessType('offline');
    $client->setRedirectUri('http://localhost/nyekre_em/public/oauth2callback.php');

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    }

    return $client;
}
