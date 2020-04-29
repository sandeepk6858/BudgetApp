<?php

session_start();
$totalAmount = $_GET['totalAmount'];
$amountLabel = $_GET['amountLabel'];
$room = $_GET['room'];
$_SESSION['totalAmount'] = $totalAmount;
$_SESSION['amountLabel'] = $amountLabel;
$_SESSION['room'] = $room;
return true;
?>