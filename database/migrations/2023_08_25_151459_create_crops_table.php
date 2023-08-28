<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plot_id');
            $table->string('name');
            $table->date('plantation_date');
            $table->date('harvest_date');
            $table->timestamps();

            // Add foreign key constraint to plot_id
            $table->foreign('plot_id')->references('id')->on('plots')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crops');
    }
}

