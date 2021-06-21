<?php
session_start();
require_once('Facebook/autoload.php');
$fb = new Facebook\Facebook([
  'app_id' => '2522782221308197', // Replace {app-id} with your app id
  'app_secret' => '16c25f66bc8219e2c0cc8638f0dadcec',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://sarahaae.herokuapp.com//fb-callback.php', $permissions);

header("location: $loginUrl") ;
?>
