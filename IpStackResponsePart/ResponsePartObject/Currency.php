<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Currency extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @vqr string The 3-letter code of the main currency associated with the IP. */
    protected $_currency;
    /** @var string The name of the given currency. */
    protected $_name;
    /** @var string The plural name of the given currency. */
    protected $_plural;
    /** @var string The symbol letter of the given currency. */
    protected $_symbol;
    /** @var string The native symbol letter of the given currency. */
    protected $_symbol_native;


    protected function construct($valueOrSubResonsePart) {
        $this->load(['currency', 'name', 'plural', 'symbol', 'symbol_native',], $valueOrSubResonsePart);
    }

}