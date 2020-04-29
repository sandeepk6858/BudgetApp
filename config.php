<?php
require_once "vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("75573634484-gh639cdlppgi6roa0o4hcbm1qm8vu8dp.apps.googleusercontent.com");
$gClient->setClientSecret("TGp-fFUC47n_Bi-vOyPqICI7");
$gClient->setApplicationName("Lain");
$gClient->setRedirectUri("http://supervisionit.com/lain/index.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/spreadsheets https://www.googleapis.com/auth/drive");
$gClient->setAccessType("offline"); 
$gClient->setPrompt('consent');
?>