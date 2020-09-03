<?php

namespace Amalgama\App;

use Amalgama\Common\Message;
use Amalgama\Values\UnitTypeValues;

class Unit
{
    const TRANSFORM_TO = [
        UnitTypeValues::PIKERMAN['type'] => UnitTypeValues::ARCHER['type'],
        UnitTypeValues::ARCHER['type'] => UnitTypeValues::KNIGHT['type'],
        UnitTypeValues::KNIGHT['type'] => null
    ];

    public $unitType;
    public $army;

    public function __construct(UnitType $unitType)
    {
        $this->unitType = $unitType;
    }

    public function train(): void
    {
        if($this->army->hasGoldAvailable($this->unitType->trainingCost)) {
            $this->addStrengthPoints($this->unitType->pointsEarned);
            $this->army->substractCoins($this->unitType->trainingCost);

            Message::info('Unit has trained');
        }
    }

    public function transform()
    {
        if($this->army->hasGoldAvailable($this->unitType->transformationCost) && $this->canBeTransformed()) {
            $this->unitType->type = self::TRANSFORM_TO[$this->unitType->type];
            $this->army->substractCoins($this->unitType->trainingCost);

            Message::info("Unit has transformed to ".$this->unitType->type);
        }
    }

    public function setArmy(Army $army)
    {
        $this->army = $army;
    }

    private function canBeTransformed()
    {
        return self::TRANSFORM_TO[$this->unitType->type];
    }

    private function addStrengthPoints(int $points)
    {
        $this->unitType->strengthPoints += $points;

        Message::info('Strength Points earned: '.$this->unitType->strengthPoints);
    }
}
