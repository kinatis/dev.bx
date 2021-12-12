<?php

namespace External;

class facebookAdvertisement
{
    private string $header;
    private string $body;

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header): facebookAdvertisement
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): facebookAdvertisement
    {
        $this->body = $body;
        return $this;
    }
}