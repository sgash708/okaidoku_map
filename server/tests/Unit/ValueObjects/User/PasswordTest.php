<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\Password;
use Illuminate\Support\Facades\Hash;

class PasswordTest extends TestCase
{
    /** @var Password */
    private $password;
    /** @var int */
    private $item = 'd1234567890--';

    protected function setUp(): void
    {
        parent::setUp();
        $this->password = new Password($this->item);
    }

    /**
     * getは予約語のためgetPasswordに変更
     *
     * @test
     * @covers ::get
     */
    public function getPassword()
    {
        $this->assertTrue(Hash::check($this->item, $this->password->get()));
    }

    /**
     * @dataProvider userData
     * @test
     * @covers ::isRawPassword
     */
    public function isRawPassword(string $item, bool $expected)
    {
        $actual = $this->password->isRawPassword($item);
        $this->assertEquals($expected, $actual);
    }

    /**
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            'succuess' => [$this->item, true],
            'failed'  => ['0000', false],
        ];
    }
}
