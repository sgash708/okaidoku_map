<?php

namespace App\Factories;

use App\Entities\User;
use App\ValueObjects\User\Email;
use App\ValueObjects\User\FirstName;
use App\ValueObjects\User\FirstNameKana;
use App\ValueObjects\User\HandleName;
use App\ValueObjects\User\LastName;
use App\ValueObjects\User\LastNameKana;
use App\ValueObjects\User\Password;
use App\ValueObjects\User\PhoneNumber;
use App\ValueObjects\User\Sex;

class UserFactory
{
    /**
     * Userエンティティを利用するため使う
     *
     * @param string $handle_name
     * @param string $email
     * @param string $password
     * @param string $last_name
     * @param string $last_name_kana
     * @param string $first_name
     * @param string $first_name_kana
     * @param string $phone_number
     * @param int    $sex
     *
     * @return User
     */
    public function make(
        string $handle_name,
        string $email,
        string $password,
        string $last_name,
        string $last_name_kana,
        string $first_name,
        string $first_name_kana,
        string $phone_number,
        int $sex
    ): User {
        return new User(
            new HandleName($handle_name),
            new Email($email),
            new Password($password),
            new LastName($last_name),
            new LastNameKana($last_name_kana),
            new FirstName($first_name),
            new FirstNameKana($first_name_kana),
            new PhoneNumber($phone_number),
            new Sex($sex),
        );
    }
}
