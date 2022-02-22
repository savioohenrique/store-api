# Api de produtos e tags

Esta é uma api que possui como funcionalidade gerenciar os produtos de uma loja, os produtos podem possuir tags e é possível buscar listar os produtos de acordo com o nível de relevância.

É possível listar os produtos de acordo com a data que foi cadastrado e de acordo com a quantidade de visualizações que o produto teve.

## Requisitos
- PHP 8.1.2
- Composer 2.2.6
- Docker

## Como utilizar

Após clonar o projeto, acesse a pasta raiz do projeto e siga as instruções abaixo:

* Criando arquivo contendo as configurações de ambiente da aplicação: `cp .env.example .env`

* Instale as dependências do projeto: `composer install`

* Gere uma nova chave do ambiente: `php artisan key:generate`

* Instalando o sail para rodar os containers da aplicação: `php artisan sail:install`

* Selecione o banco de dados MySQL e confirme a operação



* Para subir os containers da aplicação digite: `./vendor/bin/sail up`

* Obs: para utilizar um alias e  poder utilizar comandos de formas mais resumidas como `sail up` para subir os containers ou `sail stop` para parar os containers digite: `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

* Depois que os containers estiverem rodando, crie as tabelas no banco de dados: `sail artisan migrate`

Após cumprir todos esses passos a api estará rodando no endereço: `http://localhost/api/`

OBS: para que a aplicação execute corretamente é necessário que as portas 80 e 3306 do seu computador estejam disponíveis, caso deseje utilizar portas diferentes realize as alterações necessárias no `.env` e no `docker-compose.yml`.


