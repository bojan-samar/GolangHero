<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id')->nullable();
            $table->string('name')->unique();
            $table->string('url')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('photo', 2048)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->text('meta')->nullable();
            $table->timestamp('imported_at')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
