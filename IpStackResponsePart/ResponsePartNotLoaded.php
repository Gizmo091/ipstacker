<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;

use http\Env\Response;
use mvedie\Libs\IpStacker\IpStackerResponse;

class ResponsePartNotLoaded extends ResponsePart {

    protected function construct($valueOrSubResonsePart = null) { }

    final public function isLoaded():bool {
        return false;
    }
}