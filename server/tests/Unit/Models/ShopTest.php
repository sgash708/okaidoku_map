<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Shop;
use App\Models\ShopBusinessInfo;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShopTest extends TestCase
{
    // データを保存させない
    use DatabaseTransactions;

    /** @var Shop */
    private Shop $shop;
    /** @var ShopBusinessInfo */
    private ShopBusinessInfo $shop_business_info;

    /**
     * setUp
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->shop               = Shop::factory()->create();
        $this->shop_business_info = ShopBusinessInfo::factory()->create(['shop_id' => $this->shop->id]);
    }
    

    /**
     * @test
     * @covers ::shopBusinessInfos
     */
    public function shopBusinessInfos()
    {
        // shop_bussiness_infosは、shopsのshop_business_infoのコレクションとして存在しているか
        $this->assertTrue($this->shop->shopBusinessInfos->contains($this->shop_business_info));
        // 存在するshop_business_infoデータは存在していて、数があっているか
        $this->assertEquals(1, $this->shop->shopBusinessInfos->count());
        // shop_business_infosは、shopsに紐づいていてコレクションインスタンスか
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->shop->shopBusinessInfos);
    }
}
