<?php

namespace App\Entities;

use App\ValueObjects\User\Email;
use App\ValueObjects\User\FirstName;
use App\ValueObjects\User\FirstNameKana;
use App\ValueObjects\User\HandleName;
use App\ValueObjects\User\LastName;
use App\ValueObjects\User\LastNameKana;
use App\ValueObjects\User\Password;
use App\ValueObjects\User\PhoneNumber;

class User
{
    /** @var HandleName */
    private $handle_name;
    /** @var Email */
    private $email;
    /** @var Password */
    private $password;
    /** @var LastName */
    private $last_name;
    /** @var LastNameKana */
    private $last_name_kana;
    /** @var LastName */
    private $first_name;
    /** @var LastNameKana */
    private $first_name_kana;
    /** @var PhoneNumber */
    private $phone_number;

    /**
     * コンストラクタ
     *
     * @param HandleName $name
     * @param Email      $email
     * @param Password   $password
     */
    public function __construct(
        HandleName $handle_name,
        Email $email,
        Password $password,
        LastName $last_name,
        LastNameKana $last_name_kana,
        FirstName $first_name,
        FirstNameKana $first_name_kana,
        PhoneNumber $phone_number
    ) {
        $this->handle_name     = $handle_name;
        $this->email           = $email;
        $this->password        = $password;
        $this->last_name       = $last_name;
        $this->last_name_kana  = $last_name_kana;
        $this->first_name      = $first_name;
        $this->first_name_kana = $first_name_kana;
        $this->phone_number    = $phone_number;
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
