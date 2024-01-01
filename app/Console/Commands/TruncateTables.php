<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:truncate-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate specific tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('table1')->truncate();
        DB::table('table2')->truncate();
        // Add more tables as needed...

        $this->info('Tables truncated successfully.');
    }
}
