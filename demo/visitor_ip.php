<?php

/* include not required with composer */
include('../IpStackerException.php');
include('../IpStackerExceptionNotFound.php');
include('../Request.php');
include('../Response.php');
include('../IpStackResponsePart/ResponsePart.php');
include('../IpStackResponsePart/ResponsePartNotLoaded.php');
include('../IpStackResponsePart/ResponsePartNotAsked.php');
include('../IpStackResponsePart/ResponsePartObject.php');
include('../IpStackResponsePart/ResponsePartValue.php');
include('../IpStackResponsePart/ResponsePartValue/ValueBool.php');
include('../IpStackResponsePart/ResponsePartValue/ValueFloat.php');
include('../IpStackResponsePart/ResponsePartValue/ValueInt.php');
include('../IpStackResponsePart/ResponsePartValue/ValueString.php');
include('../IpStackResponsePart/ResponsePartValue/ValueArray.php');
include('../IpStackResponsePart/ResponsePartObject/Connection.php');
include('../IpStackResponsePart/ResponsePartObject/Security.php');
include('../IpStackResponsePart/ResponsePartObject/Timezone.php');
include('../IpStackResponsePart/ResponsePartObject/Currency.php');
include('../IpStackResponsePart/ResponsePartObject/Language.php');
include('../IpStackResponsePart/ResponsePartObject/Location.php');


$Request = (new \Zmog\Libs\IpStacker\Request('<your_access_key>', '8.8.8.8'))->onlyLocation()->addCurrency();

$is_eu = $Request->Response()->location()->is_eu(false);

$language_code = $Request->Response()->location()->languages()[0]->code();
$currency_code = $Request->Response()->currency()->code($is_eu ? 'EUR' : 'USD');
