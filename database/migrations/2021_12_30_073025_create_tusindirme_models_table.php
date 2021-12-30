<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTusindirmeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::has('tusindirme')) {
            Schema::create('tusindirme', function (Blueprint $table) {
                $table->id();
                $table->string('word', 500)->unique();
                $table->integer('checksum')->unsigned()->nullable();
                $table->text('meaning')->nullable();
                $table->text('description')->nullable();
                $table->dateTime('date')->useCurrent();
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
        Schema::dropIfExists('tusindirme');
    }
}
