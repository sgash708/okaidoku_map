<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_business_infos', function (Blueprint $table) {
            $table->foreignId('shop_id')->comment('店舗ID')->constrained();
            $table->time('start')->comment('開始時間')->nullable();
            $table->time('end')->comment('終了時間')->nullable();
            $table->unsignedSmallInteger('week_day_code')->comment('曜日コード')->nullable();
            $table->boolean('is_closed')->comment('定休日')->default(0)->nullable();

            $table->dateTime('deleted_at')->softDeletes()->comment('削除日時')->nullable();
            $table->dateTime('created_at')->comment('作成日時')->nullable();
            $table->dateTime('updated_at')->comment('更新日時')->nullable();

            $table->primary('shop_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_business_infos');
    }
}
