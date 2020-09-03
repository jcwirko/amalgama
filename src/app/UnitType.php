<?php

namespace Amalgama\App;

use Amalgama\Values\UnitTypeValues;

class UnitType
{
    public $strengthPoints;
    public $trainingCost;
    public $pointsEarned;
    public $transformationCost;
    public $type;

    static private $pickermanInstance = null;
    static private $archerInstance = null;
    static private $knightInstance = null;

    public function __construct(string $type, int $strengthPoints, int $trainingCost, int $pointsEarned, int $transformationCost) {
        $this->type = $type;
        $this->strengthPoints = $strengthPoints;
        $this->trainingCost = $trainingCost;
        $this->pointsEarned = $pointsEarned;
        $this->transformationCost = $transformationCost;
    }

    static public function getPikermanInstance()
    {
        if(is_null(self::$pickermanInstance)) {
            self::$pickermanInstance = self::getInstance(UnitTypeValues::PIKERMAN);
        }

        return self::$pickermanInstance;
    }

    static public function getArcherInstance()
    {
        if(is_null(self::$archerInstance)) {
            self::$archerInstance = self::getInstance(UnitTypeValues::ARCHER);
        }

        return self::$archerInstance;
    }

    static public function getKnightInstance()
    {
        if(is_null(self::$knightInstance)) {
            self::$knightInstance = self::getInstance(UnitTypeValues::KNIGHT);
        }

        return self::$knightInstance;
    }

    private static function getInstance(array $unitType)
    {
        return new UnitType(
            $unitType['type'],
            $unitType['strength_points'],
            $unitType['training_cost'],
            $unitType['points_earned'],
            $unitType['transformation_cost'],
        );
    }
}
