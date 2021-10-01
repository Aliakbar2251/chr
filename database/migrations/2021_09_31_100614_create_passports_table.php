<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('birthday');
            $table->bigInteger('national_id')->unique();
            $table->boolean('is_main');
            $table->string('blood_group_type');
            $table->string('gender_type');
            $table->foreignId('contractor_id')->constrained('contractors')->cascadeOnDelete();
            $table->foreignId('nationality_id')->constrained('nationalities');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreign('blood_group_type')->references('type')->on('blood_groups');
            $table->foreign('gender_type')->references('type')->on('genders');
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
        Schema::dropIfExists('passports');
    }
}
