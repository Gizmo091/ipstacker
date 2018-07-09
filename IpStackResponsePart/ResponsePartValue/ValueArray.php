<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


abstract class ValueArray extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart) {
        $this->_value = (array)$valueOrSubResonsePart;
    }

}