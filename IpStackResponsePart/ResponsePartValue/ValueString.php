<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePart;

class ValueString extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart):ResponsePart {
        return parent::construct($valueOrSubResonsePart === null ? $valueOrSubResonsePart : (string)$valueOrSubResonsePart);
    }

}