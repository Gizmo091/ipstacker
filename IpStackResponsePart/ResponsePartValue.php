<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;


use mvedie\Libs\IpStacker\Response;

abstract class ResponsePartValue extends ResponsePart {

    protected $_value;

    protected function construct($value) {
        $this->_value = $value;
    }

    final public function isLoaded():bool {
        return true;
    }


    public static function get(Response $Response, $value) {
        return (new static($Response))->construct($value);
    }

}