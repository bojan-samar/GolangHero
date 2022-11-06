<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->string('title');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->text('meta')->nullable();
            $table->double('salary_min',9,2)->nullable();
            $table->double('salary_max',9,2)->nullable();
            $table->string('salary_type')->nullable();
            $table->unsignedMediumInteger('apply_clicks')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('order_by_date')->nullable(); //Date to sort jobs. Featured jobs will be set 30 days in the future
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
