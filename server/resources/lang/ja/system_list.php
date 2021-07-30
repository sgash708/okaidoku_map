<?php

return [
    'lawyer_category_unique_pricelists' => [
        config('const.INT_FLAG_OFF') => '所属する法律事務所の料金表を表示',
        config('const.INT_FLAG_ON')  => '弁護士固有の料金表を表示',
    ],

    'errors' => [
        '404' => [
            'e_code'     => '404',
            'e_title'    => 'ページが見つかりません',
            'e_title_en' => 'Not Found',
            'e_message'  => '誠に申し訳ございませんが、お探しのページは一時的にアクセスできない状況にあるか、移動または削除されているため、見つけることができません。',
        ],
        '500' => [
            'e_code'     => '500',
            'e_title'    => 'ページが表示できません',
            'e_title_en' => 'Internal Server Error',
            'e_message'  => 'アクセスしようとしたページは、サーバー内部のエラーにより表示できませんでした。
        誠に申し訳ございませんが、しばらく経ってから再度アクセスしてください。',
        ],
        '419' => [
            'e_code'     => '419',
            'e_title'    => '不正なページ移動です',
            'e_title_en' => 'Illegal page transitions',
            'e_message'  => '不正なページ移動がおこなわれました。TOPページに戻り、初めからお手続きください。同じエラーが続く場合はシステム担当者へお問い合わせください。',
        ],
        'default' => [
            'e_code'     => ':code',
            'e_title'    => 'エラーが発生しました',
            'e_title_en' => 'unknown error',
            'e_message'  => '不明なエラーが発生したため、ページを表示できませんでした。同じエラーが続く場合はシステム担当者へお問い合わせください。',
        ],
    ],
];
