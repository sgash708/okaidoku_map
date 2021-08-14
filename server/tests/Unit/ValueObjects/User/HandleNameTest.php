<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\HandleName;

class HandleNameTest extends TestCase
{
    /** @var HandleName */
    private $handle_name;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handle_name = new HandleName('hogehoge');
    }

    /**
     * getは予約語のためgetHandleNameに変更
     *
     * @test
     * @covers ::get
     */
    public function getHandleName()
    {
        $this->assertEquals('hogehoge', $this->handle_name->get());
    }
}
