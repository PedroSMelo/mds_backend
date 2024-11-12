# Projeto Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Este projeto utiliza o framework Laravel, proporcionando uma estrutura robusta e elegante para o desenvolvimento de aplicações web. Laravel facilita diversas tarefas comuns no desenvolvimento de projetos web, como:

- Roteamento simples e rápido
- Contêiner de injeção de dependência poderoso
- Suporte para múltiplos back-ends de sessão e cache
- ORM intuitivo e expressivo
- Processamento robusto de jobs em segundo plano
- Transmissão de eventos em tempo real

## Requisitos

Antes de iniciar, certifique-se de ter os seguintes requisitos instalados:

- PHP 8.2 ou superior
- Composer
- Banco de dados (MySQL, SQLite, etc., conforme necessário)
- Node.js e npm (caso use dependências de frontend)

## Instalação

1. **Clone o repositório:**

   git clone # Projeto Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="[https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg](https://github.com/PedroSMelo/mds_backend)" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Este projeto utiliza o framework Laravel, proporcionando uma estrutura robusta e elegante para o desenvolvimento de aplicações web. Laravel facilita diversas tarefas comuns no desenvolvimento de projetos web, como:

- Roteamento simples e rápido
- Contêiner de injeção de dependência poderoso
- Suporte para múltiplos back-ends de sessão e cache
- ORM intuitivo e expressivo
- Processamento robusto de jobs em segundo plano
- Transmissão de eventos em tempo real

## Requisitos

Antes de iniciar, certifique-se de ter os seguintes requisitos instalados:

- PHP 8.2 ou superior
- Composer
- Banco de dados (MySQL, SQLite, etc., conforme necessário)
- Node.js e npm (caso use dependências de frontend)

## Instalação

1. **Clone o repositório:**

   git clone https://link-do-seu-repositorio.git
   cd nome-do-repositorio

2. **Instale as dependências do Composer:**
    
    composer install

3. **Configure o arquivo .env:**
    ----
    //Como não usamos um banco real configure dessa forma
    ----
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=:memory:
    DB_USERNAME=null
    DB_PASSWORD=null
    
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null

4. **Gere a chave:**

    php artisan key:generate

5. **Abra o servidor da API**

    php artisan serve

   cd nome-do-repositorio

2. **Instale as dependências do Composer:**
    
    composer install

3. **Configure o arquivo .env:**
    
    //Como não usamos um banco real configure dessa forma
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=:memory:
    DB_USERNAME=null
    DB_PASSWORD=null


    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null

4. **Gere a chave:**

    php artisan key:generate

5. **Abra o servidor da API**

    php artisan serve

