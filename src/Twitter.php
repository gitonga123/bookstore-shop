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

    private function requestAccessToken()
    {
        $encodedString = base64_encode($this->key. ":" . $this->secret);
        $headers = [
            'Authorization' => 'Basic '. $encodedString,
            'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
        ];

        $options = [
            'headers' => $headers,
            'body' => 'grant_type=client_credentials'
        ];

        $reponse = $this->client->post(self::OAUTH_ENDPOINT, $options);
        $body = json_encode($reponse->getBody(), true);

        $this->accessToken = $body['access_token'];
    }

    
}
