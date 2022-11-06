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
        Schema::create('job_imports', function (Blueprint $table) {
            $table->id();
            $table->string('import_id')->nullable();
            $table->string('url')->nullable();
            $table->string('company_name');
            $table->string('company_slug');
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('salary_min')->nullable();
            $table->string('salary_max')->nullable();
            $table->text('description')->nullable();
            $table->text('job_type')->nullable();
            $table->boolean('remote')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('job_imports');
    }
};
