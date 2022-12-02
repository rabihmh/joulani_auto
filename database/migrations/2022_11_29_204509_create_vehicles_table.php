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
            $table->string('gear');
            $table->integer('hp');
            $table->integer('power');
            $table->integer('mileage');
            $table->integer('price');
            $table->string('fuel');
            $table->integer('seats_nb');
            $table->json('payment_methods');
            $table->enum('status', ['new', 'used'])->default('used');
            $table->enum('wheel_drive', ['4*2', '4*4'])->default('4*2');
            $table->string('color');
            $table->integer('keys_nb');
            $table->string('year_of_production');
            $table->json('options');
            $table->string('image');
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
