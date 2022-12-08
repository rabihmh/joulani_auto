<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('made_id')->constrained('mades')->cascadeOnDelete();
            $table->foreignId('mould_id')->constrained('moulds')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('gear');
            $table->integer('hp');
            $table->integer('power');
            $table->integer('mileage');
            $table->integer('price');
            $table->string('fuel');
            $table->string('price_type')->nullable();
            $table->string('num_of_seats');
            $table->string('payment_method');
            $table->string('vehicle_status');
            $table->string('drivetrain_system', 4);
            $table->string('body_color');
            $table->string('interior_color');
            $table->string('extra_title');
            $table->string('num_of_keys');
            $table->string('year_of_product');
            $table->text('oimg');
//            $table->json('properties');
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
        Schema::dropIfExists('vehicles');
    }
};
