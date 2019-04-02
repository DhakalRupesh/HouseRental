<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class newTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function register()
    {
        $a = 1;
        $b = 3;
        $c = $a + $b;
        $this->assertEquals($c,4); 
    }
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function register2()
    {
        $a = 1;
        $b = 3;
        $c = $a + $b;
        $this->assertEquals(45,$c); 
    }
}
