<?php

namespace App\Console\Commands;

use Illuminate\Contracts\Cache\Repository as CacheRepo;

use Illuminate\Console\Command;

class RoulleteStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all statisics of russian roullete game';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private CacheRepo $register;

    public function __construct(CacheRepo $register)
    {
        $this->register = $register;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   $compWins = 0;
        $playerWins = 0;
        $arr = $this->register->get('stats', []);
        $length = count($arr) ?? 0;
        for($i = 0; $i < $length; $i++){
            if($i%2==1 && $arr[$i]=="Won"){
                $compWins++;
            }else  if($i%2==1 && $arr[$i]=="Lost"){
                $playerWins++;
            }
        }
        $tab = array_chunk($arr,5);
        $totalGames = count($tab) ?? 0;
        $this->info('List of Games');
        $this->table(['Bullet', 'Computer', "Player", "Laps", "Time"], $tab);
        $this->info('Overall Statistic');
        $this->table(["Computer' Wins", "Player's Wins", "Total Games"], [[$compWins, $playerWins, $totalGames]]);
       

    }
}
