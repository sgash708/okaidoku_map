<?php

namespace App\Entities;

use App\ValueObjects\User\Email;
use App\ValueObjects\User\HandleName;
use App\ValueObjects\User\Password;

class User
{
    /** @var HandleName */
    private $handle_name;
    /** @var Email */
    private $email;
    /** @var Password */
    private $password;

    /**
     * コンストラクタ
     *
     * @param HandleName $name
     * @param Email      $email
     * @param Password   $password
     */
    public function __construct(HandleName $handle_name, Email $email, Password $password)
    {
        $this->handle_name = $handle_name;
        $this->email       = $email;
        $this->password    = $password;
    }

    /**
     * Name取得
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->handle_name->get();
    }

    /**
     * Email取得
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email->get();
    }

    /**
     * Password取得
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password->get();
    }
}
