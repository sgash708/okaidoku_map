<?php

namespace Tests\Unit\ValueObjects\User;

use Tests\TestCase;
use App\ValueObjects\User\Sex;

class SexTest extends TestCase
{
    /** @var Sex */
    private $sex;

    /**
     * getは予約語のためgetSexに変更
     *
     * @dataProvider userData
     * @test
     * @covers ::get
     */
    public function getSex(int $item)
    {
        $this->sex = new Sex($item);
        $this->assertEquals($item, $this->sex->get());
    }

    /**
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            '男性' => [0],
            '女性' => [1],
            'その他' => [2],
        ];
    }
}
