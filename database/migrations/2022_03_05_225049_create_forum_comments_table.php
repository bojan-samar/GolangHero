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
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('user_uuid')->constrained('users','uuid')->onDelete('cascade');
            $table->foreignUuid('forum_uuid')->constrained('forums','uuid')->onDelete('cascade');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('forum_comments', function (Blueprint $table) {
            $table->foreignUuid('parent_uuid')->nullable()->after('forum_uuid')->constrained('forum_comments','uuid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_comments');
    }
};
