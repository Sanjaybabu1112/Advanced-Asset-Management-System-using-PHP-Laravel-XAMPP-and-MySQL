<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('uid');
            $table->string('brand');
            $table->string('model');
            $table->string('image');
            $table->string('specification1');
            $table->string('specification2');
            $table->string('specification3');
            $table->string('specification4');
            $table->string('dop');
            $table->string('cost');
            $table->string('warranty');
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
        Schema::dropIfExists('assets');
    }
};
