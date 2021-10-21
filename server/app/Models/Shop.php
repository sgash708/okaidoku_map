<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    /**
     * shop_business_infoテーブルの<hasMany>所有関係
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shopBusinessInfos(): HasMany
    {
        return $this->hasMany('App\Models\ShopBusinessInfo');
    }
}
