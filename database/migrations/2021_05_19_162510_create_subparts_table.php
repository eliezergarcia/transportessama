<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubpartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subparts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id')->unsigned()->nullable();
            $table->integer('box_id')->unsigned()->nullable();
            $table->integer('part_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->date('instalation_date')->nullable();
            $table->decimal('instalation_mileage')->nullable();
            $table->decimal('expiration_mileage')->nullable();
            $table->string('number')->nullable();
            $table->string('ubication')->nullable();
            $table->integer('status')->nullable();
            $table->string('notes')->nullable();
            $table->timestamp('inactive_at')->nullable();
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
        Schema::dropIfExists('subparts');
    }
}
