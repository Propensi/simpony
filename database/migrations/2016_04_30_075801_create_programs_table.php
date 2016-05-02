<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('programs', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('Prog_ID');
$table->string('Prog_Nama');
$table->string('Jadwal_Tayang');
$table->text('Prog_Deskripsi');

                $table->timestamps();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('programs');
    }

}
