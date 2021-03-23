<?php

include_once("../SDK/php/GSSDK.php"); // Path to Gigya PHP SDK

$apiKey = "Your-API-Key";
$secretKey = "Your Partner Secret";

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
