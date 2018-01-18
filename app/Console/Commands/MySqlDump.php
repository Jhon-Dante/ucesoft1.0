<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MySqlDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the mysqldump utility using info from .env';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public static function handle($date,$host,$username,$password,$database)
    {
        $ds = DIRECTORY_SEPARATOR;
        //passthru()
        //dd($database);
        $ts = time();
        $path = database_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
        $file = $date . '-dump-' . $database . '.sql';

        $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database, $file);
        //dd($command);
        // if (!is_dir($path)) {
        //     mkdir($path, 0755, true);
        // }
        is_dir($path) ?: mkdir($path, 0755, true);
       //dd(exec($command));
        /*if(exec($command)){
            dd('siiiiiiiiiiiiiiiii');
        }else{
            dd('noooooooooooooooooo');
        }*/


        try {
         system($command);   
        } catch (Exception $e) {
            dd($e);
        }
    }
}