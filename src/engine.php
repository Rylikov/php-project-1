<?php

/**
 * Command Line functions to interraction with user
 *
 * PHP version 7.3
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   Rinat Salimyanov <rinatsin@gmail.com>
  */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

/**
 * Function run game
 *
 * @param array  $getGameData save game param to variable
 * @param string $description save game rules
 *
 * @return void
 */
function run($getGameData, $description)
{
    line("Welcome To The Brain Games!");
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData = $getGameData();
        $question = $gameData['question'];
        $currentAnswer = $gameData['currentAnswer'];
        $userAnswer = prompt("Question: {$question}");
        if ($userAnswer !== $currentAnswer) {
            line(" '%s' is wrong answer ;(.", $userAnswer);
            line("Correct answer was '%s'.Let's try again, %s!", $currentAnswer, $name);
            exit;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s", $name);
}
