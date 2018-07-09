<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Language extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var string The 2-letter language code for the given language. */
    protected $_code;
    /** @var string The name (in the API request's main language) of the given language. (e.g. Portuguese) */
    protected $_name;
    /** @var string The native name of the given language. (e.g. Português) */
    protected $_native;


    protected function construct($valueOrSubResonsePart) {
        $this->load(['code', 'name', 'native',], $valueOrSubResonsePart);
    }

}