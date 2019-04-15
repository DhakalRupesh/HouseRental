<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\FactoryBuilder;
use App\User;

class userTest extends TestCase
{
     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testLoginTest()
    {
        $email="aayushdhakal544@gmail.com";
	    $password="newPassword5454";

	    $testTesponse = $this->call("GET",'/login',[
	    	'email'=>$email,
	    	'password' => $password
	    ]);

	    $this->assertEquals(200, $testTesponse->status());
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testRegisterTest()
    {   
        $testTesponse = $this->call("POST",'/register',[
	    	'fullname' => "user",
	    	'email' => "gmail@gamil.com",
	    	'district' => "kathmandu",
	    	'city' => "kathmandu",
	    	'address' => "nayabazar,kathmandu",
	    	'mobNo' => "2136547891",
	    	'uType' => "0",
            'arequest' => "",
            'password' => "newPassword",
	    ]);

	    $this->assertEquals(302, $testTesponse->status());
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testNotLoginRedirect()
    {
        $usrRedirect = factory(User::class)->make();
        $testResponse = $this->actingAs($usrRedirect)->get('/login');
        $testResponse->assertRedirect('/');
    }
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testUpdateProfile()
    {    
        $testTesponse = $this->call("POST",'/profile',[
            'fullname' => "user",
	    	'district' => "kathmandu",
	    	'city' => "kathmandu",
	    	'address' => "nayabazar,kathmandu",
	    	'mobNo' => "2136547891",
	    ]);

	    $this->assertEquals(405, $testTesponse->status());
    }

       /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testAdminorNot()
    {
        $uType="1";
	    $testTesponse = $this->call("GET",'/dashboard',[
	    	'uType'=>$uType,
	    ]);
	    $this->assertEquals(200, $testTesponse->status());
    }
}
