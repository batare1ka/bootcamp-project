<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepo;

class RussianRoulette extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:roulette';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Play the russian roulette game.";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private CacheRepo $register;
    private $players = ['The Computer' => 0, 'You' => 0];
    private $barrels = 5;
    private $bullet = 0;
    private $laps = 0;
    private $computer;
    private $player;
    private $bool;

    public function register_stats(){
        if($this->bool){
            $this->register->set('stats', [...$this->register->get('stats',[]), 
            $this->laps,
            $this->computer,
            $this->player, 
             $this->bullet,
              Carbon::now()], 60*60*24);
        }
        $this->bool = false;
    }

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
    private function status()
    {
        $this->info("\n\t\tLaps played {$this->laps}.\n\t\tBarrels {$this->barrels}.");
    }
    private function play()
    {
        $this->rules();
        sleep(2);
        system('clear');
        $this->bullet = random_int(1, $this->barrels);
        while (true) {

            $this->laps++;

            $this->info("\n\n\t\t
                 __        __     ___       __        
            \ / /  \ |  | |__)     |  |  | |__) |\ |  
             |  \__/ \__/ |  \     |  \__/ |  \ | \| .
                                                      ");

            sleep(2);

            $this->players['You'] = random_int(1, $this->bullet);

            if ($this->players['You'] === $this->bullet) {
                system('clear');
                $this->info("\n\n\t\t
                 __   __   __             /  /  /
                |__) /  \ /  \  |\/|     /  /  / 
                |__) \__/ \__/  |  |    .  .  .  
                                                 \n\t\t");

                sleep(2);
                system('clear');
                $this->info("\n\t\t
                     __           __     ___  __  
                \ / /  \ |  |    |  \ | |__  |  \ 
                 |  \__/ \__/    |__/ | |___ |__/ 
                                                  \n");
                sleep(2);
                system('clear');
                $this->info("\n\t\t
                 __   __         __       ___  ___  __           __       
                /  ` /  \  |\/| |__) |  |  |  |__  |__)    |  | /  \ |\ | 
                \__, \__/  |  | |    \__/  |  |___ |  \    |/\| \__/ | \| 
                                                                          ");
                $this->status();
                $this->info("\n\t\t
                ´´´´´´´´´´´´´´´´´´´ ¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶´´´´´´´´´´´´´´´´´´´`
                ´´´´´´´´´´´´´´´´´¶¶¶¶¶¶´´´´´´´´´´´´´¶¶¶¶¶¶¶´´´´´´´´´´´´´´´´
                ´´´´´´´´´´´´´´¶¶¶¶´´´´´´´´´´´´´´´´´´´´´´´¶¶¶¶´´´´´´´´´´´´´´
                ´´´´´´´´´´´´´¶¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´´´´´´´´´´´
                ´´´´´´´´´´´´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´´´´´´´´´´
                ´´´´´´´´´´´¶¶´´´´´´´´´´´´´´´´´´´´´`´´´´´´´´´´´¶¶´´´´´´´´´´`
                ´´´´´´´´´´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´´´´´´´´´
                ´´´´´´´´´´¶¶´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´¶¶´´´´´´´´´´
                ´´´´´´´´´´¶¶´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´¶´´´´´´´´´´
                ´´´´´´´´´´¶¶´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´¶´´´´´´´´´´
                ´´´´´´´´´´¶¶´´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´¶¶´´´´´´´´´´
                ´´´´´´´´´´¶¶´´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´¶¶´´´´´´´´´´
                ´´´´´´´´´´´¶¶´¶¶´´´¶¶¶¶¶¶¶¶´´´´´¶¶¶¶¶¶¶¶´´´¶¶´¶¶´´´´´´´´´´´
                ´´´´´´´´´´´´¶¶¶¶´¶¶¶¶¶¶¶¶¶¶´´´´´¶¶¶¶¶¶¶¶¶¶´¶¶¶¶¶´´´´´´´´´´´
                ´´´´´´´´´´´´´¶¶¶´¶¶¶¶¶¶¶¶¶¶´´´´´¶¶¶¶¶¶¶¶¶¶´¶¶¶´´´´´´´´´´´´´
                ´´´´¶¶¶´´´´´´´¶¶´´¶¶¶¶¶¶¶¶´´´´´´´¶¶¶¶¶¶¶¶¶´´¶¶´´´´´´¶¶¶¶´´´
                ´´´¶¶¶¶¶´´´´´¶¶´´´¶¶¶¶¶¶¶´´´¶¶¶´´´¶¶¶¶¶¶¶´´´¶¶´´´´´¶¶¶¶¶¶´´
                ´´¶¶´´´¶¶´´´´¶¶´´´´´¶¶¶´´´´¶¶¶¶¶´´´´¶¶¶´´´´´¶¶´´´´¶¶´´´¶¶´´
                ´¶¶¶´´´´¶¶¶¶´´¶¶´´´´´´´´´´¶¶¶¶¶¶¶´´´´´´´´´´¶¶´´¶¶¶¶´´´´¶¶¶´
                ¶¶´´´´´´´´´¶¶¶¶¶¶¶¶´´´´´´´¶¶¶¶¶¶¶´´´´´´´¶¶¶¶¶¶¶¶¶´´´´´´´´¶¶
                ¶¶¶¶¶¶¶¶¶´´´´´¶¶¶¶¶¶¶¶´´´´¶¶¶¶¶¶¶´´´´¶¶¶¶¶¶¶¶´´´´´´¶¶¶¶¶¶¶¶
                ´´¶¶¶¶´¶¶¶¶¶´´´´´´¶¶¶¶¶´´´´´´´´´´´´´´¶¶¶´¶¶´´´´´¶¶¶¶¶¶´¶¶¶´
                ´´´´´´´´´´¶¶¶¶¶¶´´¶¶¶´´¶¶´´´´´´´´´´´¶¶´´¶¶¶´´¶¶¶¶¶¶´´´´´´´´
                ´´´´´´´´´´´´´´¶¶¶¶¶¶´¶¶´¶¶¶¶¶¶¶¶¶¶¶´¶¶´¶¶¶¶¶¶´´´´´´´´´´´´´´
                ´´´´´´´´´´´´´´´´´´¶¶´¶¶´¶´¶´¶´¶´¶´¶´¶´¶´¶¶´´´´´´´´´´´´´´´´´
                ´´´´´´´´´´´´´´´´¶¶¶¶´´¶´¶´¶´¶´¶´¶´¶´¶´´´¶¶¶¶¶´´´´´´´´´´´´´´
                ´´´´´´´´´´´´¶¶¶¶¶´¶¶´´´¶¶¶¶¶¶¶¶¶¶¶¶¶´´´¶¶´¶¶¶¶¶´´´´´´´´´´´´
                ´´´´¶¶¶¶¶¶¶¶¶¶´´´´´¶¶´´´´´´´´´´´´´´´´´¶¶´´´´´´¶¶¶¶¶¶¶¶¶´´´´
                ´´´¶¶´´´´´´´´´´´¶¶¶¶¶¶¶´´´´´´´´´´´´´¶¶¶¶¶¶¶¶´´´´´´´´´´¶¶´´´
                ´´´´¶¶¶´´´´´¶¶¶¶¶´´´´´¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶´´´´´¶¶¶¶¶´´´´´¶¶¶´´´´
                ´´´´´´¶¶´´´¶¶¶´´´´´´´´´´´¶¶¶¶¶¶¶¶¶´´´´´´´´´´´¶¶¶´´´¶¶´´´´´´
                ´´´´´´¶¶´´¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶´´¶¶´´´´´´
                ´´´´´´´¶¶¶¶´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´´¶¶¶¶´´´´´´´"
            );
             $this->computer = "Won";
             $this->player = "Lost";
                break;
            } else {

                $this->info("\n\n\t\t
                   __      ___        __  ___          /  /  /
                | /__`    |__   |\/| |__)  |  \ /     /  /  / 
                | .__/    |___  |  | |     |   |     .  .  .  
                                                              \n");
            }

            sleep(2);
            system('clear');

            $this->info("\n\n\t\t
             __   __         __       ___  ___  __  .  __     ___       __        
            /  ` /  \  |\/| |__) |  |  |  |__  |__) ' /__`     |  |  | |__) |\ |  
            \__, \__/  |  | |    \__/  |  |___ |  \   .__/     |  \__/ |  \ | \| .
                                                                                  ");
            sleep(2);
            $this->players['The Computer'] = random_int(1, $this->barrels);

            if ($this->players['The Computer'] === $this->bullet) {
                system('clear');
                $this->info("\n\n\t\t
                 __   __   __             /  /  /
                |__) /  \ /  \  |\/|     /  /  / 
                |__) \__/ \__/  |  |    .  .  .  
                                                 \n\t\t");

                sleep(2);
                system('clear');
                $this->info("\n\t\t
                 __   __         __       ___  ___  __      __     ___  __   
                /  ` /  \  |\/| |__) |  |  |  |__  |__)    |  \ | |__  |  \  
                \__, \__/  |  | |    \__/  |  |___ |  \    |__/ | |___ |__/ .
                                                                             \n");
                sleep(2);
                system('clear');
                $this->info("\n\t\t
                     __                __            /  /  /
                \ / /  \ |  |    |  | /  \ |\ |     /  /  / 
                 |  \__/ \__/    |/\| \__/ | \|    .  .  .  
                                                            ");
                sleep(2);
                system('clear');
                $this->info("\n\t\t
                 __   __        __   __       ___                ___    __        __  
                /  ` /  \ |\ | / _` |__)  /\   |  |  | |     /\   |  | /  \ |\ | /__` 
                \__, \__/ | \| \__> |  \ /~~\  |  \__/ |___ /~~\  |  | \__/ | \| .__/ 
                                                                                      ");
                $this->status();
                $this->info("\n\t\t
                ┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌█████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌███████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌███┌┌┌██┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌██┌┌┌┌██┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌███┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌███┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌██┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌███┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌██┌┌┌┌┌┌████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌┌┌██┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌███┌███┌┌┌┌┌┌┌┌┌┌██┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌████████████┌┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌
                ┌┌████████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌
                ┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌█████████┌┌
                ███┌┌┌┌█████████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌█████┌
                ██┌┌┌███████┌████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌███┌
                ██┌┌┌┌███┌┌┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ███┌┌┌┌┌┌┌┌┌┌┌█████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌███┌┌┌┌┌┌┌████████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌┌████████████┌┌┌████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌███┌██████┌┌┌┌┌┌┌████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌███┌┌┌┌┌┌┌┌┌┌┌██████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌┌████┌████┌██████████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌██┌
                ┌┌┌████████████┌┌┌┌┌███┌┌┌┌┌┌┌┌┌┌┌┌┌███┌
                ┌┌┌┌██┌┌┌┌┌┌┌┌┌┌┌███████┌┌┌┌┌┌┌███████┌┌
                ┌┌┌┌████┌┌┌┌┌┌████████┌┌┌┌┌┌┌┌████████┌┌
                ┌┌┌┌┌████████████┌┌┌███┌┌┌┌┌███┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌███┌█┌█┌┌┌┌┌┌███┌┌┌███┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌███┌┌┌┌┌┌█████┌┌█████┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌██████████████████┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌██████████████┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌
                ┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌┌");
                $this->computer = "Lost";
                $this->player = "Won";
                break;
            } else {
                $this->info("\n\n\t\t
                   __      ___        __  ___          /  /  /
                | /__`    |__   |\/| |__)  |  \ /     /  /  / 
                | .__/    |___  |  | |     |   |     .  .  .  
                                                              \n");
                sleep(2);
                system('clear');
                $this->status();
                $this->info("\n\n
                 __  _____           __  ___    _____                         ___ 
                |__)/  \||__|    /\ |__)|__    /__`|||   |       /\ |   |\  /|__  
                |__)\__/||  |   /~~\|  \|___   .__/|||___|___   /~~\|___| \/ |___.
                                                                                  ");
                sleep(3);
                system('clear');
            }
        }

        $this->bool = true;
        $this->register_stats();
    }
    private function abort()
    {
        $this->info("\n\n\t\t
                       ___             __   __             __   __       /
        |  | |__|  /\   |      /\     /  ` /  \ |  |  /\  |__) |  \     / 
        |/\| |  | /~~\  |     /~~\    \__, \__/ |/\| /~~\ |  \ |__/    .  
                                                                          \n\n\t\t
            ___________1¶¶¶¶¶¶¶¶¶¶1__________1¶¶¶¶¶¶¶¶1_______
            ________¶11____________¶11______¶1________¶¶1_____
            ______¶1___¶¶1_____1¶¶___1¶¶___¶____________¶¶____
            ____¶1____1¶1¶_____¶1¶¶_____1¶¶¶____111111111¶¶___
            __1¶______1¶¶¶_____¶¶¶1_____1¶¶____¶¶¶¶¶¶¶¶¶¶¶¶¶1_
            __¶_______1¶¶¶_____¶¶¶1____¶¶___________________¶¶
            _¶__________1_______1______¶¶___________________1¶
            ¶__________________________1¶1_________________1¶¶
            ¶___________________________1¶¶____¶¶¶¶¶¶¶¶¶¶¶¶¶__
            ¶__________111_____111_______1¶_______________1¶__
            ¶________¶¶¶¶¶¶¶¶¶¶¶¶¶¶1_____1¶________________1¶_
            ¶_______¶¶____1¶¶¶____1¶¶_____1¶1_____________1¶1_
            ¶______11______________¶¶_______¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶___
            _¶__________________________11__¶1¶_____¶1________
            _1¶_________________________1__¶1_¶_____¶¶________
            __¶¶_____________________111__¶¶__¶______¶¶_______
            ____¶¶________________111___¶¶____¶______¶¶_______
            _____1¶1________111111____1¶1_____¶¶¶¶¶¶¶_________
            _______¶¶¶11___________1¶¶¶_________1111__________
            __________111¶111111¶111__________________________
            ");
    }
    private function rules()
    {
        system('clear');
        $this->info("\t
         __             ___  __   
        |__) |  | |    |__  /__` .
        |  \ \__/ |___ |___ .__/ .
                                  \n");
        sleep(2);
        $this->info("\t1)There are two players you and the computer.\n");
        sleep(2);
        $this->info("\t2)The gun is loaded with one bullet.\n");
        sleep(2);
        $this->info("\t3)Each player in turn raises a gun to their forehead and pulls the trigger.\n");
        sleep(2);
        $this->info("\t4)The game continues till there is only one player alive.");
        sleep(4);
        system('clear');
    }
    public function handle()
    {
        $this->info("\n\t\t
        111111¶11111111111111111111111111111111111111 
        111111¶11111111111111111111111111111111111111
        111111¶¶1111111111111111111111111111111111111
        111111¶¶1111111111111111111111111111111111111
        11¶111¶11111111111111111111111111111111111111
        11¶¶1¶¶11111111111111111111111111111111111111
        111¶1¶¶11111111111111111111111111111111111111
        111¶11¶¶1111111111111111111111111111111111111
        11¶¶11¶¶1111111111111111111111111111111111111
        11¶¶11¶¶1111111111111111111111111111111111111
        1¶¶11¶¶11111111111111111111111111111111111111
        ¶¶11¶¶111111111111111111111111111111111111111
        ¶¶1¶¶1111111111111111111111111111111111111111
        ¶¶¶¶11111111111111111111111111111111111111111
        1¶¶111111111111111111111111111111111111111111
        11¶¶1111¶¶11111111111111111111111111111111111
        111¶11¶¶¶¶¶1111111111111111111111111111111111
        11111¶¶11¶¶¶111111111111111111111111111111111
        1111¶¶¶1111¶¶¶1111111111111111111111111111111
        111¶¶¶¶¶¶1111¶¶¶11111111111111111111111111111
        1111¶¶¶¶¶¶¶1111¶¶¶111111111111111111111111111
        111111¶¶¶¶¶¶¶¶1111¶¶¶111111111111111111111111
        11111111¶¶¶¶¶¶¶¶1111¶¶¶1111111111111111111111
        11111111111¶¶¶¶¶¶¶¶111¶¶¶¶1111111111111111111
        1111111111111¶¶¶¶¶¶¶¶111¶¶¶¶11111111111111111
        111111111111111¶¶¶¶¶¶¶¶11¶¶¶¶¶¶11111111111111
        111111111111111111¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶111111111111
        1111111111111111111¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶111111111
        1111111111111111111¶¶1¶¶¶1¶¶¶¶¶¶1¶¶¶¶¶¶111111
        1111111111111111111¶1¶¶¶¶¶¶¶1¶¶¶1¶¶1¶¶¶¶11111
        1111111111111111111¶¶¶¶¶¶¶¶¶¶¶11¶¶1¶¶1¶¶¶1111
        1111111111111111111¶¶¶¶¶¶¶¶¶¶¶1¶¶¶¶¶¶¶11¶¶111
        1111111111111111111¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶¶111
        1111111111111111111111¶¶¶¶¶¶¶¶¶¶¶¶¶¶11¶11¶¶11
        111111111111111111111111¶¶¶¶¶¶¶¶¶¶¶¶¶¶1¶¶¶¶¶¶
        111111111111111111111111¶¶¶¶¶¶¶¶¶111¶¶¶¶111¶¶
        111111111111111111111111¶¶¶111¶¶¶11111¶¶¶1111
        111111111111111111111111¶¶¶111¶¶¶¶111111¶¶111
        111111111111111111111111¶¶¶11¶¶¶¶¶11¶¶11¶1111
        111111111111111111111111¶¶¶¶11¶11¶1¶¶¶¶1¶¶111
        11111111111111111111111111¶¶¶¶11¶¶1¶¶¶¶¶1¶111
        1111111111111111111111111111¶¶¶¶¶11¶¶¶¶¶1¶¶11
        111111111111111111111111111111¶¶¶1¶¶¶¶¶¶1¶¶11
        111111111111111111111111111111¶¶11¶¶¶¶¶¶1¶¶11
        111111111111111111111111111111¶¶1¶¶¶¶¶¶¶1¶111
        11111111111111111111111111111¶¶1¶¶¶¶¶¶¶¶1¶111
        11111111111111111111111111111¶11¶¶¶¶¶¶¶1¶¶111
        1111111111111111111111111111¶¶11¶¶¶¶¶¶11¶¶111
        1111111111111111111111111111¶¶¶1111¶¶¶1¶¶1111
        111111111111111111111111111111¶¶¶¶1111¶¶¶1111
        11111111111111111111111111111111¶¶¶¶¶¶¶¶11111
        ");
        sleep(3);
        system('clear');
        $this->info("\n\t\t 
         __        __   __                  __   __             ___ ___ ___  ___ 
        |__) |  | /__` /__` |  /\  |\ |    |__) /  \ |  | |    |__   |   |  |__  
        |  \ \__/ .__/ .__/ | /~~\ | \|    |  \ \__/ \__/ |___ |___  |   |  |___ 
                                                                                 
                           __                    ___                             
                          / _`  /\   |\/|  |\/| |__                              
                          \__> /~~\  |  |  |  | |___                             
                                                                                 ");
        $userInput = $this->ask("\t\t\tAre you sure you want to play?");
        while (!(('yes' == strtolower($userInput) || 'y' == strtolower($userInput)) || ('no' == strtolower($userInput) || 'n' == strtolower($userInput)))) {
            $userInput = $this->ask("\t\t
                 ___  __      __   __           __       /  /  /
            \ / |__  /__`    /  \ |__)    |\ | /  \     /  /  / 
             |  |___ .__/    \__/ |  \    | \| \__/    .  .  .  
                                                                !");
        }
        if ('yes' == strtolower($userInput) || 'y' == strtolower($userInput)) {
            system('clear');
            $this->play();
        } else if ('no' == strtolower($userInput) || 'n' == strtolower($userInput)) {
            system('clear');
            $this->abort();
        }
    }
}
