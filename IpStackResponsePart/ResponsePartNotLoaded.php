<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart;

use http\Env\Response;
use Zmog\Libs\IpStacker\IpStackerResponse;

class ResponsePartNotLoaded extends ResponsePart {

    protected function construct($valueOrSubResonsePart = null):ResponsePart { return $this; }

    final public function isLoaded():bool {
        return false;
    }

    public static function get(\Zmog\Libs\IpStacker\Response $Response, $propertie_a = null) {
        return new static($Response);
    }
}