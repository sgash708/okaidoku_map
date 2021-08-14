<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\Email;

class EmailTest extends TestCase
{
    /** @var Email */
    private $email;

    protected function setUp(): void
    {
        parent::setUp();
        $this->email = new Email('email@example.com');
    }

    /**
     * getは予約語のためgetEmailに変更
     *
     * @test
     * @covers ::get
     */
    public function getEmail()
    {
        $this->assertEquals('email@example.com', $this->email->get());
    }
}
