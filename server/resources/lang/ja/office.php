<?php

return [
    'attributes' => [
        'basic' => [
            'id'                => 'ID',
            'name'              => '名称',
            'zip_code'          => '郵便番号',
            'pref'              => '都道府県',
            'city'              => '市区町村',
            'address1'          => '住所1',
            'address2'          => '住所2',
            'lat'               => '緯度',
            'lng'               => '経度',
            'zoom'              => '地図倍率',
            'entry_status'      => '登録ステータス',
            'release_status'    => '公開ステータス',
            'email'             => 'メールアドレス',
            'tel'               => '電話番号',
            'fax'               => 'fax番号',
            'transportation'    => '交通手段',
            'parking'           => '駐車場',
            'represent'         => '代表',
            'lawyer_number'     => '弁護士数',
            'url'               => 'URL',
            'main_copy'         => 'メインコピー',
            'youtube_url'       => 'Youtube_URL',
            'feature_main_copy' => '特徴メインコピー',
            'introduction'      => '紹介文',
            'is_contact_tel'    => '電話問い合わせ可否',
            'contact_tel'       => '問い合わせ電話番号',
            'is_contact_email'  => 'メール問い合わせ可否',
            'contact_email'     => '問い合わせメールアドレス',
            'item_heading'      => '見出し',
            'remarks'           => '備考',
        ],
        'feature' => [
            'features' => '特徴',
        ],
        'main_images' => [
            'images.*.file'        => 'ファイル',
            'images.*.delete_file' => '削除チェック',
        ],
        'feature_images' => [
            'images.*.file'        => 'ファイル',
            'images.*.caption'     => 'キャプション',
            'images.*.delete_file' => '削除チェック',
        ],
        'icon_image' => [
            'icon'         => 'アイコン画像',
            'delete_image' => '削除チェック',
        ],
    ],
];
