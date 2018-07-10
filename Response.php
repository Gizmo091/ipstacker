<?php

namespace mvedie\Libs\IpStacker;

use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartNotAsked;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartNotLoaded;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Connection;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Currency;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Location;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Security;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Timezone;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueFloat;
use mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;

/**
 * Class Response
 *
 * @package mvedie\Libs\IpStacker
 *
 * @method string ip($notFoundValue = 'Optionnal')
 * @method string|null hostnaname($notFoundValue = 'Optionnal')
 * @method string type($notFoundValue = 'Optionnal')
 * @method string continent_code($notFoundValue = 'Optionnal')
 * @method string continent_name($notFoundValue = 'Optionnal')
 * @method string country_code($notFoundValue = 'Optionnal')
 * @method string country_name($notFoundValue = 'Optionnal')
 * @method string region_code($notFoundValue = 'Optionnal')
 * @method string region_name($notFoundValue = 'Optionnal')
 * @method string city($notFoundValue = 'Optionnal')
 * @method string zip($notFoundValue = 'Optionnal')
 * @method float latitude($notFoundValue = 'Optionnal')
 * @method float longitude($notFoundValue = 'Optionnal')
 * @method Location location()
 * @method Timezone time_zone()
 * @method Currency currency()
 * @method Connection connection()
 * @method Security security()
 */
class Response {

    /** @var \mvedie\Libs\IpStacker\Request */
    protected $_Request;
    /** @var array */
    protected $_response_json;

    /** @var string the requested IP address. */
    protected $_ip;
    /** @var string the hostname the requested IP resolves to, only returned if Hostname Lookup is enabled. */
    protected $_hostname;
    /** @var string the IP address type IPv4 or IPv6. */
    protected $_type;
    /** @var string the 2-letter continent code associated with the IP. View all 2-letter continent codes */
    protected $_continent_code;
    /** @var string the name of the continent associated with the IP. */
    protected $_continent_name;
    /** @var string the 2-letter country code associated with the IP. List of all 2-letter country codes */
    protected $_country_code;
    /** @var string the name of the country associated with the IP. */
    protected $_country_name;
    /** @var string the region code of the region associated with the IP (e.g. ycode>CA */
    protected $_region_code;
    /** @var string the name of the region associated with the IP. */
    protected $_region_name;
    /** @var string the name of the city associated with the IP. */
    protected $_city;
    /** @var string the ZIP code associated with the IP. */
    protected $_zip;
    /** @var float the latitude value associated with the IP. */
    protected $_latitude;
    /** @var float the longitude value associated with the IP. */
    protected $_longitude;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Location multiple location-related objects */
    protected $_location;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Timezone an object containing timezone-related data. */
    protected $_time_zone;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Currency an object containing currency-related data. */
    protected $_currency;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Connection an object containing connection-related data. */
    protected $_connection;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Security an object containing security-related data. */
    protected $_security;

    public function __construct(Request $Request, array $response_json) {
        $this->_Request       = $Request;
        $this->_response_json = $response_json;
        $this->parse();
    }


    public function __call($name, $arguments_a) {
        if (property_exists($this, "_$name")) {
            array_unshift($arguments_a, $name);
            return call_user_func_array([$this, 'getProperty'], $arguments_a);
            //return $this->getProperty($name, $arguments_a[0]);
        }
    }


    protected function getProperty(string $property) {
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

        /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePart $val */
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
            /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartValue $val */
            return $val->value();
        }
    }

    /**
     * @return \mvedie\Libs\IpStacker\Request
     */
    public function Request(): \mvedie\Libs\IpStacker\Request {
        return $this->_Request;
    }

    /**
     * @return array
     */
    public function responseJson(): array {
        return $this->_response_json;
    }


    protected function parse() {
        $this->_ip = ValueString::extractValue($this, 'ip');
        $this->_hostname = ValueString::extractValue($this, 'hostname');
        $this->_type = ValueString::extractValue($this, 'type');
        $this->_continent_code = ValueString::extractValue($this, 'continent_code');
        $this->_continent_name = ValueString::extractValue($this, 'continent_name');
        $this->_country_code   = ValueString::extractValue($this, 'country_code');
        $this->_country_name   = ValueString::extractValue($this, 'country_name');
        $this->_region_code    = ValueString::extractValue($this, 'region_code');
        $this->_region_name    = ValueString::extractValue($this, 'region_name');
        $this->_city           = ValueString::extractValue($this, 'city');
        $this->_zip            = ValueString::extractValue($this, 'zip');
        $this->_latitude       = ValueFloat::extractValue($this, 'latitude');
        $this->_longitude      = ValueFloat::extractValue($this, 'longitude');
        $this->_location       = Location::extractValue($this, 'location');
        $this->_time_zone      = Timezone::extractValue($this, 'time_zone');
        $this->_currency       = Currency::extractValue($this, 'currency');
        $this->_connection     = Connection::extractValue($this, 'connection');
        $this->_security       = Security::extractValue($this, 'security');
    }


}