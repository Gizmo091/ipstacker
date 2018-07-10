<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePart;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use mvedie\Libs\IpStacker\Response;

/**
 * Class Connection
 *
 * @package mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject
 *
 * @method string asn($notFoundValue = 'Optionnal')
 * @method string isp($notFoundValue = 'Optionnal')
 */
class Connection extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var int The Autonomous System Number associated with the IP. @see https://www.techopedia.com/definition/26871/autonomous-system-number-asn */
    protected $_asn;
    /** @var string The name of the ISP associated with the IP. */
    protected $_isp;


    protected function construct($valueOrSubResonsePart):ResponsePart {
        return $this->load(['asn', 'isp'], $valueOrSubResonsePart);
    }


    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'asn' => ValueString::extractValue($Response, 'connection.asn'),
                'isp' => ValueString::extractValue($Response, 'connection.isp'),
            ]
        );
    }
}