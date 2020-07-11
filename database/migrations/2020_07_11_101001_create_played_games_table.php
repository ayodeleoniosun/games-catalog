<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayedGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played_games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('invitation_id')->nullable();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('started_by')->nullable();
            $table->string('played_on')->nullable();
            $table->enum('type', ['single', 'multiple']);
            $table->enum('status', ['pending', 'in-progress', 'ended']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('game_id')
                ->references('id')->on('games')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('invitation_id')
                ->references('id')->on('invitations')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
                $table->foreign('started_by')
                ->references('id')->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('played_games');
    }
}
