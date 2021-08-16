<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\FirstName;

class FirstNameTest extends TestCase
{
    /** @var FirstName */
    private $first_name;

    protected function setUp(): void
    {
        parent::setUp();
        $this->first_name = new FirstName('test_name_first');
    }

    /**
     * getは予約語のためgetFirstNameに変更
     *
     * @test
     * @covers ::get
     */
    public function getFirstName()
    {
        $this->assertEquals('test_name_first', $this->first_name->get());
    }
}
