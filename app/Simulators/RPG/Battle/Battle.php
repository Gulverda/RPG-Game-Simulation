<?php

namespace App\Simulators\RPG\Battle;

use App\Simulators\RPG\Characters\Character;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class Battle
{
    protected $output;

    public function __construct()
    {
        // Setup ConsoleOutput to send messages to the console
        $this->output = new ConsoleOutput();
    }

    public function start(Character $character1, Character $character2)
    {
        // Create a progress bar for the battle
        $progressBar = new ProgressBar($this->output, 100);
        $progressBar->setBarWidth(50);
        $progressBar->start();

        $this->output->writeln("<info>The battle between {$character1->getName()} and {$character2->getName()} begins!</info>");

        // Start battle steps
        $rounds = 0;
        $maxRounds = 12; // Let's assume max N rounds
        
        while ($character1->isAlive() && $character2->isAlive() && $rounds < $maxRounds) {
            $this->simulateStep($character1, $character2, $progressBar, $rounds, $maxRounds);
            if (!$character2->isAlive()) {
                $this->output->writeln("<fg=green>{$character2->getName()} has been defeated!</>");
                break;
            }

            $this->simulateStep($character2, $character1, $progressBar, $rounds, $maxRounds);
            if (!$character1->isAlive()) {
                $this->output->writeln("<fg=green>{$character1->getName()} has been defeated!</>");
            }

            $rounds++;
        }

        $progressBar->finish();
        $this->output->writeln("\n<info>The battle is over!</info>");
    }

    protected function simulateStep(Character $attacker, Character $defender, ProgressBar $progressBar, &$rounds, $maxRounds)
    {
        sleep(2); // Simulate time delay for the step-by-step experience
        $attacker->attack($defender);
        $this->updateProgress($progressBar, $rounds, $maxRounds);
    }

    protected function updateProgress(ProgressBar $progressBar, &$rounds, $maxRounds)
    {
        // Increment the progress bar as the battle goes on
        $percentProgress = ($rounds / $maxRounds) * 100;
        $progressBar->advance((int)($percentProgress));
    }
}
