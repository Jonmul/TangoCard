<!--
Jonathan Muller

Tango Card Web Manager
-->

<?php
function makeheader(){?>
<head>
	<meta charset="utf-8" />
	<title>TangoCard Rewards</title>
	<link href="tc.css" type="text/css" rel="stylesheet" />

</head>
<?php } ?>

<?php

function maketop($txt){ ?>
	<div class="head">
		<h1>
			<!-- <img src="https://cms-uploads.s3.amazonaws.com/public/img/TangoCard-logo.png" alt="logo" /> -->
			Tango Card<br /><?php if(isset($txt)){echo $txt;} else{ echo "default";} ?>
		</h1>
	</div>

<?php } ?>

<?php
function makefooter(){ ?>
	<div class="foot">
		<div id="w3c">
			
		</div>
	</div>

<?php } ?>

<?php
function getBal($username, $password){ 
	$enumTangoCardServiceApi = \TangoCard\Sdk\Service\TangoCardServiceApiEnum::INTEGRATION;
    $response = null;

    if ( \TangoCard\Sdk\TangoCardServiceApi::GetAvailableBalance(
            $enumTangoCardServiceApi,
            $username, 
            $password,
            $response
            ) 
        && (null != $response)
    ) {  
        // we have a response from the server, lets see what we got (and do something with it)
        if (is_a($response, 'TangoCard\Sdk\Response\Success\GetAvailableBalanceResponse')) {
           # echo "\nSuccess - GetAvailableBalance - Initial\n";
            $tango_cents_available_balance = $response->getAvailableBalance();
			$_SESSION["balance"] = $tango_cents_available_balance;
            $tango_dollars_available_balance = number_format((double)$tango_cents_available_balance/100, 2);
			$_SESSION["balanced"] = $tango_dollars_available_balance ;
            //echo "\tCurrent balance: $" . $tango_dollars_available_balance . " dollars.\n";
        } else {
            throw new RuntimeException('Unexpected response.');
        }
    }
}
?>

<?php
function purchaseCard($username,$password, $amount){
	$enumTangoCardServiceApi = \TangoCard\Sdk\Service\TangoCardServiceApiEnum::INTEGRATION;
    $card_sku = "tango-card";
    $cardValueTangoCardCents = $amount; // $1.00 dollars
    $responsePurchaseCard = null;

    if ( \TangoCard\Sdk\TangoCardServiceApi::PurchaseCard(
            $enumTangoCardServiceApi,
            $username, 
            $password,
            $card_sku,                              // cardSku
            $cardValueTangoCardCents,               // cardValue
            true,                                   // tcSend 
            "Sally Example",                        // recipientName
            "sally@example.com",                    // recipientEmail
            "Happy Birthday",                       // giftMessage
            "Bill Example",                         // giftFrom
            null,                                   // companyIdentifier (default Tango Card email template)
            $responsePurchaseCard                   // response
        ) 
        && (null != $responsePurchaseCard)
    ) {
        // we have a response from the server, lets see what we got (and do something with it)
       // if (is_a($response, 'TangoCard\Sdk\Response\Success\PurchaseCardResponse')) {
		if(true){
            //echo "\nSuccess - PurchaseCard - Delivery\n";
            //echo "    Reference Order ID: "  . $responsePurchaseCard->getReferenceOrderId() ."\n";
            //echo "    Card Token:         "  . $responsePurchaseCard->getCardToken() . "\n";
            //echo "    Card Number:        "  . $responsePurchaseCard->getCardNumber() . "\n";
            //echo "    Card Pin:           "  . $responsePurchaseCard->getCardPin() . "\n";
            //echo "    Claim Url:          "  . $responsePurchaseCard->getClaimUrl() . "\n";
            //echo "    Challenge Key:      "  . $responsePurchaseCard->getChallengeKey() . "\n";
            //echo "    Event Number:       '"  . $responsePurchaseCard_Delivery->getEventNumber() . "'\n";
			$oid=$responsePurchaseCard->getReferenceOrderId();
			$ct=$responsePurchaseCard->getCardToken();
			$cn=$responsePurchaseCard->getCardNumber();
			$cp=$responsePurchaseCard->getCardPin();
			$curl=$responsePurchaseCard->getClaimUrl();
			$ckey=$responsePurchaseCard->getChallengeKey();
			?>
			<p>
				Success - PurchaseCard - Delivery<br />
				Reference Order ID: <?=$oid ?> <br />
				Card Token: <?=$ct ?> <br />
				Card Number: <?=$cn ?> <br />
				Card Pin: <?=$cp ?> <br />
				Claim Url: <?=$curl ?> <br />
				Challenge Key: <?=$ckey ?> <br />
				
			</p>
			<?php
        } else {
            throw new RuntimeException('Unexpected response.');
        }
    }


} ?>