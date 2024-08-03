<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunSpecificMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-specific-migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $migrations = [
            '2024_06_15_214044_create_whs_inv_depo.php',
            '2024_06_15_224320_create_whs_inv_units.php',
            '2024_06_15_224717_create_whs_inv.php',
            '2024_06_15_230051_create_farsen_orgs.php'
        ];

        foreach ($migrations as $migration) {
            Artisan::call('migrate:rollback', [
                '--path' => 'database/migrations/' . $migration,
            ]);
            Artisan::call('migrate', [
                '--path' => 'database/migrations/' . $migration,
            ]);

            $this->info('Migrated: ' . $migration);
        }

        return 0;
    }
}
