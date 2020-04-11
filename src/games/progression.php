<?php

/**
 * Command Line functions release game Arithmetic Progression
 *
 * PHP version 7.3
 *
 * @category PHP
 * @package  Php-project-lvl1
  MIT
 
 */

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = "What number is missing in the progression?";
const MAX_RANDOM_VALUE = 35;
const PROGRESSION_LENGTH = 10;

/**
 * Function generate random arithmetic progression
 *
 * @param int $start             first value of progression
 * @param int $diff              progression step
 * @param int $progressionLength length of progression
 *
 * @return array
 */
function getProgression($start, $diff, $progressionLength)
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $start + $diff * $i;
    }
    return $progression;
}

/**
 * Function run game progression
 *
 * @return void
 */
function runProgression()
{
    $getProgressionData = function () {
        $hiddenElementIndex = mt_rand(0, PROGRESSION_LENGTH - 1);
        $firstValue = mt_rand(1, MAX_RANDOM_VALUE);
        $diff = mt_rand(1, MAX_RANDOM_VALUE);
        $progression = getProgression($firstValue, $diff, PROGRESSION_LENGTH);
        $progressionWithHideElement = $progression;
        $progressionWithHideElement[$hiddenElementIndex] = '..';

        $currentAnswer = strval($progression[$hiddenElementIndex]);
        $question = implode(' ', $progressionWithHideElement);

        $gameData = [];
        $gameData['currentAnswer'] = $currentAnswer;
        $gameData['question'] = $question;
        return $gameData;
    };
    
    run($getProgressionData, DESCRIPTION);
}
