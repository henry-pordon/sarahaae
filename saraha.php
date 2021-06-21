<?php
session_start();
require_once('Facebook/autoload.php');
$txt=$_SESSION['text'];
$fb = new Facebook\Facebook([
  'app_id' => '2522782221308197', // Replace {app-id} with your app id
  'app_secret' => '16c25f66bc8219e2c0cc8638f0dadcec',
  'default_graph_version' => 'v3.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
$user_name=$user['name'];
//echo 'Name: ' . $user['name'];
//echo "<br>".$txt;

$myfile = fopen("messages.txt", "r") or die("Unable to open file!");
$new_text = "$user_name\n$txt\n";


file_put_contents('messages.txt', $new_text, FILE_APPEND);
header("location: index.php?success=1");





?>