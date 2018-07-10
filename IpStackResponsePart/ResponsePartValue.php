<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart;


use Zmog\Libs\IpStacker\Response;

abstract class ResponsePartValue extends ResponsePart {

    protected $_value;

    protected function construct($value):ResponsePart {
        $this->_value = $value;
        return $this;
    }

    final public function isLoaded():bool {
        return true;
    }

    /**
     * @return mixed
     */
    public function value() {
        return $this->_value;
    }




    public static function get(Response $Response, $value) {
        return (new static($Response))->construct($value);
    }

}