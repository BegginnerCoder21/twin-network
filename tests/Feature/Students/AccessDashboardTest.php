<?php

namespace Tests\Feature\Students;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessDashboardTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_users_authenticated_cannot_see_dashboard_button():void
    {
        //arrange
        $isNotAdmin = ['admin' => 0];
        $user = User::factory()->create($isNotAdmin);

        //acct
        $response = $this->actingAs($user)->get('/accueil');

        //assert
        $this->assertAuthenticatedAs($user);
        $response->assertOk()
            ->assertDontSee('Dashboard');
    }

    public function test_users_authenticated_can_see_dashboard_button():void
    {
        //arrange
        $admin = ['admin' => 1];
        $user = User::factory()->create($admin);

        //act
        $response = $this->actingAs($user)->get('/accueil');

        //assert
        $this->assertAuthenticatedAs($user);
        $response->assertOk()
            ->assertSee('Dashboard');
    }

    public function test_users_authenticated_cannot_access_dashboard_page():void
    {
        //arrange
        $admin = ['admin' => 0];
        $user = User::factory()->create($admin);

        //act
        $response = $this->actingAs($user)->get('/dashboard');

        //assert
        $response->assertStatus(403);
    }

    public function test_users_admin_authenticated_can_access_dashboard_page():void
    {
        //arrange
        $admin = ['admin' => 1];
        $user = User::factory()->create($admin);

        //act
        $response = $this->actingAs($user)->get('/dashboard');

        //assert
        $this->assertAuthenticatedAs($user);
        $response->assertOk()
            ->assertSee(['Ajouter','Modifier','Supprimer']);
    }
}
