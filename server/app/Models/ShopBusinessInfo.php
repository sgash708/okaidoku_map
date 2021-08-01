<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopBusinessInfo extends Model
{
    use HasFactory;

    /**
     * shopsテーブルの<belongsTo>所有関係
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
