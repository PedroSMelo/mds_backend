<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function acessar(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        
        $filePath = storage_path('app/users.json');
        
        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            return response()->json(['error' => 'Arquivo de usuários não encontrado'], 404);
        }

        $usuario = collect($usuarios)->firstWhere('email', $email);

        if ($usuario && Hash::check($senha, $usuario['password'])) {
            return response()->json(['message' => 'Autenticado com sucesso!', 'user' => $usuario['email']]);
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    public function registrar(Request $request)
    {
        $data = $request->only(['email', 'dt_nascimento', 'senha']);

        $idade = Carbon::parse($data['dt_nascimento'])->age;
        if ($idade < 18) {
            return response()->json(['error' => 'Usuário menor de 18 anos'], 400);
        }

        $filePath = storage_path('app/users.json');

        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            $usuarios = [];
        }

        $emailExistente = collect($usuarios)->firstWhere('email', $data['email']);
        if ($emailExistente) {
            return response()->json(['error' => 'Email já registrado'], 400);
        }

            $novoId = count($usuarios) + 1;  

        $novoUsuario = [  
            'id' => $novoId,  
            'email' => $data['email'],
            'dt_nascimento' => $data['dt_nascimento'],
            'password' => Hash::make($data['senha']), 
        ];

        $usuarios[] = $novoUsuario;

        File::put($filePath, json_encode($usuarios, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Usuário registrado com sucesso!', 'user' => $novoUsuario]);
    }

    public function listagemUsuarios()
    {
        $filePath = storage_path('app/users.json');

        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            return response()->json(['error' => 'Arquivo de usuários não encontrado'], 404);
        }

        return response()->json($usuarios);
    }
}
