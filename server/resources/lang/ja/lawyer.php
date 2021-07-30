<?php

return [
    'attributes' => [
        'category_question' => [
            'questions'            => 'よくあるご質問',
            'questions.*.question' => '質問',
            'questions.*.answer'   => '回答',
        ],
        'category_price' => [
            'prices'               => '料金表',
            'is_unique_pricelist'  => '表示',
            'prices.*.item_name'   => '項目名',
            'prices.*.description' => '費用説明',
        ],
        'icon_image' => [
            'icon'         => 'アイコン画像',
            'delete_image' => '削除チェック',
        ],
    ],
];
