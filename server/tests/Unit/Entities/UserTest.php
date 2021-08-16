<?php

namespace Tests\Unit\Entities;

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
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @var User */
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User(
            new HandleName('handle_name'),
            new Email('email@example.com'),
            new Password('d1234567890--'),
            new LastName('test_name_last'),
            new LastNameKana('テストミョウジナマエカナ'),
            new FirstName('test_name_first'),
            new FirstNameKana('テストナマエナマエカナ'),
            new PhoneNumber('090-000-0000'),
            new Sex(1)
        );
    }

    /**
     * @covers ::getHandleName
     * @test
     */
    public function getHandleName()
    {
        $this->assertEquals('handle_name', $this->user->getHandleName());
    }

    /**
     * @covers ::getEmail
     * @test
     */
    public function getEmail()
    {
        $this->assertEquals('email@example.com', $this->user->getEmail());
    }

    /**
     * @covers ::getLastName
     * @test
     */
    public function getLastName()
    {
        $this->assertEquals('test_name_last', $this->user->getLastName());
    }

    /**
     * @covers ::getLastNameKana
     * @test
     */
    public function getLastNameKana()
    {
        $this->assertEquals('テストミョウジナマエカナ', $this->user->getLastNameKana());
    }

    /**
     * @covers ::getFirstName
     * @test
     */
    public function getFirstName()
    {
        $this->assertEquals('test_name_first', $this->user->getFirstName());
    }

    /**
     * @covers ::getFirstNameKana
     * @test
     */
    public function getFirstNameKana()
    {
        $this->assertEquals('テストナマエナマエカナ', $this->user->getFirstNameKana());
    }

    /**
     * @covers ::getPhoneNumber
     * @test
     */
    public function getPhoneNumber()
    {
        $this->assertEquals('090-000-0000', $this->user->getPhoneNumber());
    }

    /**
     * @covers ::getSex
     * @test
     */
    public function getSex()
    {
        $this->assertEquals(1, $this->user->getSex());
    }
}
