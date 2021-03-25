<?php

include_once("./php-sdk/GSSDK.php"); // Path to Gigya PHP SDK

$apiKey = "3_MwTJI9kYDEV8N41PJ0RotLXRmaDBIwz4ZwQWU_3b3kH0PvyQouq_CtO7oA7xvrWB";
$secretKey = "BMP6ID1gmhu5BiIX93NpGRw3ENPJ66CLpAz2p+IYIQI=";

$incEmail = null;
if (isset($_POST['email']) && $_POST['email'] !== "") {
    $incEmail = $_POST['email'];
}

$method = "accounts.sendLiteInvite";
$request = new GSRequest($apiKey,$secretKey,$method);
$request->setParam("invitationExpiration",3600);

if ($incEmail) {
    $request->setParam("email",$incEmail);
} else {
    echo "Email is invalid.";
    return;
}


$response = $request->send();

if($response->getErrorCode()==0)
    {
        echo "Success";
    }
else
    {
        echo ("Uh-oh, we got the following error: " . $response->getErrorMessage());
        error_log($response->getLog());
    }

?>
