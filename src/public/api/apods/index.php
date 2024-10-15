<?php

namespace DemoApp;

require __DIR__ . '../../../../vendor/autoload.php';
require __DIR__ . '../../../../app_secrets.php';

use GuzzleHttp\Client;

header('Content-Type: ' . 'application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('Status: 405 Method Not Supported');
    exit;
}

$requestedDate = isset($_REQUEST['date']) ? htmlspecialchars($_REQUEST['date']) : '';
$client = new Client();

$response = $client->request('GET', NASA_APOD_API_URL, [
    'query' => [
        'api_key' => NASA_APOD_KEY,
        'date' => $requestedDate
    ]
]);

echo $response->getBody()->getContents();
