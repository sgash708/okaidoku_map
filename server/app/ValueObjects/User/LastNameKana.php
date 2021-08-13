<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class LastNameKana implements BaseValueObject
{
    /** @var string */
    private $last_name_kana;

    /**
     * LastNameKana constructor
     *
     * @param string $last_name_kana
     *
     * @throws \Exception
     */
    public function __construct(string $last_name_kana)
    {
        if (!$this->isKanaName($last_name_kana)) {
            throw new \Exception(__('validation.regex'));
        }
        $this->last_name_kana = $last_name_kana;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->last_name_kana;
    }

    /**
     * 名前かどうかバリデーションする
     *
     * @param string $last_name_kana
     *
     * @return bool
     */
    private function isKanaName(string $last_name_kana): bool
    {
        return Validator::make([$last_name_kana], ['regex:/^[ァ-ヶー]+$/u'])->passes();
    }
}
