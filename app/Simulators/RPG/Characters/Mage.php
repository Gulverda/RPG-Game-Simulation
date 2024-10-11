<?php

namespace App\Simulators\RPG\Characters;

class Mage extends Character
{
    public function attack(Character $opponent)
    {
        $damage = $this->attackPower * 1.5;  // Assume Mage does more damage
        echo "\033[32m{$this->name} casts a spell on {$opponent->getName()}!\033[0m\n";
        echo "\033[31m{$opponent->getName()} takes $damage damage!\033[0m\n";  // Red damage text
        $opponent->takeDamage($damage);
    }
}
