<?php

namespace External;

class FacebookPublicator
{
    public function publicate(facebookAdvertisement $advertisement): facebookAdvertisementResult
    {
        //...

        return (new facebookAdvertisementResult())->setTargetingName("response");
    }
}