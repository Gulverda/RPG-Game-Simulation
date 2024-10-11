<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Simulators\RPG\Characters\Warrior;
use App\Simulators\RPG\Characters\Mage;
use App\Simulators\RPG\Battle\Battle;

class SimulateBattle extends Command
{
    protected $signature = 'simulate:battle';
    protected $description = 'Simulate a battle between RPG characters with progress bar and step-by-step actions';

    public function handle()
    {
        // Create the characters
        $warrior = new Warrior('Aragorn', 100, 20);
        $mage = new Mage('Gandalf', 80, 25);

        // Initialize the battle simulator
        $battle = new Battle();
        $battle->start($warrior, $mage);

        return 0;
    }
}
