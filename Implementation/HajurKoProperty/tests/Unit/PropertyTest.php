<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Beverage;
use App\Proptypes;
use App\Properties;
use App\Bookings;
use App\User;

class PropertyTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testSearchTest()
    {
        $searchValue = "Kathmandu";
        $testResponse = $this->call("GET", "/search_Result/$searchValue");
        $this->assertEquals(404, $testResponse->status());
    }
    
     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testPropTypes()
    {
        $proptypes = factory(Proptypes::class)->make();
        $propname = $proptypes->propertyType;

        $this->assertNotEmpty($propname);
    }

    public function testAddNewProperty()
    {
        $propType_id = "2";
        $propFor = "sale";
        $propDistrict = "lukla";
        $propLocation = "Mustang, Nepal";
        $propSize = "2";
        $suitableFor = "rent";
        $waterP = "21";
        $electricP = "22";
        $totPrice = "23";
        $description = "this is description";
        $approval = "unapproved";
        $user_id = '1';

        $testResponse=$this->call("POST","/addProp/$propType_id/$propFor/$propDistrict/$propLocation/$propSize/$suitableFor/$waterP/$electricP/$totPrice/$description/$approval/$user_id");
        $this->assertEquals(404,$testResponse->status());
    }
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testAddProperty()
    {
        $addProp = factory(Properties::class)->create();
        $testResponse = $this->actingAs($addProp)->get('/addProp');
        $testResponse->assertSee('Adding property Success');
    }

     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testPropertyWithoutLogin()
    {
        $this->get('/addProp')->assertRedirect('/login');
    }

     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testViewPropertyNoLogin()
    {
        $this->get('propDetail/1')->assertSee('You can view Property');
    }

     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testBookPropertyNoLogin()
    {   
        $book = factory(Bookings::class)->create();
        $testResponse = $this->actingAs($book)->get('/propDetail/1');
        $this->assertRedirect('/login');      
    }
}
