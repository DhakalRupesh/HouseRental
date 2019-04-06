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
        $email = "aayushdhakal544@gmail.com";
        $password = "aayushdhakal544@gmail.com";
        $testResponse = $this->call("GET", "/login/$email/$password");
        $this->assertEquals(404, $testResponse->status());
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testRegisterTest()
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
        $book = factory(User::class)->create();
        $testResponse = $this->actingAs($book)->get('/profile/1');
        $testResponse->assertSee('profile update successful');
    }

       /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testAdminorNot()
    {
        $admin = factory(User::class)->get();
        $this->assertFalse($admin->uType);
    }
}
