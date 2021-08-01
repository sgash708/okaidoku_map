<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopBussinessInfo extends Model
{
    use HasFactory;

    /**
     * Get the shops that owns the ShopBussinessInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
