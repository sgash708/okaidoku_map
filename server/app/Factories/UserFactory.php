<?php

namespace App\Factories;

use App\Entities\User;
use App\ValueObjects\User\Email;
use App\ValueObjects\User\Name;
use App\ValueObjects\User\Password;

class UserFactory
{
    /**
     * Userエンティティを利用するため使う
     *
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    public function make(string $name, string $email, string $password): User
    {
        return new User(
            new Name($name),
            new Email($email),
            new Password($password),
        );
    }
}
