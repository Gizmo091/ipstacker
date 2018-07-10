<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart;

use mvedie\Libs\IpStacker\Request;
use mvedie\Libs\IpStacker\Response;

abstract class ResponsePart {

    protected $_Response;

    final protected function __construct(Response $Response) {
        $this->_Response = $Response;
    }


    abstract protected function construct($valueOrSubResonsePart): ResponsePart;


    /**
     * @return \mvedie\Libs\IpStacker\Response
     */
    public function Response(): Response {
        return $this->_Response;
    }


    abstract public static function get(Response $Response, $propertie_a);

    public static function isObject(): bool {
        return false;
    }


    abstract public function isLoaded(): bool;

    public static function extractValue(Response $Response, string $key) {
        $key_a = explode('.', $key);
        if (!empty($Response->Request()->Field_a())) {
            $key_total = null;
            do {
                foreach ($key_a as $key_part) {
                    if (is_numeric($key_part)) {
                        continue;
                    }
                    $key_total = (null === $key_total) ? ($key_part) : ($key_total.'.'.$key_part);
                    if (in_array($key_total, $Response->Request()->Field_a())) {
                        break 2;
                    }
                }
                if (!static::isObject()) {
                    return ResponsePartNotAsked::get($Response);
                }
                else {
                    return static::get($Response,[]);
                }
            } while (true === false);
        }

        $value = null;

        foreach ($key_a as $key_part) {
            $key_part = is_numeric($key_part) ? (int)$key_part : $key_part;
            if (!array_key_exists($key_part, $value ?? $Response->responseJson())) {
                if (!static::isObject()) {
                    return ResponsePartNotLoaded::get($Response);
                }
                else {
                    return static::get($Response,[]);
                }
            }
            $value = ($value ?? $Response->responseJson())[$key_part];
        }
        return static::get($Response, $value);
    }

}