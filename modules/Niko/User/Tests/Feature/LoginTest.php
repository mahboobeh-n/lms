<?php

namespace Niko\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Niko\User\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_by_email()
    {
       $user=User::create(
           [
              'name'=> $this->faker->name,
               'email'=> $this->faker->safeEmail,
               'password'=>bcrypt('A!123a')
           ]
       );

       $this->post(route('login'),[

           'email'=> $user->email,
           'password'=> 'A!123a'
       ]);

       $this->assertAuthenticated();
    }


    public function test_user_can_login_by_mobile()
    {
        $user=User::create(
            [
                'name'=> $this->faker->name,
                'email'=> $this->faker->safeEmail,
                'mobile'=> '9876456734',
                'password'=>bcrypt('A!123a')
            ]
        );

        $this->post(route('login'),[

            'email'=> $user->mobile,
            'password'=> 'A!123a'
        ]);

        $this->assertAuthenticated();
    }
}
