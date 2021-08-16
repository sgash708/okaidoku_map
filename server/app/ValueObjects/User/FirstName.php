<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;

class FirstName implements BaseValueObject
{
    /** @var string */
    private $first_name;

    /**
     * FirstName constructor
     *
     * @param string $first_name
     *
     * @throws \Exception
     */
    public function __construct(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->first_name;
    }
}
