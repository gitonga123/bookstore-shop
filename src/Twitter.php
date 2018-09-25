<?php

namespace TwitterApp;

class Twitter
{
    private $key;
    private $secret;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    public function fetchTweets(string $name, int $count)
    {
        return [];
    }
}
