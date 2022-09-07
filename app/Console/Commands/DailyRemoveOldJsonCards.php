<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; 

class DailyRemoveOldJsonCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removeOld:jsonCards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily delete one day old json cards';

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
        
        $path = public_path('assets');
		$files = File::allfiles($path);
        
		foreach ($files as $file) {	
			$now   = time();
			if ($now - filemtime($file) >= 60 * 60 * 24 * 1) { // 1 day
				File::delete($file);	// By uncommenting this, files will be delete
			}
		}

        Log::info("24 hours old cards deleted");
       
    }
}
