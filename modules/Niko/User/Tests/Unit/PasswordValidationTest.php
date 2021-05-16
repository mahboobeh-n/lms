<?php

namespace Niko\User\Tests\Unit;

use Niko\User\Rules\ValidPassword;
use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_password_should_not_be_less_than_6_character()
    {
        $result = (new ValidPassword())->passes('','A!12g');
        $this->assertEquals('0',$result);
    }


    public function test_password_should_include_sign_character()
    {
        $result = (new ValidPassword())->passes('','A123jjj');
        $this->assertEquals('0',$result);
    }


    public function test_password_should_include_digit_character()
    {
        $result = (new ValidPassword())->passes('','Assssjjj');
        $this->assertEquals('0',$result);
    }


    public function test_password_should_include_capital_character()
    {
        $result = (new ValidPassword())->passes('','dssssjjj');
        $this->assertEquals('0',$result);
    }


    public function test_password_should_include_small_character()
    {
        $result = (new ValidPassword())->passes('','ASDF!@#$');
        $this->assertEquals('0',$result);
    }


}
