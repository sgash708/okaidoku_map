<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class FirstNameKana implements BaseValueObject
{
    /** @var string */
    private $first_name_kana;

    /**
     * FirstNameKana constructor
     *
     * @param string $first_name_kana
     *
     * @throws \Exception
     */
    public function __construct(string $first_name_kana)
    {
        if (!$this->isKanaName($first_name_kana)) {
            throw new \Exception(__('validation.regex'));
        }
        $this->first_name_kana = $first_name_kana;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->first_name_kana;
    }

    /**
     * 名前かどうかバリデーションする
     *
     * @param string $first_name_kana
     *
     * @return bool
     */
    private function isKanaName(string $first_name_kana): bool
    {
        return Validator::make([$first_name_kana], ['regex:/^[ァ-ヶー]+$/u'])->passes();
    }
}
