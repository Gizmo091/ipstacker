<?php

namespace mvedie\Libs\IpStacker;

class Request {

    const API_END_POINT = 'http://api.ipstack.com/';

    protected $_access_key;
    protected $_ip_address_a;
    protected $_field_a;
    protected $_language;
    protected $_output;


    /**
     * Request constructor.
     *
     * @param string $access_key
     * @param string ...$ip_address
     *
     * @throws \Exception
     */
    public function __construct(string $access_key, string ...$ip_address) {
        $this->_access_key   = $access_key;
        $this->_ip_address_a = $ip_address;
        $this->_field_a      = [];
        $this->setOutput('json');
        $this->setLanguage('en');
    }


    public function addIpAddress(string ...$ip_address): Request {
        $this->_ip_address_a = array_unique(array_merge($this->_ip_address_a, $ip_address));
        return $this;
    }


    /**
     * @param string ...$field
     *
     * @return $this
     */
    public function setFields(string ...$field): Request {
        $this->_field_a = $field;
        return $this;
    }

    public function addFields(string ...$field): Request {
        $this->_field_a = array_unique(array_merge($this->_field_a, $field));
        return $this;
    }

    /**
     * @param mixed $language
     * Supported languages:
     *
     * en - English/US
     * de - German
     * es - Spanish
     * fr - French
     * ja - Japanese
     * pt-br - Portugues (Brazil)
     * ru - Russian
     * zh - Chinese
     *
     * @return \mvedie\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function setLanguage($language): Request {
        if (!in_array($language, ['en', 'de', 'es', 'fr', 'ja', 'pt-br', 'ru', 'zh'])) {
            throw new \Exception('Bad language value');
        }
        $this->_language = $language;
        return $this;
    }

    /**
     * @param string $output
     *
     * @return \mvedie\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function setOutput(string $output): Request {
        if (!in_array($output, ['json', 'xml'])) {
            throw new \Exception('Bad output value');
        }
        $this->_output = $output;
        return $this;
    }


    /**
     * @return \mvedie\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function run(): Request {
        if (empty($this->_ip_address_a)) {
            throw new \Exception('No ip given to Request');
        }

        $endpoint = static::API_END_POINT.implode(',', $this->_ip_address_a);

        $query_parameters               = [];
        $query_parameters['access_key'] = $this->_access_key;
        if (!empty($this->_field_a)) {
            $query_parameters['fields'] = implode(',', $this->_field_a);
            if (strpos($query_parameters['fields'], 'security')) {
                $query_parameters['security'] = 1;
            }
        }
        $query_parameters['language'] = $this->_language;

        $endpoint .= '?'.http_build_query($query_parameters);

        var_dump(file_get_contents($endpoint));
        return $this;
    }

}