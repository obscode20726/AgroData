<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FarmerLoginTest extends TestCase
{
    use DatabaseTransactions; 

    public function testFarmerLoginSuccess()
    {
        
        $response = $this->post(route('farmer.login.submit'), [
            'email' => 'shemaolivierauca123@gmail.com',
            'password' => 'password',
        ]);

       
        $response->assertStatus(302);
        $response->assertRedirect('/farmer/dashboard');

        $this->assertAuthenticated('farmer');        
    }

    public function testFarmerLoginFailure()
{
    
    $response = $this->post(route('farmer.login.submit'), [
        'email' => 'invalid@example.com',
        'password' => 'wrongpassword',
    ]);

    
    $response->assertStatus(302);
    $response->assertRedirect('/farmer/login');

    
    $this->assertGuest('farmer');
}
}
