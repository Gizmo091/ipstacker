<?php


include('../IpStackerException.php');
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
include('../IpStackResponsePart/ResponsePartObject/Connection.php');
include('../IpStackResponsePart/ResponsePartObject/Security.php');
include('../IpStackResponsePart/ResponsePartObject/Timezone.php');
include('../IpStackResponsePart/ResponsePartObject/Currency.php');
include('../IpStackResponsePart/ResponsePartObject/Language.php');
include('../IpStackResponsePart/ResponsePartObject/Location.php');

echo "test";

$Request = new \mvedie\Libs\IpStacker\Request('your_key', '8.8.8.8');

$Request->run();
