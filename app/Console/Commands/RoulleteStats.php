<?php

namespace App\Console\Commands;

use Carbon\Carbon;
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
    {
        if($this->register->get('bool', false)){
            $this->register->set('stats', [...$this->register->get('stats',[]), $this->register->get('The Computer', '-'), $this->register->get('You', '-'), $this->register->get('barrels', 0), Carbon::now()]);
        }
        $this->register->set('bool', false);
        $compWins = 0;
        $playerWins = 0;
        $arr = $this->register->get('stats', []);
        $length = count($arr) ?? 0;
        for($i = 0; $i < $length; $i++){
            if($i%2==0 && $arr[$i]=="Won"){
                $compWins++;
            }else  if($i%2==1 && $arr[$i]=="Won"){
                $playerWins++;
            }
        }
        $tab = array_chunk($arr,4);
        $totalGames = count($tab) ?? 0;
       
       
        $this->info('List of Games');
        $this->table(['Computer', 'Player', "barrels", "time"], $tab);
        $this->info('Overall Statistic');
        $this->table(["Computer' Total", "Player's total", "Total games"], [[$compWins, $playerWins, $totalGames]]);
       

    }
}
