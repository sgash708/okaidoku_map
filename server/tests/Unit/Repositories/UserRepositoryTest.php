<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @var User */
    private User $user;

    /**
     * setUp
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * 予約語(delete)のため回避
     *
     * @test ::delete
     * @dataProvider userData
     */
    public function isSuccessDeleting(array $data, int $expected)
    {
        $req = new UserRepository();
        $response = $req->delete($data);
        $this->assertEquals($expected, $response);
    }

    /**
     * 予約語(delete)のため回避
     *
     * @test ::delete
     * @dataProvider userFailData
     */
    public function isFailedDeleting(array $data, string $errorClass, string $message)
    {
        $this->expectException($errorClass);
        $this->expectExceptionMessage($message);
        $req = new UserRepository();
        $req->delete($data);
    }

    /**
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            '削除正常' =>  [
                'parameter' => [
                    'id' => 1,
                ],
                1,
            ],
        ];
    }

    /**
     * userFailData
     *
     * @return array
     */
    public function userFailData(): array
    {
        return [
            '削除異常_例外' =>  [
                'parameter' => [
                    'id' => 10000,
                ],
                ModelNotFoundException::class,
                'No query results for model [App\Models\User] 10000',
            ],
        ];
    }
}
