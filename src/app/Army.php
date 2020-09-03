<?php

namespace Amalgama\App;

use Amalgama\Common\Message;

class Army
{
    public $name;
    public $coins;
    public $units;
    private $civilization;
    private $loserShouldRemove;
    private $bothShouldRemove;

    public function __construct(string $name, Civilization $civilization)
    {
        $this->name = $name;
        $this->coins = 1000;
        $this->civilization = $civilization;
        $this->loserShouldRemove = 2;
        $this->bothShouldRemove = 1;
        $this->addPikermans();
        $this->addArchers();
        $this->addKnights();

        Message::info("<br>Army {$name} created with {$this->coins} coins");
    }

    public function hasGoldAvailable(int $trainingCost)
    {
        return $this->coins >= $trainingCost;
    }

    public function substractCoins(int $coins)
    {
        $this->coins -= $coins;

        Message::info("Actual coins: {$this->coins}");
    }

    public function addCoins(int $coins)
    {
        $this->coins += $coins;

        Message::info("Added coins: {$this->coins}");
    }

    public function addUnit(Unit $unit)
    {
        $this->units[] = $unit;
        $unit->setArmy($this);
    }

    public function attack(Army $opponent)
    {
        Message::info("<br>{$this->name} attacks to {$opponent->name}");

        if($this->isAttackerWinner($opponent)) {
            $this->addCoins(100);
            $opponent->removeUnitsWithMaxPoints($opponent, $opponent->loserShouldRemove);

            return $this;
        }

        if($this->isAttackerLoser($opponent)) {
            $opponent->addCoins(100);
            $this->removeUnitsWithMaxPoints($this, $this->loserShouldRemove);

            return $opponent;
        }

        $this->removeUnitsWithMaxPoints($this, $this->bothShouldRemove);
        $opponent->removeUnitsWithMaxPoints($opponent, $opponent->bothShouldRemove);

        return null;
    }

    private function removeUnitsWithMaxPoints(Army $army, int $quantity)
    {
        $units = (array)$army->units;

        echo '*******';
        var_dump(gettype($units[0]['unitType']));
        echo '*******';

        usort($units, function($a, $b) {
            return $a['unitType']['strengthPoints'] <=> $b['unitType']['strengthPoints'];
        });

        var_dump(end($units));

        for($i = 0; $i < $quantity; $i++) {
            //  $unitToRemove = array_search(max(array_column(array_column((array)$army->units, 'unitType'), 'strengthPoints')), $army->units);
            //unset('');
            Message::info('Unit has been removed');
        }
    }

    private function addPikermans()
    {
        for($i = 0; $i < $this->civilization->initialPikermans; $i++) {
            $this->addUnit(new Unit(UnitType::getPikermanInstance()));
        }
    }

    private function addArchers()
    {
        for($i = 0; $i < $this->civilization->initialArchers; $i++) {
            $this->addUnit(new Unit(UnitType::getArcherInstance()));
        }
    }

    private function addKnights()
    {
        for($i = 0; $i < $this->civilization->initialKnights; $i++) {
            $this->addUnit(new Unit(UnitType::getKnightInstance()));
        }
    }

    private function isAttackerWinner(Army $opponent)
    {
        return $this->getTotalPoints() > $opponent->getTotalPoints();
    }

    private function isAttackerLoser(Army $opponent)
    {
        return $this->getTotalPoints() < $opponent->getTotalPoints();
    }

    private function getTotalPoints()
    {
        $total = 0;

        foreach($this->units as $unit) {
            $total += $unit->unitType->strengthPoints;
        }

        return $total;
    }
}