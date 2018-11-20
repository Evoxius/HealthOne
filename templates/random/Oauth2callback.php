<?php
require __DIR__ . '../../../vendor/autoload.php';

session_start();

$client = new Google_Client();

$client->setClientId("542936429191-eu265aphvc3m2967t9np9jvsmq2op16t.apps.googleusercontent.com");
$client->setClientSecret("D4QptYuFW1M-Tdh-ocBAHL2m");
$client->setRedirectUri('https://localhost/oauth/oauth2callback.php');

$client->addScope("https://wwww.googleapis.com/auth/drive.readonly");
$client->addScope("https://www.googleapis.com/auth/books");
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url));
} else {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth/index.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}