<?php

// tests/Feature/UserTest.php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;  

    public function testExample()
    {
        $this->artisan('migrate');  

        User::factory()->count(10)->create();  

        $users = User::all(); 
        $this->assertCount(10, $users);  
    }
}
