<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function searchTest()
    {
        $searchValue = "Kathmandu";
        $testResponse = $this->call("GET", "/search_Result/$searchValue");
        $this->assertEquals(404, $testResponse->status());
    }
}
