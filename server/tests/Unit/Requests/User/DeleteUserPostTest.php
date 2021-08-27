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
     * rules関数のテスト
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
     * userData
     *
     * @return array
     */
    public function userData(): array
    {
        return [
            'id_必須エラー' => ['id', '', false],
            'id_数値エラー' => ['id', 'aaa', false],
            'id_存在エラー' => ['id', '100', false],
            'id_正常'    => ['id', '1', true],
        ];
    }
}
