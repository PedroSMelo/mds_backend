<?php

// tests/Feature/UserTest.php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;  // Isso garante que o banco de dados será resetado antes de cada teste.

    public function testExample()
    {
        // Cria as tabelas e popula com dados fictícios
        $this->artisan('migrate');  // Roda as migrations para criar as tabelas

        User::factory()->count(10)->create();  // Cria 10 usuários fictícios

        // Agora você pode testar
        $users = User::all();  // Obtém todos os usuários
        $this->assertCount(10, $users);  // Verifica se existem 10 usuários
    }
}
