<?php

namespace Tests\Feature\Students;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StudentsManagementTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_users_admin_can_delete_a_student():void
    {
        //arrange
        $admin = ['admin' => 1];
        $notAdmin = ['admin' => 0];
        $user = User::factory(2)->sequence($admin,$notAdmin)->create();

        //act
        $this->actingAs($user[0])->get('/dashboard');
        $response = $this->actingAs($user[0])->delete('user/'.$user[1]->id);

        //assert
        $this->assertDatabaseCount('users',1);
        $this->assertDatabaseMissing('users',$user[1]->toArray());
        $response->assertRedirect('/dashboard');

    }

    public function test_users_admin_authenticated_can_access_a_modify_page():void
    {
        //arrange
        $user = $this->UserCreating(2);

        //act
        $this->actingAs($user[0])->get('dashboard');
        $response = $this->actingAs($user[0])->get('user/'. $user[1]->id . '/edit');

        //assert
        $response->assertOk();
    }

    public function test_users_authenticated_cannot_access_a_modify_page():void
    {
        //arrange
        $notAdmin = ['admin' => 0];
        $user = User::factory()->create($notAdmin);

        //act
        $this->actingAs($user)->get('accueil');
        $response = $this->actingAs($user)->get('user/'. $user->id . '/edit');

        //assert
        $response->assertStatus(403);
    }

    public function test_users_admin_authenticated_can_modify_a_student():void
        {
            //arrange
            $user = $this->UserCreating(2);
            $userCreating = [
                'matricule' => $user[1]->matricule,
                'name' => 'test',
                'email' => $user[1]->email,
                'number' => $user[1]->number,
                'lastname' => $user[1]->lastname,
                'speciality' => $user[1]->speciality,
                'admin' => $user[1]->admin,
                'images' => '',
                'password' => ''
            ];

            //act
            $response = $this->actingAs($user[0])->put('user/' . $user[1]->id,$userCreating );

            //assert
            $this->assertDatabaseMissing('users',$user[1]->toArray());
            $response->assertOk()
                    ->assertSee('test');
        }

    public function test_users_admin_authenticated_can_modify_a_student_with_a_empty_field():void
        {
            //arrange
            $user = $this->UserCreating(2);
            $creatingUser = [
                'matricule' => '',
                'name' => '',
                'email' => '',
                'number' => '',
                'lastname' => '',
                'speciality' => '',
                'admin' => $user[1]->admin,
                'image' => '',
                'password' => ''
            ];

            //act
            $response = $this->actingAs($user[0])->put('user/' . $user[1]->id, $creatingUser);

            //assert
            $response->assertStatus(302)
                    ->assertInvalid(['name','number','matricule','email','lastname','speciality'])
                    ->assertValid(['admin','password']);
        }

    public function  test_users_authenticated_cannot_access_to_the_add_student_page():void
    {
        //arrange
        $user = User::factory()->create(['admin' => 0]);

        //act
        $response = $this->actingAs($user)->get('/user');

        //assert
        $response->assertStatus(403);
    }

public function  test_users_authenticated_can_access_to_the_add_student_page():void
    {
        //arrange
        $user = User::factory()->create(['admin' => 1]);

        //act
        $response = $this->actingAs($user)->get('/user');

        //assert
        $response->assertOk();
    }

    public function test_user_admin_authenticated_can_add_a_student():void
        {
            //arrange
            $user = User::factory()->create(['admin' =>1]);
            Storage::fake('avatars');
            $images = UploadedFile::fake()->image('avatar.jpg');
            $phone = '0767046567';
            $userCreating = [
                'matricule' => '21-ESATIC63282C',
                'name' =>   'test',
                'email' => 'test@gmail.com',
                'number' => $phone,
                'lastname' => 'tester',
                'speciality' => 'developpeur',
                'admin' => 0,
                'image' => $images,
                'password' => 'password',
                'password_confirmation' => 'password',
            ];

            //act
            $response = $this->actingAs($user)->post('/user',$userCreating);

            //assert
            $this->assertDatabaseCount('users',2);
            $this->assertDatabaseHas('users',[
                'name' => 'test',
                'matricule' => '21-ESATIC63282C',
                'email' => 'test@gmail.com',
                'number' => '+225 '.$phone,
            ]);
            $response->assertRedirect('/dashboard');
        }

    /**
     * @return User|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function UserCreating(int $nbr): User|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        $admin = ['admin' => 1];
        $notAdmin = ['admin' => 0];
        $user = User::factory()
            ->count($nbr)
            ->sequence($admin, $notAdmin)
            ->create();
        return $user;
    }

}
