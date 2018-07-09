<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


abstract class ValueBool extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart) {
        $this->_value = (bool)$valueOrSubResonsePart;
    }

}