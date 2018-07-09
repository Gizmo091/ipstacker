<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Connection extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var int The Autonomous System Number associated with the IP. @see https://www.techopedia.com/definition/26871/autonomous-system-number-asn */
    protected $_asn;
    /** @var string The name of the ISP associated with the IP. */
    protected $_isp;


    protected function construct($valueOrSubResonsePart) {
        $this->load(['asn','isp'],$valueOrSubResonsePart);
    }

}