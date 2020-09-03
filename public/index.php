<?php

namespace App;

use Amalgama\App\Army;
use Amalgama\App\Civilization\Byzantines;
use Amalgama\App\Civilization\Chinese;
use Amalgama\Common\Message;

require '../vendor/autoload.php';

if (!file_exists('../log/')) {
    mkdir('../log/', 0777, true);
}

//CHINESE ARMY
$chinese = new Chinese();
$chineseArmy = new Army('Chin', $chinese);

$chineseUnits = count($chineseArmy->units) - 1;

$chineseArmy->units[rand(0, $chineseUnits)]->train();
$chineseArmy->units[rand(0, $chineseUnits)]->train();
$chineseArmy->units[rand(0, $chineseUnits)]->train();
$chineseArmy->units[rand(0, $chineseUnits)]->train();
$chineseArmy->units[rand(0, $chineseUnits)]->transform();
$chineseArmy->units[rand(0, $chineseUnits)]->transform();

//BYZANTINE ARMY
$byzantines = new Byzantines();
$byzantinesArmy = new Army('Byz', $byzantines);

$byzantinesUnits = count($byzantinesArmy->units) - 1;

var_dump('<br><br>-------- UNITS');
echo '<pre>' . var_dump(count($byzantinesArmy->units), true) . '</pre>';

$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->train();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->transform();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->transform();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->transform();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->transform();
$byzantinesArmy->units[rand(0, $byzantinesUnits)]->transform();

$winner = $chineseArmy->attack($byzantinesArmy);

if(is_null($winner)) {
    Message::info("The fight was a draw");
}else{
    Message::info("The winner is {$winner->name}");
}

var_dump('<br><br>-------- UNITS');
echo '<pre>' . var_dump(count($byzantinesArmy->units), true) . '</pre>';
