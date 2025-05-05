<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('question_id');
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedInteger('option_id');
                $table->foreign('option_id')->references('id')->on('question_options')->onDelete('cascade');
            $table->string('selection');
            $table->longtext('text_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response');
    }
};
