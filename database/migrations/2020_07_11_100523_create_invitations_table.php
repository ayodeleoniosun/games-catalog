<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('invited_player');
            $table->enum('status', ['pending', 'accepted', 'declined']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('game_id')
                ->references('id')->on('games')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('invited_player')
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
        Schema::dropIfExists('invitations');
    }
}
