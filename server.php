<?php
// Push The notification with parameters
header("Access-Control-Allow-Origin: *");
require_once('PushBots.class.php');
$pb = new PushBots();
// Application ID
$appID = '5f7e2912af032a585a23ce77';

$deviceID = $_REQUEST["tk"];
// Application Secret
$appSecret = 'f18aa100dbf43fe834762a9f5f3df2b0';
$pb->App($appID, $appSecret);
/*$msg = "PRUEBA PHP CERDO";
$pb->Alert($msg);
$pb->Platform(array(0,1,2,3,4,5));
$customfields= array("author" => "Alejandro","nextActivity" => "com.better.notifications");
$pb->Payload($customfields);

$pb->Push();*/


$pb->AliasData(1, $deviceID, "test");
// set Alias on the server
$pb->setAlias();

// Push to Single Device
// Notification Settings
$pb->AlertOne("TEST PHP");
$pb->PlatformOne("0");
$pb->TokenOne($deviceID);

//Push to Single Device
$pb->PushOne();

?>