<?php

namespace Decorator;

use Entity\Advertisement;
use External\facebookAdvertisement;

class AdvertisementDecorator
{
    private Advertisement $advertisement;
    private string $advertisementMassage;

    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    public function prepareAdvertisementMassage(): AdvertisementDecorator
    {
        $this->advertisementMassage = $this->advertisement->getTitle()."<h1>Внимание</h1>".$this->advertisement->getBody()."<h4>Ждём вас</h4>";
        return $this;
    }

    /**
     * @return string
     */
    public function getAdvertisementMassage(): string
    {
        return $this->advertisementMassage;
    }

    /**
     * @param string $advertisementMassage
     */
    public function setAdvertisementMassage(string $advertisementMassage): AdvertisementDecorator
    {
        $this->advertisementMassage = $advertisementMassage;
        return $this;
    }
}