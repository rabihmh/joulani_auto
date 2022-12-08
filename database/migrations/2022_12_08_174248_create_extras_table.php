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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('ext_int_furniture')->nullable();
            $table->string('ext_int_sunroof')->nullable();
            $table->string('ext_int_glass')->nullable();
            $table->string('ext_int_seats')->nullable();
            $table->string('ext_int_screens')->nullable();
            $table->string('ext_int_other')->nullable();
            $table->string('ext_int_steering')->nullable();
            $table->string('ext_ext_light')->nullable();
            $table->string('ext_ext_mirrors')->nullable();
            $table->string('ext_ext_rims')->nullable();
            $table->string('ext_ext_sensors')->nullable();
            $table->string('ext_ext_cameras')->nullable();
            $table->string('ext_ext_other')->nullable();
            $table->string('ext_gen_other')->nullable();
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
        Schema::dropIfExists('extras');
    }
};
