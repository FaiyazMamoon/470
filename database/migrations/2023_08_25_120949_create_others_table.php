<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Adding foreign key reference to users table
            $table->string('name');
            $table->enum('role', ['Employee', 'Customer'])->nullable();
            $table->enum('specific_role', ['Farmer', 'Manager', 'Laborer', 'New Customer', 'Returning Customer'])->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('others');
    }
}
