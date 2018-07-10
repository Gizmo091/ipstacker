<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePart;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueBool;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueInt;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use Zmog\Libs\IpStacker\Response;

/**
 * Class Timezone
 *
 * @package Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject
 *
 * @method string id($notFoundValue = 'Optionnal')
 * @method string current_time($notFoundValue = 'Optionnal')
 * @method int gmt_offset($notFoundValue = 'Optionnal')
 * @method string code($notFoundValue = 'Optionnal')
 * @method bool is_daylight_saving($notFoundValue = 'Optionnal')
 *
 */
class Timezone extends \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var string The ID of the time zone associated with the IP. (e.g. America/Los_Angeles for PST) */
    protected $_id;
    /** @var string The current date and time in the location associated with the IP. (e.g. 2018-03-29T22:31:27-07:00) */
    protected $_current_time;
    /** @var int The GMT offset of the given time zone in seconds. (e.g. -25200 for PST's -7h GMT offset) */
    protected $_gmt_offset;
    /** @var string The universal code of the given time zone. */
    protected $_code;
    /** @var bool True or false depending on whether or not the given time zone is considered daylight saving time. */
    protected $_is_daylight_saving;


    protected function construct($valueOrSubResonsePart): ResponsePart {
        return $this->load(['id', 'current_time', 'gmt_offset', 'code', 'is_daylight_saving',], $valueOrSubResonsePart);
    }


    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'id'                 => ValueString::extractValue($Response, 'time_zone.id'),
                'current_time'       => ValueString::extractValue($Response, 'time_zone.current_time'),
                'gmt_offset'         => ValueInt::extractValue($Response, 'time_zone.gmt_offset'),
                'code'               => ValueString::extractValue($Response, 'time_zone.code'),
                'is_daylight_saving' => ValueBool::extractValue($Response, 'time_zone.is_daylight_saving'),
            ]
        );
    }

}