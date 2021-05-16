<?php

namespace Niko\User\Tests\Unit;

use Niko\User\Rules\ValidMobile;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_can_not_be_less_than_10_character()
    {
        $result = (new ValidMobile())->passes('','98765467');

        $this->assertEquals('0', $result);
    }

    public function test_mobile_can_not_be_more_than_10_character()
    {
        $result = (new ValidMobile())->passes('','98765467348');

        $this->assertEquals('0', $result);
    }

    public function test_mobile_should_start_by_9()
    {
        $result = (new ValidMobile())->passes('','7876546734');

        $this->assertEquals('0', $result);
    }
}
