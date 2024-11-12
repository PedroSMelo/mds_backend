<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Função para acessar a conta
    public function acessar(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
        
        // Caminho do arquivo JSON
        $filePath = storage_path('app/users.json');
        
        // Verifica se o arquivo existe
        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            return response()->json(['error' => 'Arquivo de usuários não encontrado'], 404);
        }

        // Verifica se o usuário existe
        $usuario = collect($usuarios)->firstWhere('email', $email);

        // Valida as credenciais (agora usando Hash::check corretamente)
        if ($usuario && Hash::check($senha, $usuario['password'])) {
            return response()->json(['message' => 'Autenticado com sucesso!', 'user' => $usuario['email']]);
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    // Função para registrar um novo usuário
    public function registrar(Request $request)
    {
        $data = $request->only(['email', 'dt_nascimento', 'senha']);

        // Calcula a idade
        $idade = Carbon::parse($data['dt_nascimento'])->age;
        if ($idade < 18) {
            return response()->json(['error' => 'Usuário menor de 18 anos'], 400);
        }

        // Caminho do arquivo JSON
        $filePath = storage_path('app/users.json');

        // Verifica se o arquivo existe e carrega os usuários
        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            $usuarios = [];
        }

        // Verifica se o email já está registrado
        $emailExistente = collect($usuarios)->firstWhere('email', $data['email']);
        if ($emailExistente) {
            return response()->json(['error' => 'Email já registrado'], 400);
        }

        // Cria o novo usuário, com senha criptografada
        $novoUsuario = [
            'email' => $data['email'],
            'dt_nascimento' => $data['dt_nascimento'],
            'password' => Hash::make($data['senha']), // Usando Hash::make para criptografar a senha
        ];

        // Adiciona o novo usuário ao array de usuários
        $usuarios[] = $novoUsuario;

        // Salva os dados no arquivo JSON
        File::put($filePath, json_encode($usuarios, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Usuário registrado com sucesso!', 'user' => $novoUsuario]);
    }

    // Função para listar todos os usuários
    public function listagemUsuarios()
    {
        // Caminho do arquivo JSON
        $filePath = storage_path('app/users.json');

        // Verifica se o arquivo existe
        if (File::exists($filePath)) {
            $usuarios = json_decode(File::get($filePath), true);
        } else {
            return response()->json(['error' => 'Arquivo de usuários não encontrado'], 404);
        }

        return response()->json($usuarios);
    }
}
