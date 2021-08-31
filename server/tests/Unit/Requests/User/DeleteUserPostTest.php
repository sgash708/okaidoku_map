<?php

namespace Tests\Unit\Requests\User;

use App\Http\Requests\User\DeleteUserPost;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DeleteUserPostTest extends TestCase
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
     * rules関数のテスト
     * setUpBeforeClassが使えないので先頭で評価させる
     *
     * REF: https://qiita.com/hirokita117/items/f49fcde808f10b55959f#%E3%83%86%E3%82%B9%E3%83%88%E3%82%B3%E3%83%BC%E3%83%89%E3%81%AE%E4%BD%9C%E6%88%90
     *
     * @dataProvider userData
     * @test ::rules
     *
     * @param string $item
     * @param string $data
     * @param bool   $expect
     */
    public function isIDCheckSuccessful(string $item, string $data, bool $expect)
    {
        $req   = new DeleteUserPost();
        $rules = $req->rules();
        // 指定したキーだけ取り出す
        $targetRule = Arr::only($rules, $item);

        $dataList  = [$item => $data];
        $validator = Validator::make($dataList, $targetRule);
        $result    = $validator->passes();
        $this->assertEquals($expect, $result);
    }

    /**
     * @covers ::authorize
     * @test
     */
    public function authorize()
    {
        $this->assertTrue((new DeleteUserPost())->authorize());
    }

    /**
     * @covers ::messages
     * @test
     */
    public function messages()
    {
        $this->assertIsArray((new DeleteUserPost())->messages());
    }

    /**
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            // 1が取得できないので泣く泣く3にする
            'id_正常'      => ['id', '3', true],
            'id_必須エラー' => ['id', '', false],
            'id_数値エラー' => ['id', 'aaa', false],
            'id_存在エラー' => ['id', '100', false],
        ];
    }
}
