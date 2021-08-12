<?php

namespace App\ValueObjects\User;

use App\Consts\UserConsts;
use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class Password implements BaseValueObject
{
    /** @var string */
    private $password;

    /**
     * Password constructor
     *
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $this->hash($password);
    }

    /**
     * password取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->password;
    }

    /**
     * パスワードかどうかバリデーションする
     *
     * @param string $password
     *
     * @return bool
     */
    public function isRawPassword(string $password): bool
    {
        // REF: https://zenn.dev/aoi_avant/articles/19ca83d8ae67d7#%E3%81%9D%E3%81%97%E3%81%A6%E8%BE%BF%E3%82%8A%E7%9D%80%E3%81%84%E3%81%9F%E5%AE%9A%E6%95%B0%E3%82%AF%E3%83%A9%E3%82%B9%E3%82%92%E4%BD%9C%E3%82%8B%E6%99%82%E4%BB%A3
        $password_between = UserConsts::NAME_MIN . ',' . UserConsts::NAME_MAX;

        return Validator::make([$password], ['between:' . $password_between])->passes();
    }

    /**
     * パスワードをハッシュ化する
     *
     * @param string $password
     *
     * @return string
     */
    public function hash(string $password): string
    {
        return self::isRawPassword($password) ? Hash::make($password) : $password;
    }
}
