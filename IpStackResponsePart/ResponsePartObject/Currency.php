<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use mvedie\Libs\IpStacker\Response;

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

    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'currency'      => ValueString::extractValue($Response, 'currency.currency'),
                'name'          => ValueString::extractValue($Response, 'currency.name'),
                'plural'        => ValueString::extractValue($Response, 'currency.plural'),
                'symbol'        => ValueString::extractValue($Response, 'currency.symbol'),
                'symbol_native' => ValueString::extractValue($Response, 'currency.symbol_native'),
            ]
        );
    }

}