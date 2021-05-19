<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart;


use Zmog\Libs\IpStacker\IpStackerExceptionNotFound;
use Zmog\Libs\IpStacker\Response;

abstract class ResponsePartObject extends ResponsePart {

    protected $_Response;

    public static function isObject():bool {
        return true;
    }

    final public function load(array $keys, $valueOrSubResonsePart):ResponsePartObject {
        foreach ($keys as $key) {
            if (array_key_exists($key, $valueOrSubResonsePart)) {
                $this->{"_$key"} = $valueOrSubResonsePart[$key];
            }
            else {
                $this->{"_$key"} = ResponsePartNotLoaded::get($this->_Response, null);
            }
        }
        return $this;
    }


    final public function isLoaded(): bool {
        return true;
    }



    final public function __call($name, $arguments_a) {
        if (property_exists($this, "_$name")) {
            array_unshift($arguments_a,$name);
            return call_user_func_array([$this,'getProperty'],$arguments_a);
            //return $this->getProperty($name, $arguments_a[0]);
        }
    }


    final protected function getProperty(string $property) {
        if (1 === func_num_args()) {
            $notFoundValue = function() {
                throw new IpStackerExceptionNotFound();
            };
        }
        else {
            $value = func_get_arg(1);

            $notFoundValue = function() use ($value) {
                return $value;
            };
        }

        /** @var \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePart $val */
        $val       = $this->{"_$property"};
        $val_class = get_class($val);
        if (ResponsePartNotLoaded::class === $val_class) {
            return $notFoundValue();
        }
        if (ResponsePartNotAsked::class === $val_class) {
            return $notFoundValue();
        }

        if ($val::isObject()) {
            return $val;
        }
        else {
            /** @var \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue $val */
            return $val->value();
        }
    }


}