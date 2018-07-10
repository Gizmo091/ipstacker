<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePart;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use mvedie\Libs\IpStacker\Response;

/**
 * Class Currency
 *
 * @package mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject
 *
 * @method string code($notFoundValue = 'Optionnal')
 * @method string name($notFoundValue = 'Optionnal')
 * @method string plural($notFoundValue = 'Optionnal')
 * @method string symbol($notFoundValue = 'Optionnal')
 * @method string symbol_native($notFoundValue = 'Optionnal')
 */
class Currency extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @vqr string The 3-letter code of the main currency associated with the IP. */
    protected $_code;
    /** @var string The name of the given currency. */
    protected $_name;
    /** @var string The plural name of the given currency. */
    protected $_plural;
    /** @var string The symbol letter of the given currency. */
    protected $_symbol;
    /** @var string The native symbol letter of the given currency. */
    protected $_symbol_native;


    protected function construct($valueOrSubResonsePart): ResponsePart {
        return $this->load(['code', 'name', 'plural', 'symbol', 'symbol_native',], $valueOrSubResonsePart);
    }

    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'code'          => ValueString::extractValue($Response, 'currency.code'),
                'name'          => ValueString::extractValue($Response, 'currency.name'),
                'plural'        => ValueString::extractValue($Response, 'currency.plural'),
                'symbol'        => ValueString::extractValue($Response, 'currency.symbol'),
                'symbol_native' => ValueString::extractValue($Response, 'currency.symbol_native'),
            ]
        );
    }

}