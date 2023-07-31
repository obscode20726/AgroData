<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Admin;

class SeasonControllerIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    public function testSeasonStoreIntegration()
    {
        // Simulate logging in as an admin user
        $admin = Admin::where('email', 'shemaolivier20726@gmail.com')->first();
        $this->actingAs($admin, 'admin'); // Authenticate as the admin user

        // Simulate a form submission with valid data.
        $data = [
            'year' => 2023,
            'name' => 'Spring Season',
        ];

        // Send a POST request to the store route with the form data.
        $response = $this->post(route('admin.seasons.store'), $data);

        // Check if the response has a successful status code (302 Found) after successful creation.
        $response->assertStatus(302);

        // Check if the user is redirected back to the previous page after successful creation.
        $response->assertRedirect();

        // Get the flashed session data for the key 'success' and assert its value.
        $this->assertEquals('Season created successfully.', session('success'));

        // Optionally, you can check if the new season was added to the database.
        $this->assertDatabaseHas('seasons', $data);
    }
    public function testSeasonIndexIntegration()
    {
        // Retrieve the admin user with the provided email from the database
        $admin = Admin::where('email', 'shemaolivier20726@gmail.com')->first();

        // Assuming the admin user exists, authenticate as the admin user
        $this->actingAs($admin, 'admin');

        // Assuming you have some seed data for seasons in the database.
        $response = $this->get(route('admin.seasons.index'));
        // Check if the response has a successful status code (200 OK).
        $response->assertStatus(200);

        // Assuming the view contains the $seasons variable, assert that it is being passed to the view.
        $response->assertViewHas('seasons');

        // Assuming the view contains the necessary components from frontend.
        $response->assertSee('Crops seasons List');
        $response->assertSee('Create Season');
        $response->assertSee('Year');
        $response->assertSee('Name');
        // ... and other relevant frontend components you expect to see in the response.
    }

    // ... (other test methods)

}



