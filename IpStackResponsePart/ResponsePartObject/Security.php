<?php

namespace Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePart;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueArray;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueBool;
use Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartValue\ValueString;
use Zmog\Libs\IpStacker\Response;

/**
 * Class Security
 *
 * @package Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject
 *
 * @method bool is_proxy($notFoundValue = 'Optionnal')
 * @method string proxy_type($notFoundValue = 'Optionnal')
 * @method bool is_crawler($notFoundValue = 'Optionnal')
 * @method string crawler_name($notFoundValue = 'Optionnal')
 * @method string crawler_type($notFoundValue = 'Optionnal')
 * @method bool is_tor($notFoundValue = 'Optionnal')
 * @method string threat_level($notFoundValue = 'Optionnal')
 * @method string threat_types($notFoundValue = 'Optionnal')
 */
class Security extends \Zmog\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

    /** @var bool True or false depending on whether or not the given IP is associated with a proxy. */
    protected $_is_proxy;
    /** @var string The type of proxy the IP is associated with.
     * cgi - CGI Proxy
     * web - Web Proxy
     * vpn - VPN Proxy */
    protected $_proxy_type;
    /** @var bool True or false depending on whether or not the given IP is associated with a crawler. */
    protected $_is_crawler;
    /** @var string The name of the crawler the IP is associated with. */
    protected $_crawler_name;
    /** @var string The type of crawler the IP is associated with.
     * unrecognized - Unrecognized
     * search_engine_bot - Search engine bot
     * site_monitor - Site monitor
     * screenshot_creator - Screenshot creator
     * link_checker - Link checker
     * wearable_computer - Wearable computer
     * web_scraper - Web scraper
     * vulnerability_scanner - Vulnerability scanner
     * virus_scanner - Virus scanner
     * speed_tester - Speed tester
     * feed_fetcher - Feed Fetcher
     * tool - Tool
     * marketeing - Marketing
     */
    protected $_crawler_type;
    /** string bool True or false depending on whether or not the given IP is associated with the anonymous Tor system. */
    protected $_is_tor;
    /** @var string The type of threat level the IP is associated with. low, medium, high */
    protected $_threat_level;
    /** @var string[] An object containing all threat types associated with the IP. */
    protected $_threat_types;


    protected function construct($valueOrSubResonsePart): ResponsePart {
        return $this->load(['is_proxy', 'proxy_type', 'is_crawler', 'crawler_name', 'crawler_type', 'is_tor', 'threat_level', 'threat_types',], $valueOrSubResonsePart);
    }


    public static function get(Response $Response, $propertie_a) {
        return (new static($Response))->construct(
            [
                'is_proxy'     => ValueBool::extractValue($Response, 'security.is_proxy'),
                'proxy_type'   => ValueString::extractValue($Response, 'security.proxy_type'),
                'is_crawler'   => ValueBool::extractValue($Response, 'security.is_crawler'),
                'crawler_name' => ValueString::extractValue($Response, 'security.crawler_name'),
                'crawler_type' => ValueString::extractValue($Response, 'security.crawler_type'),
                'is_tor'       => ValueBool::extractValue($Response, 'security.is_tor'),
                'threat_level' => ValueString::extractValue($Response, 'security.threat_level'),
                'threat_types' => ValueArray::extractValue($Response, 'security.threat_types'),
            ]
        );
    }

}