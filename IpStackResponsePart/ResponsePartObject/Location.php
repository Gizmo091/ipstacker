<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Location extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var int The unique geoname identifier in accordance with the Geonames Registry. */
    protected $_geoname_id;
    /** @var string The capital city of the country associated with the IP. */
    protected $_capital;
    /** @var \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject\Language[] An object containing one or multiple sub-objects per language spoken in the country associated with the IP. */
    protected $_languages;
    /** @var string Tn HTTP URL leading to an SVG-flag icon for the country associated with the IP. */
    protected $_country_flag;
    /** @var string The emoji icon for the flag of the country associated with the IP. */
    protected $_country_flag_emoji;
    /** @var string The unicode value of the emoji icon for the flag of the country associated with the IP. (e.g. U+1F1F5 U+1F1F9 for the Portuguese flag) */
    protected $_country_flag_emoji_unicode;
    /** @var string The calling/dial code of the country associated with the IP. (e.g. 351) for Portugal. */
    protected $_calling_code;
    /** @var bool True or false depending on whether or not the county associated with the IP is in the European Union. */
    protected $_is_eu;


    protected function construct($valueOrSubResonsePart) {
        $this->load(['geoname_id', 'capital', 'languages', 'country_flag', 'country_flag_emoji', 'country_flag_emoji_unicode', 'calling_code', 'is_eu',], $valueOrSubResonsePart);
    }

}