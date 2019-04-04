<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginRegisterTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function loginTest()
    {
        $email = "aayushdhakal544@gmail.com";
        $password = "aayushdhakal544@gmail.com";
        $testResponse = $this->call("GET", "/login/$email/$password");
        $this->assertEquals(404, $testResponse->status());
    }

    public function registerTest()
    {
        $fullname = "Rupesh Dhakal";
        $email = "aayushdhakal544@gmail.com";
        $district = "kathmandu";
        $city = "kathmandu";
        $address = "nayabazar, kathmandu";
        $mobNo = "9847512547";
        $password = "newPassword123";
        $testResponse=$this->call("POST","/register/$fullname/$email/$district/$city/$address/$mobNo/$password");
        $this->assertEquals(404,$testResponse->status());
    }
}
