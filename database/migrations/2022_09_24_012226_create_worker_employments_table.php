<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_employments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('worker_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('from_month');
            $table->year('from_year');
            $table->unsignedTinyInteger('to_month')->nullable();
            $table->year('to_year')->nullable();
            $table->boolean('current_job')->nullable();
            $table->string('title');
            $table->string('company');
            $table->string('url');
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
        Schema::dropIfExists('worker_employments');
    }
}
