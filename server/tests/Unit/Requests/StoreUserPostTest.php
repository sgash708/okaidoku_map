<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StoreUserPostTest extends TestCase
{
    /**
     * @covers ::authorize
     * @test
     */
    public function authorize()
    {
        $this->assertTrue((new StoreUserPost())->authorize());
    }

    /**
     * @covers ::messages
     * @test
     */
    public function messages()
    {
        $this->assertIsArray((new StoreUserPost())->messages());
    }

    /**
     * rules関数のテスト
     *
     * REF: https://qiita.com/hirokita117/items/f49fcde808f10b55959f#%E3%83%86%E3%82%B9%E3%83%88%E3%82%B3%E3%83%BC%E3%83%89%E3%81%AE%E4%BD%9C%E6%88%90
     *
     * @dataProvider userData
     * @test
     *
     * @param string $item
     * @param string $data
     * @param bool   $expect
     */
    public function isLastNameKanaCheckSuccessful(string $item, string $data, bool $expect)
    {
        $req   = new StoreUserPost();
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
        $lead   = 'e3';
        $middle = mt_rand(82, 83);

        switch ($middle) {
            case 82:
                $follow = dechex(mt_rand(161, 191));

                break;
            case 83:
                $follow = dechex(mt_rand(128, 182));

                break;
        }
        $target = $lead . $middle . $follow;

        return [
            'last_name_kana_必須エラー'   => ['last_name_kana', '', false],
            'last_name_kana_文字列エラー'  => ['last_name_kana', 'aaaaaa', false],
            'last_name_kana_正常終了'    => ['last_name_kana', hex2bin($target), true],
            'first_name_kana_必須エラー'  => ['last_name_kana', '', false],
            'first_name_kana_文字列エラー' => ['last_name_kana', 'aaaaaa', false],
            'first_name_kana_正常終了'   => ['last_name_kana', hex2bin($target), true],
        ];
    }
}
