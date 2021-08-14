<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\LastNameKana;

class LastNameKanaTest extends TestCase
{
    /** @var LastNameKana */
    private $last_name_kana;

    protected function setUp(): void
    {
        parent::setUp();
        $this->last_name_kana = new LastNameKana('アアアアア');
    }

    /**
     * getは予約語のためgetLastNameKanaに変更
     *
     * @test
     * @covers ::get
     */
    public function getLastNameKana()
    {
        $this->assertEquals('アアアアア', $this->last_name_kana->get());
    }
}
