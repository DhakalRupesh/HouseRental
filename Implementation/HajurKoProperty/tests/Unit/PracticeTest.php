<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Beverage;
use App\Proptypes;

class PracticeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     * @test
     * @return void
     */

    public function propTypes()
    {
        //CREATE PROPERTY TYPES
        $beverage = factory(Beverage::class)->make();
        $name = $beverage->name;

        $this->assertNotEmpty($name);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function propTesting()
    {
        $proptypes = factory(Proptypes::class)->make();
        $pt = $proptypes->propertyType;

        $this->assertNotEmpty($pt);
    }
}
