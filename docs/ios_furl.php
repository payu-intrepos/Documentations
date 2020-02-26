<?php

error_reporting(0);

$salt = "13p0PXZk"; # salt value need to be picked from your database


$amount = $_POST["amount"]; # amount need to be picked up from your database


$reverseHash = generateReverseHash();

if ($_POST["hash"] == $reverseHash)
{
    # transaction failed
    # do the required javascript task
    echo ("Transaction Failed & Verified");
    failureCallbackToApp($_POST);
}
else
{
    # transaction is tempered
    # handle it as required
    echo ("<br>");
    echo "\nInvalid transaction--";
}

# For iOS Failure
function failureCallbackToApp($payuResponse)
{
	$appResponse->response = http_build_query($payuResponse);
    $appResponseInJSON = json_encode($appResponse);

    
    $res= "" . http_build_query($payuResponse);
    $res= strval($res);

    echo '<script type="text/javascript">';
    // For WKWebview
    echo'if (typeof window.webkit.messageHandlers.observe.postMessage == "function")';
    echo "{ window.webkit.messageHandlers.observe.postMessage({'onFailure':JSON.stringify($appResponseInJSON)}); }";
    // For UIWebView
    echo 'else { function payu_merchant_js_callback() { PayU.onFailure("' .$res.'");  } }';
    echo '</script>';
}

# Function to generate reverse hash
function generateReverseHash()
{
    global $salt;
    global $amount;
    if ($_POST["additional_charges"] != null)
    {

        $reversehash_string = $_POST["additional_charges"] . "|" . $salt . "|" . $_POST["status"] . "||||||" . $_POST["udf5"] . "|" . $_POST["udf4"] . "|" . $_POST["udf3"] . "|" . $_POST["udf2"] . "|" . $_POST["udf1"] . "|" . $_POST["email"] . "|" . $_POST["firstname"] . "|" . $_POST["productinfo"] . "|" . $amount . "|" . $_POST["txnid"] . "|" . $_POST["key"];

    }
    else
    {
        $reversehash_string = $salt . "|" . $_POST["status"] . "||||||" . $_POST["udf5"] . "|" . $_POST["udf4"] . "|" . $_POST["udf3"] . "|" . $_POST["udf2"] . "|" . $_POST["udf1"] . "|" . $_POST["email"] . "|" . $_POST["firstname"] . "|" . $_POST["productinfo"] . "|" . $amount . "|" . $_POST["txnid"] . "|" . $_POST["key"];

    }

    //  echo($reversehash_string);
    $reverseHash = strtolower(hash("sha512", $reversehash_string));

    return $reverseHash;
}

?>
