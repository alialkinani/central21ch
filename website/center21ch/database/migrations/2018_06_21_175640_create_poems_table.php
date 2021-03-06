<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('poet_id');
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('replies_count')->default(0);
            $table->unsignedInteger('translates_count')->default(0);
            $table->unsignedInteger('visits')->default(0);
            $table->string('language')->nullable();
            $table->string('title');
            $table->double('lat', 18, 14)->nullable();
            $table->double('lng', 18,14)->nullable();
            $table->boolean('locked')->default(false);
            $table->unsignedInteger('best_reply_id')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('body');
            $table->timestamps();
            
            $table->foreign('best_reply_id')
                ->references('id')
                ->on('replies')
                ->onDelete('set null');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poems');
    }
}
