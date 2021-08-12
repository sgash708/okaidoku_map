<?php

namespace App\Consts;

/**
 * Userモデル定数
 */
class UserConsts
{
    // REF: https://stackoverflow.com/questions/6706051/what-is-the-correct-way-to-write-phpdocs-for-constants
    /** @var int */
    public const PASS_MIN = 8;
    /** @var int */
    public const PASS_MAX = 30;
    /** @var int */
    public const NAME_MIN = 1;
    /** @var int */
    public const NAME_MAX = 255;
    /** @var array */
    public const LABEL = [
        'handle_name'     => 'ユーザ名',
        'last_name'       => '苗字',
        'last_name_kana'  => '苗字カナ',
        'first_name'      => '名前',
        'first_name_kana' => '名前カナ',
        'phone_number'    => '電話番号',
        'email'           => 'メールアドレス',
        'password'        => 'パスワード',
    ];
}
