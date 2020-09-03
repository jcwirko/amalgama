<?php

namespace Amalgama\App\Civilization;

use Amalgama\App\Civilization;

class Byzantines extends Civilization
{
    public function __construct()
    {
        $this->initialPikermans = 5;
        $this->initialArchers = 8;
        $this->initialKnights = 15;
    }
}