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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('company_id')->constrained();
            $table->string('title')->fulltext();
            $table->string('type', 50)->nullable();
            $table->string('location')->nullable();
            $table->string('apply_url')->nullable();
            $table->text('description')->nullable();
            $table->double('salary_min',9,2)->nullable();
            $table->double('salary_max',9,2)->nullable();
            $table->boolean('remote')->default(0);
            $table->text('meta')->nullable();
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
        Schema::dropIfExists('job_posts');
    }
};
