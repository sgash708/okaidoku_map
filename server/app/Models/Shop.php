<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * Get all of the shop_bussiness_infos for the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shopBusinessInfos(): HasMany
    {
        return $this->hasMany('App\Models\ShopBusinessInfo');
    }
}
