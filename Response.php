<?php

namespace mvedie\Libs\IpStacker;

class Response {

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





}