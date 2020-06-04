<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use Log;

class DatabaseBackup extends Command{
    protected $signature = 'ub:backup-db';
    protected $description = 'Backup database';
    protected $process;

    public function __construct()
    {
        parent::__construct();
        $today = today()->format('Y-m-d');
        if(!is_dir(storage_path('/opt/backups/database'))) mkdir(storage_path('/opt/backups/database'));

        $command = sprintf('mysqldump --compact --skip-comments -h%s -u%s -p%s %s > %s',
            env('DB_HOST'),
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            storage_path("/opt/backups/database/{$today}.sql")
        );

        $this->process = new Process($command);
    }

    public function handle(){
        try {
            $this->process->mustRun();
            Log::info('Daily DB Backup - Success');
        } catch (ProcessFailedException $exception) {
            Log::errr('Daily DB Backup - Failed', $exception);
        }
    }
}
