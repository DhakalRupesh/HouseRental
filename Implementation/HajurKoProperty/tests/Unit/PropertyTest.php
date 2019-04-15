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

	    $testTesponse = $this->call("GET",'/search_Result',[
	    	'location'=>$searchValue,
	    ]);

        $this->assertEquals(200, $testTesponse->status());  
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
        $testTesponse = $this->call("POST",'/addProp',[
	    	'propType_id' => "2",
            'propFor' => "sale",
            'propDistrict' => "lukla",
            'propLocation' => "Mustang, Nepal",
            'propSize' => "2",
            'suitableFor' => "rent",
            'waterP' => "21",
            'electricP' => "22",
            'totPrice' => "23",
            'description' => "this is description",
            'approval' => "unapproved",
            'user_id' => '1',

	    ]);

	    $this->assertEquals(302, $testTesponse->status());
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
        $status="unbook";
	    $testTesponse = $this->call("GET",'/login',[
	    	'status'=>$status,
	    ]);

	    $this->assertEquals(200, $testTesponse->status());
    }
}
