<?php
// Push The notification with parameters
header("Access-Control-Allow-Origin: *");
require_once('PushBots.class.php');
$pb = new PushBots();
// Application ID
$appID = '5f7e2912af032a585a23ce77';

$deviceID = "cIt-SPaeSjCbxBEuWQ1D65:APA91bHrxZNOGl1ViGNTL5spnJGR2EB9omVqz9OP87AG-w2gryS0oalpeEEyLNSwb2UXOc2RoorpKfOmn1iQyqhjY2Y62TBMZK7GBa9gLBT5RrGU0IOAJL3bKUBkSnEZ08yS9MnQVjJW";
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
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <button onclick="send()">Send notification</button>
</body>
<script>
    function send(){
        $.ajax({
            "url": "https://api.pushbots.com/push/one",
            "method":"POST",
            "data":{
                "msg":"TEST PHP",
                "platform":"0",
                "token":"cIt-SPaeSjCbxBEuWQ1D65:APA91bHrxZNOGl1ViGNTL5spnJGR2EB9omVqz9OP87AG-w2gryS0oalpeEEyLNSwb2UXOc2RoorpKfOmn1iQyqhjY2Y62TBMZK7GBa9gLBT5RrGU0IOAJL3bKUBkSnEZ08yS9MnQVjJW"
            },success: function(data){
                console.log(data);
            }
        })
    }
</script>
<script src="www/js/jquery.js"></script>
</html>