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

        // shop_bussiness_infosは、shopsのshop_business_infoのコレクションとして存在しているか
        $this->assertTrue($shop->shopBusinessInfos->contains($shop_business_info));
        // 存在するshop_business_infoデータは存在していて、数があっているか
        $this->assertEquals(1, $shop->shopBusinessInfos->count());
        // shop_business_infosは、shopsに紐づいていてコレクションインスタンスか
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $shop->shopBusinessInfos);
    }
}
