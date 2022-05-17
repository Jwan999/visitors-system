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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->string('governorate');
            $table->string('date_of_birth');
            $table->string('nationality');
            $table->string('field_of_study')->nullable();
            $table->enum('educational_background', ['primary', 'secondary', 'universityEnrolled', 'bachelor', 'master', 'phD'])->nullable();
            $table->string('university')->nullable();
            $table->boolean('attendance')->default(false);
            $table->foreignId('session_id')->constrained('sessions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('participants');
    }
};