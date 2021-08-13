<?php

namespace App\ValueObjects\User;

use App\Consts\UserConsts;
use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class Sex implements BaseValueObject
{
    /** @var int */
    private $sex;

    /**
     * Sex constructor
     *
     * @param int $sex
     */
    public function __construct(int $sex)
    {
        if (!$this->isRightNumber($sex)) {
            throw new \Exception(__('validation.between'));
        }
        $this->sex = $sex;
    }

    /**
     * sex取得
     *
     * @return int
     */
    public function get(): int
    {
        return $this->sex;
    }

    /**
     * 性別番号のバリデーションする
     *
     * @param int $sex
     *
     * @return bool
     */
    public function isRightNumber(int $sex): bool
    {
        $sex_between = UserConsts::SEX_MIN . ',' . UserConsts::SEX_MAX;

        return Validator::make([$sex], ['between:' . $sex_between])->passes();
    }
}
