# App Controle de Tarefas

O **App Controle de Tarefas** é um projeto Laravel destinado a fornecer uma base sólida para o desenvolvimento de aplicativos web. Este documento serve como um guia rápido para começar e configurar o projeto em seu ambiente local.

## Requisitos do Sistema

Certifique-se de que o seu ambiente atenda aos seguintes requisitos:

- PHP >= 8.0.2
- Composer
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/app_controle_tarefas.git

2. Instale as dependências do Composer::

   ```bash
   composer install

3. Instale as dependências do NPM:::

   ```bash
   npm install

4. Copie o arquivo de ambiente:::

   ```bash
   cp .env.example .env

4. Configure o arquivo .env com as suas configurações locais, incluindo o acesso ao banco de dados::
5. Gere a chave de aplicativo::

   ```bash
   php artisan key:generate

6. Execute as migrações do banco de dados::

   ```bash
    php artisan migrate

7. Inicie o servidor de desenvolvimento::

   ```bash
   php artisan serve
   
   A aplicação estará disponível em http://localhost:8000.

## Dependências Principais

- [Laravel Framework](https://github.com/laravel/framework): laravel/framework
- [Laravel Sanctum](https://github.com/laravel/sanctum): laravel/sanctum
- [Guzzle HTTP](https://github.com/guzzle/guzzle): guzzlehttp/guzzle
- [Laravel Tinker](https://github.com/laravel/tinker): laravel/tinker
- [Laravel UI](https://github.com/laravel/ui): laravel/ui

## Dependências de Desenvolvimento

- [FakerPHP Faker](https://github.com/fakerphp/faker): fakerphp/faker
- [Laravel Pint](https://github.com/laravel/pint): laravel/pint
- [Laravel Sail](https://github.com/laravel/sail): laravel/sail
- [Mockery](https://github.com/mockery/mockery): mockery/mockery
- [Nunomaduro Collision](https://github.com/nunomaduro/collision): nunomaduro/collision
- [PHPUnit](https://github.com/sebastianbergmann/phpunit): phpunit/phpunit
- [Spatie Laravel Ignition](https://github.com/spatie/laravel-ignition): spatie/laravel-ignition

## Scripts Personalizados

O projeto inclui vários scripts personalizados que podem ser executados com o Composer. Alguns destes incluem:

- **post-autoload-dump**: Atualização de autoload e descoberta de pacotes.
- **post-update-cmd**: Publicação de ativos do Laravel.
- **post-root-package-install**: Criação do arquivo `.env` a partir do `.env.example`.
- **post-create-project-cmd**: Geração da chave de aplicativo.

## Configurações Adicionais

O arquivo `composer.json` inclui várias configurações importantes, como otimização de autoloader, instalação preferencial e configurações de estabilidade.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).

