<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Anime;
use App\Models\Karakter;

class ResetVote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vote:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Vote';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $anime=Anime::all();
        foreach($anime as $a){
            $go=Anime::findById($a->id);
            $go->setVoter(null);
            $go->save();
        }
        $karakter=Karakter::all();
        foreach($karakter as $k){
            $go=Karakter::findById($k->id);
            $go->setVoter(null);
            $go->save();
        }
    }
}
