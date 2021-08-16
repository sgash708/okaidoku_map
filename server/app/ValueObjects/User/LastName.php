<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;

class LastName implements BaseValueObject
{
    /** @var string */
    private $last_name;

    /**
     * LastName constructor
     *
     * @param string $last_name
     *
     * @throws \Exception
     */
    public function __construct(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * name取得
     *
     * @return string
     */
    public function get(): string
    {
        return $this->last_name;
    }
}
