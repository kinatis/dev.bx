<?php

namespace State;

use Event\EventBus;

class StrangeState extends AbstractState
{

    public function activate()
    {
        // TODO: Implement activate() method.
    }

    public function pause()
    {
        // TODO: Implement pause() method.
    }

    public function cancel()
    {
        // TODO: Implement cancel() method.
    }

    public function strange()
    {
        EventBus::getInstance()->publish("setIsStrange", $this);
        $this->service->setIsStrange(true);
    }

    public function changeState()
    {

        return $this;
    }


}