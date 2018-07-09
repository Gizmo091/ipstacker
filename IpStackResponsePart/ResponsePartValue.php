<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;


abstract class ResponsePartValue extends ResponsePart {

    protected $_value;

    protected function construct($valueOrSubResonsePart) {
        $this->_value = $valueOrSubResonsePart;
    }

    final public function isLoaded():bool {
        return true;
    }

}