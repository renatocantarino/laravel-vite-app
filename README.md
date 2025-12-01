# Kitanda (Laravel storefront)

Projeto: loja online construída com Laravel, Blade e Bootstrap.

Principais tecnologias
- Laravel 12 (PHP 8.2+)
- MySQL (docker-compose example disponível)
- Blade (templates)
- Bootstrap (v5 vendor files included)
- Vite + Laravel Mix coexistem; o repositório usa assets pré-compilados em `public/` e também tem config para builds modernos

Resumo
-------
Este repositório contém uma aplicação demo de e‑commerce (front + carrinho). O objetivo é rodar a aplicação localmente, construir assets e garantir que o contador de itens do carrinho no layout esteja sempre correto.

Requisitos locais
-----------------
- PHP 8.2+ com extensões comuns: mbstring, pdo_mysql, openssl, tokenizer, xml, ctype, json
- Composer
- Node.js + npm (ou pnpm)
- MySQL (pode usar o `docker-compose.yml` incluído)

Configuração rápida (modo local)
--------------------------------
1. Copiar arquivo de ambiente e ajustar valores:

    cp .env.example .env

2. Instalar dependências PHP e Node

    composer install
    npm ci

3. Ajustar .env para MySQL. Exemplo (local ou docker-compose):

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kitandaDB
    DB_USERNAME=usuario
    DB_PASSWORD=usuario

    (Se estiver usando docker-compose, rode `docker compose up -d` primeiro)

4. Gerar chave e rodar migrations

    php artisan key:generate
    php artisan migrate

5. Rodar o servidor local

    php artisan serve

6. Compilar assets (opções)

- Projeto tem suporte ao Vite e também a um `webpack.mix.js` que concatena os arquivos vendor já presentes em `public/assets`.
- Para builds Vite (assets/app.js/scss):
    npm run dev     # dev
    npm run build   # produção

- Para rodar Laravel Mix (concatenação dos vendors existentes):
    npm run mix
    npm run mix:prod

Licença
-------
MIT

README criado automaticamente — se preferir, posso adicionar um exemplo de `middleware` em `app/Http/Middleware/` para a injeção global do contador.<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
