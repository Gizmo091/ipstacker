<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;


use mvedie\Libs\IpStacker\Response;

abstract class ResponsePartObject extends ResponsePart {

    protected $_Response;


    final public function load(array $keys, $valueOrSubResonsePart) {
        foreach ($keys as $key) {
            if (array_key_exists($key, $valueOrSubResonsePart)) {
                $this->{"_$key"} = $valueOrSubResonsePart[$key];
            }
            else {
                $this->{"_$key"} = ResponsePartNotLoaded::get($this->_Response, null);
            }
        }
    }


    final public function isLoaded(): bool {
        return true;
    }


}