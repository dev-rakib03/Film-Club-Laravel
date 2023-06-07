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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('aiub_id');
            $table->string('department');
            $table->string('blood_group');
            $table->string('email');
            $table->string('phone');
            $table->json('categories');
            $table->longtext('hobby');
            $table->string('semester');
            $table->double('cgpa');
            $table->string('gender');
            $table->longtext('address');
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
        Schema::dropIfExists('applicants');
    }
};
