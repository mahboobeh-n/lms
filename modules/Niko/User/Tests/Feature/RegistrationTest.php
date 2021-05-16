<?php

namespace Niko\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Niko\User\Models\User;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_see_register_from()
    {
       $response = $this->get('register');

       $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->registerNewUser();


        $response->assertRedirect(route('home'));

        $this->assertCount(1 , User::all());


    }
/** @return void */

    public function test_use_have_verify_account()
    {
        $this->registerNewUser();

        $response=$this->get(route('home'));

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_verified_user_can_see_home_page()
    {
        $this->registerNewUser();

        $this->assertAuthenticated();

        auth()->user()->markEmailAsVerified();

        $response = $this->get(route('home'));

        $response->assertOk();

    }

    public function registerNewUser()
    {
       return $this->post(route('register'), [
            'name' => 'ali',
            'email' => 'ali@ali.com',
            'mobile' => '9393982845',
            'password' => '!@ASas45',
            'password_confirmation' => '!@ASas45'

        ]);
    }

}
