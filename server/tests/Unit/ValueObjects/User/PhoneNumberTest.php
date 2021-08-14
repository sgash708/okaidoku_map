<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\PhoneNumber;

class PhoneNumberTest extends TestCase
{
    /** @var PhoneNumber */
    private $phone_number;
    /** @var string */
    private $item = '090-0000-0000';

    protected function setUp(): void
    {
        parent::setUp();
        $this->phone_number = new PhoneNumber($this->item);
    }

    /**
     * getは予約語のためgetPhoneNumberに変更
     *
     * @test
     * @covers ::get
     */
    public function getPhoneNumber()
    {
        $this->assertEquals($this->item, $this->phone_number->get());
    }
}
