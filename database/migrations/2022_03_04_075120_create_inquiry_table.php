<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('vehicle_name');
            $table->string('fob_price')->nullable();
            $table->string('inspection')->nullable();
            $table->string('insurance')->nullable();
            $table->string('inqu_port')->nullable();
            $table->string('total_price')->nullable();
            $table->string('site_url');
            $table->string('inqu_name');
            $table->string('inqu_email');
            $table->string('inqu_mobile');
            $table->string('inqu_country');
            $table->string('inqu_address')->nullable();
            $table->string('inqu_city')->nullable();
            $table->longText('inqu_comment')->nullable();
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
        Schema::dropIfExists('inquiry');
    }
}
