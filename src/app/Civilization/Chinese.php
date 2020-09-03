<?php

namespace Amalgama\App\Civilization;

use Amalgama\App\Civilization;

class Chinese extends Civilization
{
    public function __construct()
    {
        $this->initialPikermans = 2;
        $this->initialArchers = 25;
        $this->initialKnights = 2;
    }
}