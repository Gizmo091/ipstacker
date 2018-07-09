<?php

namespace mvedie\Libs\IpStacker;


/**
 * Class IpStackerException
 *
 * @package mvedie\Libs\IpStacker
 *
 * @see     https://ipstack.com/documentation#errors
 */
class IpStackerException extends \Exception {


    /**
     * IpStackerException constructor.
     *
     * @param int    $code
     * @param string $type
     * @param string $info
     */
    public function __construct(int $code, string $type, string $info) {
        parent::__construct($info.' ( type : '.$type.')', $code);
    }
}