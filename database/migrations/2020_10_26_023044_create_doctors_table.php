<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('nid')->nullable();
            $table->string('degree')->nullable();
            $table->string('sat')->nullable();
            $table->string('sun')->nullable();
            $table->string('mon')->nullable();
            $table->string('tue')->nullable();
            $table->string('wed')->nullable();
            $table->string('thu')->nullable();
            $table->string('fri')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
