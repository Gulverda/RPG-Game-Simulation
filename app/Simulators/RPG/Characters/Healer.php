<?php

namespace App\Simulators\RPG\Characters;

class Healer extends Character
{
    public function heal(Character $ally)
    {
        $healAmount = 10;
        echo "{$this->name} heals {$ally->getName()} for $healAmount health!\n";
        $ally->takeDamage(-$healAmount); // Negative damage is healing
    }

    public function attack(Character $opponent)
    {
        $damage = $this->attackPower / 2; // Healers deal less damage
        echo "{$this->name} attacks {$opponent->getName()} for $damage damage!\n";
        $opponent->takeDamage($damage);
    }
}
