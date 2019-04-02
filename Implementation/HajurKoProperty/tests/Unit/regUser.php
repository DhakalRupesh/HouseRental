<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\http\Middleware\uType;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class regUser extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function register()
    {
         $email = "aayushdhakal544@gmail.com";
         $password = "aayushdhakal544@gmail.com";
         $testResponse = $this->call("GET", "/login/$email/$password");
         $this->assertEquals(404, $testResponse->status());
    }
    // assert helps to determine the pass or fail value 
    // checks the inputed and expected value 
}
