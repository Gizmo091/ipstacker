<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;

use http\Env\Response;
use mvedie\Libs\IpStacker\IpStackerResponse;

class ResponsePartNotLoaded extends ResponsePart {

    protected function construct($valueOrSubResonsePart = null):ResponsePart { return $this; }

    final public function isLoaded():bool {
        return false;
    }

    public static function get(\mvedie\Libs\IpStacker\Response $Response, $propertie_a = null) {
        return new static($Response);
    }
}