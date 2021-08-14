<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Shop;
use App\Models\ShopBusinessInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class ShopTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @covers ::shopBusinessInfos
     */
    public function shopBusinessInfos()
    {
        $shop               = Shop::factory()->create();
        $shop_business_info = ShopBusinessInfo::factory()->create(['shop_id' => $shop->id]);

        // Method 1: A comment exists in a post's comment collections.
        $this->assertTrue($shop->shopBusinessInfos->contains($shop_business_info));
        // Method 2: Count that a post comments collection exists.
        $this->assertEquals(1, $shop->shopBusinessInfos->count());
        // Method 3: Comments are related to posts and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $shop->shopBusinessInfos);
    }
}
