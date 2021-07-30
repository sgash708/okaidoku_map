<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->comment('ユーザID');
            $table->string('handle_name')->unique()->comment('ハンドルネーム');
            $table->string('last_name')->comment('姓');
            $table->string('last_name_kana')->comment('姓カナ');
            $table->string('first_name')->comment('名');
            $table->string('first_name_kana')->comment('名カナ');
            $table->string('phone_number')->comment('電話番号');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password');
            $table->unsignedSmallInteger('sex')->comment('性別コード');
            $table->rememberToken();

            $table->dateTime('deleted_at')->softDeletes()->comment('削除日時')->nullable();
            $table->dateTime('created_at')->comment('作成日時')->nullable();
            $table->dateTime('updated_at')->comment('更新日時')->nullable();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
