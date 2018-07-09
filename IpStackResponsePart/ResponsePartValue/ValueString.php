<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


abstract class ValueString extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart) {
        $this->_value = (string)$valueOrSubResonsePart;
    }

}