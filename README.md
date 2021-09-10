<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalação

1 - após baixar o projeto, executar o comando abaixo no mysql (ou alterar o arquivo .env conforme as configurações do seu mysql):

create database lb_cursos;

2 - dentro da pasta do projeto, executar o comando:

php artisan migrate

## Área administrativa

http://localhost:8000/login

login: lucas@admin.com.br
senha: 1234

- Cadastrar os alunos e os cursos primeiro
- Na tela para fazer a inscrição, o campo 'Nome do aluno' é um ajax autocomplete que busca os alunos conforme for digitado

## Area do Aluno

Digitar o link:

http://localhost:8000/

login: lucas@teste.com
senha: 1234


