<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class PhoneNumber implements BaseValueObject
{
    /** @var string */
    private $phone_number;

    /**
     * PhoneNumber constructor
     *
     * @param string $phone_number
     *
     * @throws \Exception
     */
    public function __construct(string $phone_number)
    {
        if (!$this->isPhoneNumber($phone_number)) {
            throw new \Exception(__('validation.regex'));
        }
        $this->phone_number = $phone_number;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->phone_number;
    }

    /**
     * 名前かどうかバリデーションする
     *
     * @param string $phone_number
     *
     * @return bool
     */
    private function isPhoneNumber(string $phone_number): bool
    {
        return Validator::make([$phone_number], ['regex:/^[ァ-ヶー]+$/u'])->passes();
    }
}
