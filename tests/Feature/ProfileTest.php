<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_profile_should_be_able_to_construct(): void
    {
        $profile = new Profile();
        $this->assertInstanceOf(Profile::class, $profile);
    }

    /** @test*/
    public function canCreateAProfile()
    {
        $this->withoutExceptionHandling();

        $data = [
            'id'=> '100',
            'img' => 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinys
            rgb&dpr=1&w=500',
            'first_name' => 'Steph',
            'last_name' => 'Walters',
            'phone' => '(820) 289-1818',
            'address' => '5190 Center Court Drive',
            'city' => 'Spring',
            'state' => 'TX',
            'zipcode' => '77370',
            'available' => 'true',
        ];

        $response = $this->json('POST', '/api/profile', $data);

        $response->assertOk();
        $this->assertCount(1, Profile::all());

        /* $response->assertStatus(200)
             ->assertJson(compact('data'));

        $this->assertDatabaseHas('profiles', [
          'id' => $data['id'],
          'img' => $data['img'],
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'phone' => $data['phone'],
          'address' => $data['address'],
          'city' => $data['city'],
          'state' => $data['state'],
          'zipcode' =>$data['zipcode'],
          'available' => $data['available'],
        ]); */
    }

    /** @test */

    public function a_profile_can_be_updated()
    {
        $data = [
            'id'=> '100',
            'img' => 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinys
            rgb&dpr=1&w=500',
            'first_name' => 'Steph',
            'last_name' => 'Walters',
            'phone' => '(820) 289-1818',
            'address' => '5190 Center Court Drive',
            'city' => 'Spring',
            'state' => 'TX',
            'zipcode' => '77370',
            'available' => 'true',
        ];

        $response = $this->json('POST', '/api/profile', $data);
        $response->assertOk();
        $this->assertCount(1, Profile::all());

        $profile = Profile::first();

        $this->patch('/api/profile' . $profile->id, [
            'img' => 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinys
            rgb&dpr=1&w=500',
            'first_name' => 'Steph',
            'last_name' => 'Walters',
            'phone' => '(820) 289-1818',
            'address' => '5190 Center Court Drive',
            'city' => 'Spring',
            'state' => 'TX',
            'zipcode' => '77370',
            'available' => 'false',
        ]);

        $this->assertEquals('false', Profile::first()->available);


    }

    private function profile(string $string, array $array)
    {
    }
}
