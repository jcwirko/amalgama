<?php

namespace Amalgama\App\Civilization;

use Amalgama\App\Civilization;

class English extends Civilization
{
    public function __construct()
    {
        $this->initialPikermans = 10;
        $this->initialArchers = 10;
        $this->initialKnights = 10;
    }
}