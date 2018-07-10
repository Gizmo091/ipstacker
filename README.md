# ipstacker
Ip Stack Api Call Wrapper


# Usage Exemples :


## Basic Usage :

```php 
$Response = (new \Zmog\Libs\IpStacker\Request('<your_access_key>', '<ip_address>'))->Response();

$country_code = $Response->country_code(); /* Throw an exception if country_code is not present in response */
$country_code = $Response->country_code('US'); /* Use 'US' as default value if country_code is not present in response (no exception are thrown */
```

### Advanced Usage :
```php 

$ip_a = [
    '8.8.8.8',
    '1.1.1.1',
    ];

$Request = new \Zmog\Libs\IpStacker\Request('<your_access_key>', ...$ip_a);
$Request->onlyLocation();
$Request->addCurrency();
/* Or chained method
$Request = (new \Zmog\Libs\IpStacker\Request('<your_access_key>', ...$ip_a))->onlyLocation()->addCurrency();
*/

/* Result of first ip : */
$is_eu_8dot = $Request->Response('8.8.8.8')->location()->is_eu(false);
/* or 
$is_eu_8dot = $Request->Response()->location()->is_eu(false);
*/

/* Result of second ip */ 
$is_eu_1dot = $Request->Response('1.1.1.1')->location()->is_eu(false);

```
