<?php

namespace External;

class facebookAdvertisementResult
{
    private string $targetingName;

    /**
     * @return string
     */
    public function getTargetingName(): string
    {
        return $this->targetingName;
    }

    /**
     * @param string $targetingName
     */
    public function setTargetingName(string $targetingName): facebookAdvertisementResult
    {
        $this->targetingName = $targetingName;
        return $this;
    }
}