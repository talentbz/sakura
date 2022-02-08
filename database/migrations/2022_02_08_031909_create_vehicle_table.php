<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('stock_no');
            $table->string('make_type')->nullable();
            $table->string('model_type')->nullable();
            $table->string('body_type')->nullable();
            $table->string('registration')->nullable();
            $table->string('fuel_type')->nullable();
            $table->double('mileage')->nullable();
            $table->string('engine_model')->nullable();
            $table->string('engine_size')->nullable();
            $table->integer('seats')->nullable();
            $table->string('model_code')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('steering')->nullable();
            $table->integer('doors')->nullable();
            $table->string('loading_capacity')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('chassis')->nullable();
            $table->boolean('ac')->default(0);
            $table->boolean('power_steering')->default(0);
            $table->boolean('auto_door')->default(0);
            $table->boolean('remote_key')->default(0);
            $table->boolean('backup_camera')->default(0);
            $table->boolean('navigation')->default(0);
            $table->boolean('power_locks')->default(0);
            $table->boolean('cd_player')->default(0);
            $table->boolean('dvd')->default(0);
            $table->boolean('mp3_interface')->default(0);
            $table->boolean('ratio')->default(0);
            $table->boolean('sun_roof')->default(0);
            $table->boolean('air_bag')->default(0);
            $table->boolean('abs')->default(0);
            $table->boolean('s_power_locks')->default(0);
            $table->boolean('parking_sensors')->default(0);
            $table->boolean('grill_guard')->default(0);
            $table->boolean('back_camera')->default(0);
            $table->boolean('leather_seat')->default(0);
            $table->boolean('power_seat')->default(0);
            $table->boolean('power_mirrors')->default(0);
            $table->boolean('power_window')->default(0);
            $table->boolean('rear_spoiler')->default(0);
            $table->boolean('alloy_wheels')->default(0);
            $table->boolean('bluetooth')->default(0);
            $table->longText('image_url')->nullable();
            $table->string('video_link')->nullable();
            $table->double('price')->nullable();
            $table->double('sale_price')->nullable();
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
        Schema::dropIfExists('vehicle');
    }
}
