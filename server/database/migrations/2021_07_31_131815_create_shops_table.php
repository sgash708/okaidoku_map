<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('店舗ID');
            $table->string('name')->comment('店舗名');
            $table->float('grid_x')->comment('座標X');
            $table->float('grid_y')->comment('座標Y');

            $table->dateTime('deleted_at')->softDeletes()->comment('削除日時')->nullable();
            $table->dateTime('created_at')->comment('作成日時')->nullable();
            $table->dateTime('updated_at')->comment('更新日時')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
