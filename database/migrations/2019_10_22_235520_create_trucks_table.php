<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trailer')->nullable();
            $table->string('type')->nullable();
            $table->string('plates')->nullable();
            $table->string('vin')->nullable();
            $table->decimal('latest_mileage')->nullable();
            $table->decimal('actual_mileage')->nullable();
            $table->date('date_mileage')->nullable();
            $table->integer('status_mileage')->nullable();
            $table->integer('status_parts')->nullable();
            $table->timestamps();
            $table->timestamp('inactive_at')->nullable();
        });
        // Schema::create('trucks', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('number')->nullable();
        //     $table->integer('type_id')->nullable();
        //     $table->integer('brand_id')->nullable();
        //     $table->string('serie')->nullable();
        //     $table->string('plates')->nullable();
        //     $table->integer('year')->nullable();
        //     $table->decimal('weight', 10, 2)->nullable();
        //     $table->integer('service_id')->nullable();
        //     $table->integer('owner_id')->nullable();
        //     $table->timestamps();
        //     $table->timestamp('inactive_at')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}
