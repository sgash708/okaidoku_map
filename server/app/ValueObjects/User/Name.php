<?php

namespace App\ValueObjects\User;

use App\Consts\UserConsts;
use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class Name implements BaseValueObject
{
    /** @var string */
    private $name;

    /**
     * Name constructor
     *
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        if (!$this->isName($name)) {
            throw new \Exception(__('validation.name'));
        }
        $this->name = $name;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->name;
    }

    /**
     * 名前かどうかバリデーションする
     *
     * @param string $name
     *
     * @return bool
     */
    private function isName(string $name): bool
    {
        // REF: https://zenn.dev/aoi_avant/articles/19ca83d8ae67d7#%E3%81%9D%E3%81%97%E3%81%A6%E8%BE%BF%E3%82%8A%E7%9D%80%E3%81%84%E3%81%9F%E5%AE%9A%E6%95%B0%E3%82%AF%E3%83%A9%E3%82%B9%E3%82%92%E4%BD%9C%E3%82%8B%E6%99%82%E4%BB%A3
        $name_between = UserConsts::NAME_MIN . ',' . UserConsts::NAME_MAX;

        return Validator::make([$name], ['between:' . $name_between])->passes();
    }
}
