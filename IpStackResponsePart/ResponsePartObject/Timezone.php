<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Timezone extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

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


    protected function construct($valueOrSubResonsePart) {
        $this->load(['id', 'current_time', 'gmt_offset', 'code', 'is_daylight_saving',], $valueOrSubResonsePart);
    }

}