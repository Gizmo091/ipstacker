<?php

namespace Zmog\Libs\IpStacker;

class Request {

    const API_END_POINT = 'http://api.ipstack.com/';

    protected $_access_key;
    protected $_ip_address_a;
    protected $_field_a;
    protected $_language;
    protected $_output;
    protected $_second_timeout = 2;

    /**
     * @var \Zmog\Libs\IpStacker\Response[]
     */
    protected $_Response_a;


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
        $this->_Response_a = null;
    }

    /**
     * Set timeout to wait response
     * @param int $second Timeout in second
     */
    public function setTimeout(int $second ) {
        if ($second < 0) {
            return $this;
        }
        $this->_second_timeout = $second;
        return $this;
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


    public function onlyLocation(): Request { return $this->setFields('location'); }

    public function onlyTimezone(): Request { return $this->setFields('time_zone'); }

    public function onlyCurrency(): Request { return $this->setFields('currency'); }

    public function onlyConnection(): Request { return $this->setFields('connection'); }

    public function onlySecurity(): Request { return $this->setFields('security'); }

    public function addLocation(): Request { return $this->addFields('location'); }

    public function addTimezone(): Request { return $this->addFields('time_zone'); }

    public function addCurrency(): Request { return $this->addFields('currency'); }

    public function addConnection(): Request { return $this->addFields('connection'); }

    public function addSecurity(): Request { return $this->addFields('security'); }


    /**
     * @return array
     */
    public function Field_a(): array {
        return $this->_field_a;
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
     * @return \Zmog\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function setLanguage($language): Request {
        if (!in_array($language,
                      [
                          'en',
                          'de',
                          'es',
                          'fr',
                          'ja',
                          'pt-br',
                          'ru',
                          'zh',
                      ])) {
            throw new \Exception('Bad language value');
        }
        $this->_language = $language;
        return $this;
    }

    /**
     * @param string $output
     *
     * @return \Zmog\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function setOutput(string $output): Request {
        if (!in_array($output,
                      [
                          'json',
                          'xml',
                      ])) {
            throw new \Exception('Bad output value');
        }
        $this->_output = $output;
        return $this;
    }


    protected function addResponse(Response $Response) {
        $this->_Response_a[$Response->ip()] = $Response;
    }

    /**
     * @param string|null $ip_address
     *
     * @return \Zmog\Libs\IpStacker\Response
     * @throws \Zmog\Libs\IpStacker\IpStackerExceptionNotFound
     * @throws \Exception
     */
    public function Response(string $ip_address = null): Response {
        if ($this->_Response_a === null) {
            $this->run();
        }

        if (empty($this->_Response_a)) {
            throw new IpStackerExceptionNotFound("No result for this request");
        }

        $ip_address = $ip_address ?? array_keys($this->_Response_a)[0];

        if (!isset($this->_Response_a[$ip_address])) {
            throw new IpStackerExceptionNotFound("No result found for this ip : $ip_address");
        }

        return $this->_Response_a[$ip_address];
    }


    /**
     * @return \Zmog\Libs\IpStacker\Request
     * @throws \Exception
     */
    public function run(): Request {
        if (empty($this->_ip_address_a)) {
            throw new \Exception('No ip given to Request');
        }
        $this->addFields('ip'); // ip field si required to store result

        $this->_Response_a = [];

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


        // Initialize CURL:
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Add timeout option
        if ($this->_second_timeout > 0) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_second_timeout);
        }

        // Store the data:
        $response_text = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $response_json = json_decode($response_text, true);
        if (null === $response_json) {
            $response_json = array_map(function($ip) {
                return ['ip' => $ip];
            },
                $this->_ip_address_a);
        }

        if (array_key_exists('success', $response_json) && false === $response_json['success']) {
            throw new IpStackerException($response_json['error']['code'], $response_json['error']['type'], $response_json['error']['info']);
        }

        // to treat always like multiple query result
        if (!isset($response_json[0])) {
            $response_json = [$response_json];
        }

        foreach ($response_json as $response) {
            $this->addResponse(new Response($this, $response));
        }

        return $this;
    }


}
