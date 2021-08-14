<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\FirstNameKana;

class FirstNameKanaTest extends TestCase
{
    /** @var FirstNameKana */
    private $first_name_kana;

    protected function setUp(): void
    {
        parent::setUp();
        $this->first_name_kana = new FirstNameKana('アアアアア');
    }

    /**
     * getは予約語のためgetFirstNameKanaに変更
     *
     * @test
     * @covers ::get
     */
    public function getFirstNameKana()
    {
        $this->assertEquals('アアアアア', $this->first_name_kana->get());
    }
}
