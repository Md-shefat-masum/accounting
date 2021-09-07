<?php

require_once __DIR__ . "/lib/AdnSmsNotification.php";
use AdnSms\AdnSmsNotification;

$number = $_POST["number"];
$msg = $_POST["message"];

// $msg = str_replace(array("\r", "\n"),"\r",$msg);
// var_dump(preg_replace("/\r|\n/","\r",$msg));
// var_dump(strpos('   ',$msg), $_POST);
// return $msg;

$product = $_POST["product"];
$code = $_POST["code"];
$qty = $_POST["qty"];
$method = $_POST["method"];
$vehicle_number = $_POST["vehicle_number"];
$driver = $_POST["driver"];
$driver_number = $_POST["driver_number"];

$msg = "Your Order Ready for deliver  \r
DN No #  $code \r
Item/Product # $product \r
QTY  # $qty \r
delivered by\r
Number: $vehicle_number \r
Truck No # $vehicle_number \r
Operator Details # $driver - $driver_number \r
Thank You \r
Orika Corporation \r
www.orika.com.bd \r
01566339339 ";

$message = $msg;
$recipient = $number; // For SINGLE_SMS or OTP
$requestType = 'SINGLE_SMS'; // options available: "SINGLE_SMS", "OTP"
$messageType = 'TEXT'; // options available: "TEXT", "UNICODE"

/*
 * Sending Single SMS or OTP with sendSms() method
 * ----------
 * Params:
 * ----------
 * $requestType   : Required, Must contain any of the two values: "SINGLE_SMS", "OTP"
 * $message       : Required
 * $recipient     : Required
 * $messageType   : Must contain any of the two values: "TEXT", "UNICODE"
 */


$sms = new AdnSmsNotification();
$message = $sms->sendSms($requestType, $message, $recipient, $messageType);
// print_r($message);

