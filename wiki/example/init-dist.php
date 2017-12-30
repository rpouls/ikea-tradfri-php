<?php
declare(strict_types=1);

if (!is_file(__DIR__.'/../../vendor/autoload.php')) {
    die('composer up!');
}

require '../../vendor/autoload.php';

define('COAP_GATEWAY_IP', 'yourHubIp');
define('COAP_GATEWAY_SECRET', 'secretFromBacksideOfHub');
define('COAP_API_KEY', 'generatedApiKeySeeReadme');

defined('COAP_API_KEY') ? null : die('FOLLOW FIRST RUN HELP IN README');
defined('COAP_GATEWAY_IP') ? null : die('FOLLOW FIRST RUN HELP IN README');
defined('COAP_GATEWAY_SECRET') ? null : die('FOLLOW FIRST RUN HELP IN README');

use IKEA\Tradfri\Adapter\Coap as Adapter;
use IKEA\Tradfri\Command\Coaps;

$deviceMapper = new IKEA\Tradfri\Mapper\DeviceData();
$groupMapper = new IKEA\Tradfri\Mapper\GroupData();
$commands = new Coaps(COAP_GATEWAY_IP, COAP_GATEWAY_SECRET);
$adapter = new Adapter($commands, $deviceMapper, $groupMapper);
$client = new \IKEA\Tradfri\Client\Client($adapter);
$api = new \IKEA\Tradfri\Service\Api($client);