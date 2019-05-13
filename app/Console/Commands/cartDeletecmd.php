<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Cart;
use Illuminate\Console\Command;

class cartDeletecmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cartDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cartDelete';

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
      $now = Carbon::now();
      $dt = $now->subDays(3);
      Cart::where('created_at','<',$dt)->delete();
    }
}
