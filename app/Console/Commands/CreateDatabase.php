<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database {dbname} {type?} {collation?} ';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'database creation';

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
     * @return int
     */
    public function handle()
    {
        try {
            $dbname = $this->argument('dbname'); 
            $type = $this->hasArgument('type') && $this->argument('type') ? $this->argument('type'): DB::connection()->getPDO->getAttribute(PDO::ATTR_DRIVER_NAME); 
            $collation = $this->argument('collation');
            switch ($collation) {
                case 'utf8':
                    $coll = "CHARACTER SET utf8 COLLATE utf8_general_ci";
                    break;
                case 'utf8-unicode':
                    $coll = "CHARACTER SET utf8 COLLATE utf8_unicode_ci";
                    break;
                case 'utf8mb4':
                    $coll = "CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
                    break;
                case 'utf8mb4-unicode':
                    $coll = "CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
                    break;

                default:
                    $coll = "CHARACTER SET utf8 COLLATE utf8_general_ci";
                    break;
            }

            $hasDb = DB::connection($type)->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "."'".$dbname."'");

            
            if(empty($hasDb)) {
                DB::connection($type)->select('CREATE DATABASE '. $dbcreate .' '.$coll);
                $this->info("La Base de Datos '$dbname' de tipo '$tipo' con Cotejamiento '$coll' ha sido creada Correctamente ! ");
            }
            else {
                $this->info("La Base de Datos con el nombre '$dbname' ya existe ! ");
            }
            
        } catch (Exception $ex) {
            $this->error($ex->getMessage());

        }
        
    }
}
