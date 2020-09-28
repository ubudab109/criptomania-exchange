<?php

namespace App\Console\Commands\core;

use Illuminate\Console\Command;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;

class LogDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Log File';

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
        exec('rm ' . storage_path('logs/*.log'));

        $this->comment('Logs has been cleared');


    }
}
