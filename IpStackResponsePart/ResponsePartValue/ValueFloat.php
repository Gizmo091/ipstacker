<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


abstract class ValueFloat extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart) {
        $this->_value = (float)$valueOrSubResonsePart;
    }

}