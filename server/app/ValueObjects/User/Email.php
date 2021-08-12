<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Validator;

class Email implements BaseValueObject
{
    /** @var string */
    private $email;

    /**
     * Email constructor
     *
     * @param string $email
     *
     * @throws \Exception
     */
    public function __construct(string $email)
    {
        if (!$this->isEmail($email)) {
            throw new \Exception(__('validation.email'));
        }
        $this->email = $email;
    }

    /**
     * email取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->email;
    }

    /**
     * メールアドレスかどうかバリデーションする
     *
     * @param string $email
     *
     * @return bool
     */
    private function isEmail(string $email): bool
    {
        return Validator::make([$email], ['email'])->passes();
    }
}
