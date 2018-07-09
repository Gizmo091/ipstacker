<?php

namespace mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject;


abstract class Security extends \mvedie\Libs\IpStacker\IpStackResponsePart\ResponsePartObject {

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


    protected function construct($valueOrSubResonsePart) {
        $this->load(['is_proxy', 'proxy_type', 'is_crawler', 'crawler_name', 'crawler_type', 'is_tor', 'threat_level', 'threat_types',], $valueOrSubResonsePart);
    }

}