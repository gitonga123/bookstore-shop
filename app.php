<?php

use TwitterApp\Twitter;

require __DIR__. '/vendor/autoload.php';
//$path = '.twitter_php7.json';
$jsonCredentials = file_get_contents($path);
var_dump($jsonCredentials);
$credentials = json_encode($jsonCredentials, true);

var_dump($credentials);exit();

$twitter = new Twitter($credentials['key'], $credentials['secret']);
