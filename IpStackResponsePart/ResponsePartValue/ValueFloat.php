<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue;


use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePart;

class ValueFloat extends \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue {

    protected function construct($valueOrSubResonsePart):ResponsePart {
        return parent::construct($valueOrSubResonsePart === null ? $valueOrSubResonsePart : (float)$valueOrSubResonsePart);

    }

}