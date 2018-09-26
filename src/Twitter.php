<?php

namespace TwitterApp;

use Exception;
use GuzzleHttp\Client;

class Twitter
{
    const TWITTER_API_BASE_URI = 'https://api.twitter.com';
    private $accessToken;
    private $llient;
    private $key;
    private $secret;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;

        $this->client = new Client(
            ['base_url' => self::TWITTER_API_BASE_URI]
        );
    }

    public function fetchTweets(string $name, int $count)
    {
        return [];
    }
}
