<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function acessar(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');

        $usuariosFicticios = User::factory()->count(10)->make();

        $usuario = $usuariosFicticios->firstWhere('email', $email);

        if ($usuario && Hash::check($senha, bcrypt('senha123'))) {
            return response()->json(['message' => 'Autenticado com sucesso!', 'user' => $usuario->email]);
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }



    public function registrar(Request $request)
    {
        $data = $request->only(['email', 'dt_nascimento', 'senha']);

        $idade = \Carbon\Carbon::parse($data['dt_nascimento'])->age;
        if ($idade < 18) {
            return response()->json(['error' => 'Usuário menor de 18 anos'], 400);
        }

        $usuariosExistentes = User::factory()->count(10)->make();
        $emailExistente = $usuariosExistentes->firstWhere('email', $data['email']);
        if ($emailExistente) {
            return response()->json(['error' => 'Email já registrado'], 400);
        }

        $novoUsuario = User::factory()->make([
            'email' => $data['email'],
            'dt_nascimento' => $data['dt_nascimento'],
            'password' => bcrypt($data['senha']),
        ]);

        
        $novoUsuario->save(); 

        return response()->json(['message' => 'Usuário registrado com sucesso!', 'user' => $novoUsuario]);
    }



    public function listagemUsuarios()
    {
        $usuarios = UserFactory::factory()->count(10)->make();
        return response()->json($usuarios);
    }


}
