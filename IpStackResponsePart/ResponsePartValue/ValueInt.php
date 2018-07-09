<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


abstract class ValueInt extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart) {
        $this->_value = (int)$valueOrSubResonsePart;
    }

}