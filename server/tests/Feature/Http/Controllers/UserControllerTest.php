<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    // データを保存させない
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
     * @test
     * @covers ::index
     */
    public function index(): void
    {
        $response = $this->get(route('user.index', $this->user));
        $response->assertOk();
        $response->assertViewIs('user.index');
        // REF: https://stackoverflow.com/questions/47576072/laravel-phpunit-assertviewhas-doesnt-match-the-expected-test-data
        // 無名関数の省略形(fn)
        $response->assertViewHas('users', fn ($users) => $users->contains($this->user));
    }

    /**
     * @test
     * @covers ::create
     */
    public function create(): void
    {
        $response = $this->get(route('user.create', $this->user));
        $response->assertOk();
        $response->assertViewIs('user.create');
    }

    /**
     * 異常系テストがRequestで握りつぶされているのできない...
     *
     * @dataProvider userData
     * @test
     * @covers ::store
     *
     * @param array $user_row_data
     * @param string $expected
     */
    public function store(array $user_row_data, string $expected): void
    {
        // REF: https://qiita.com/avocadoneko/items/4e0ae01099df1b9efcbb
        $response = $this->from('user')->post(route('user.store', $user_row_data));
        $response->assertRedirect(route('user.index'));
        $response->assertStatus(302);
        $response->assertSessionHas('success_message', $expected);
    }

    /**
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            '正常データ' => [
                [
                    "handle_name" => "asdfghjkl;",
                    "email" => "e@email.com",
                    "password" => "asdfghjkl;vjk",
                    "last_name" => "sdfghjk",
                    "last_name_kana" => "ホゲ",
                    "first_name" => "sdfghjk",
                    "first_name_kana" => "ホゲ",
                    "phone_number" => "090-0000-0000",
                    "sex" => "0",
                ],
                '登録に成功しました。'
            ],
        ];
    }
}
