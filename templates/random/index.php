<?php
require __DIR__ . '../../../vendor/autoload.php';

session_start();

$client = new Google_Client();

$client->setClientId("542936429191-eu265aphvc3m2967t9np9jvsmq2op16t.apps.googleusercontent.com");
$client->setClientSecret("D4QptYuFW1M-Tdh-ocBAHL2m");

$client->addScope("https://wwww.googleapis.com/auth/drive.readonly");
$client->addScope("https://www.googleapis.com/auth/books");
$client->addScope("email");
$client->addScope("profile");

if (isset($_SESSION['access_token']) && !empty($_SESSION['access_token']))
{
    $client->setAccessToken($_SESSION['access_token']);

    echo "<h2>Boeken van Tommy Wieringa";
    $service=new Google_Service_Books($client);
    $results=$service->volumes->listVolumes('Tommy Wieringa');
    foreach($results as $item)
    {
        echo "<br/>";
        echo "<h3>".$item['volumeInfo']['title']."</h3>";
        echo $item['volumeInfo']['description']."</br>";
    }
    $drive = new Google_Service_Drive($client);
    $files = $drive->files->listFiles(array())->getFiles();
    echo "<h2>Mijn bestanden</h2>";
    foreach($files as $file)
    {
        echo "<br/>";
        echo"<h4>".$file['name']."</h4>";
    }
} else {
    $redirect_url = 'https://'.$_SERVER['HTTPS_HOST']. '/oauth/oauth2callback.php';
    header('Location:'.filter_var($redirect_url, FILTER_SANITIZE_URL));
}