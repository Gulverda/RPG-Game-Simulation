<?php

namespace App\Simulators\RPG\Characters;

abstract class Character
{
    protected $name;
    protected $health;
    protected $attackPower;

    public function __construct($name, $health, $attackPower)
    {
        $this->name = $name;
        $this->health = $health;
        $this->attackPower = $attackPower;
    }

    abstract public function attack(Character $opponent);

    public function takeDamage($damage)
    {
        $this->health -= $damage;
        if ($this->health < 0) {
            $this->health = 0;
        }
    }

    public function isAlive()
    {
        return $this->health > 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHealth()
    {
        return $this->health;
    }
}
