

## Informações de como inicializar a aplicação

### Informações

    * PHP 8.1
    * Laravel 10

### Passo 1

* Altere o nome do arquivo de ".env.example" para ".env"
* Configura .env com os dados de conexão com o banco de dados
* Utilizar o nome do banco: "bd_multiplier"
* criar um usuário pra autenticar na aplicação

### Passo 2

* Executar os comandos abaixo
  * composer install
  * php artisan migrate

### Passo 3

* Inicializar o servidor
  * php artisan serve
  * 

php artisan db:seed --class=ClientesTableSeeder

php artisan migrate

php artisan test
