<?php


namespace Braspag\API;


class Client
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $secret;

    /**
     * Client constructor.
     * @param string $id
     * @param string $secret
     */
    public function __construct(string $id, string $secret)
    {
        $this->id = $id;
        $this->secret = $secret;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSecret()
    {
        return $this->secret;
    }
}