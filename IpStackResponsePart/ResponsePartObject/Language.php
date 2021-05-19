<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePart;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use Zmog\Libs\IpStacker\Response;

/**
 * Class Language
 *
 * @package Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject
 *
 * @method string code($notFoundValue = 'Optionnal')
 * @method string name($notFoundValue = 'Optionnal')
 * @method string native($notFoundValue = 'Optionnal')
 */
class Language extends \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    protected static $current_key = null;

    /** @var string The 2-letter language code for the given language. */
    protected $_code;
    /** @var string The name (in the API request's main language) of the given language. (e.g. Portuguese) */
    protected $_name;
    /** @var string The native name of the given language. (e.g. Português) */
    protected $_native;


    protected function construct($valueOrSubResonsePart): ResponsePart {
        return $this->load(['code', 'name', 'native',], $valueOrSubResonsePart);
    }

    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'code'   => ValueString::extractValue($Response, self::$current_key.'.code'),
                'name'   => ValueString::extractValue($Response, self::$current_key.'.name'),
                'native' => ValueString::extractValue($Response, self::$current_key.'.native'),
            ]
        );
    }

    public static function extractValue(Response $Response, string $key) {
        self::$current_key = $key;
        return parent::extractValue($Response, $key);
    }

}