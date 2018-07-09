<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;

use mvedie\Libs\IpStacker\IpStackerResponse;

abstract class ResponsePart {

    protected $_Response;

    final protected function __construct(IpStackerResponse $Response) {
        $this->_Response = $Response;
    }

    abstract protected function construct($valueOrSubResonsePart) ;


    /**
     * @return \mvedie\Libs\IpStacker\IpStackerResponse
     */
    public function Response():IpStackerResponse {
        return $this->_Response;
    }



    public static function get(IpStackerResponse $Response, $propertie_a) {
        return (new static($Response))->construct($propertie_a);
    }


    abstract public function isLoaded():bool;

}