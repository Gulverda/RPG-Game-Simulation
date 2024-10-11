<?php

namespace App\Simulators\RPG\Characters;

class Warrior extends Character
{
    public function attack(Character $opponent)
    {
        $damage = $this->attackPower;
        echo "\033[32m{$this->name} attacks {$opponent->getName()} with physical force!\033[0m\n";
        echo "\033[31m{$opponent->getName()} takes $damage damage!\033[0m\n";  // Red damage text
        $opponent->takeDamage($damage);
    }
}
