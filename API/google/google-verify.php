<?php
$id_token = $_POST["token"];
require_once "./google-api-php-client--PHP8.0/vendor/autoload.php";
// 37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com
$client = new Google_Client(['client_id' => "37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com"]);
$payload = $client->verifyIdToken($id_token);

if ($payload) {
    $userid = $payload["sub"];
    $name = $payload["name"];
    $email = $payload["email"];
    $gambar = $payload["picture"];

    // $jsonData = array($userid, $name, $email, $gambar);

    $jsonData = new stdClass();
    $jsonData->id = $userid;
    $jsonData->name = $name;
    $jsonData->email = $email;
    $jsonData->gambar = $gambar;

    // print_r(json_encode($jsonData));
    echo $result = json_encode($jsonData);
} else {
    echo $result = null;
}

?>