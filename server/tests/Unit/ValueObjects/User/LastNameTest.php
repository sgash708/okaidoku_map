<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\LastName;

class LastNameTest extends TestCase
{
    /** @var LastName */
    private $last_name;

    protected function setUp(): void
    {
        parent::setUp();
        $this->last_name = new LastName('test_name_last');
    }

    /**
     * getは予約語のためgetLastNameに変更
     *
     * @test
     * @covers ::get
     */
    public function getLastName()
    {
        $this->assertEquals('test_name_last', $this->last_name->get());
    }
}
