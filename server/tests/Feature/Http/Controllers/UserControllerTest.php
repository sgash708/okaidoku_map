<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /** @var User */
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    
    /**
     * @test
     * @covers ::index
     */
    public function index()
    {
        $response = $this->get(route('user.index', $this->user));
        $response->assertOk();
        $response->assertViewIs('user.index');
        // REF: https://stackoverflow.com/questions/47576072/laravel-phpunit-assertviewhas-doesnt-match-the-expected-test-data
        $response->assertViewHas('users', function ($users) {
            return $users->contains($this->user);
        });
    }

    /**
     * @test
     * @covers ::create
     */
    public function create()
    {
        $response = $this->get(route('user.create', $this->user));
        $response->assertOk();
        $response->assertViewIs('user.create');
    }
}
