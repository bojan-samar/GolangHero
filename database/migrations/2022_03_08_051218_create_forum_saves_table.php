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
        Schema::create('forum_saves', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_uuid')->constrained('users','uuid')->cascadeOnDelete();
            $table->foreignUuid('forum_uuid')->constrained('forums','uuid')->cascadeOnDelete();
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
        Schema::dropIfExists('forum_saves');
    }
};
