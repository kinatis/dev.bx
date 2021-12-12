<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\facebookAdvertisement;
use External\facebookAdvertisementResult;
use External\FacebookPublicator;

class FacebookAdvertisementProviderAdapter implements \Service\AdvertisementProviderInterface
{

    public function publicate(Advertisement $advertisement): AdvertisementResponse
    {
        $FacebookAdvertisement = new FacebookAdvertisement();

        if (!$advertisement->getTitle())
        {
            $advertisement->setTitle("default");
        }
        $FacebookAdvertisement
            ->setHeader($advertisement->getTitle())
            ->setBody($advertisement->getBody());

        $result = (new FacebookPublicator())->publicate($FacebookAdvertisement);

       return (new AdvertisementResponse())->setTargeting($result->getTargetingName());
    }

    public function prepare(Advertisement $advertisement)
    {
        // TODO: Implement prepare() method.
    }

    public function check(Advertisement $advertisement)
    {
        // TODO: Implement check() method.
    }

    public function calculateDuration(Advertisement $advertisement)
    {
        // TODO: Implement calculateDuration() method.
    }
}