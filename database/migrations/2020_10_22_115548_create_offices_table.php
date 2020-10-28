<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput;


class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        //Create table if not exist
        if (!Schema::hasTable('offices')){

            Schema::create('offices', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('address');
                $table->dateTime('created_at')->nullable();	
                $table->dateTime('updated_at')->nullable();	
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
