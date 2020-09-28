<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favorite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('micropostId');
            $table->timestamps();
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('micropostId')->references('id')->on('microposts');
            // user_idとmicropostIdの組み合わせの重複を許さない
            $table->unique(['user_id', 'micropostId']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_favorite');
    }
}