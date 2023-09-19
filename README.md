## Informações de como inicializar a aplicação

### Informações

    * PHP 8.1
    * Laravel 10

### Passo 1

* Altere o nome do arquivo de ".env.example" para ".env"
* Configura .env com os dados de conexão com o banco de dados
* Utilizar o nome do banco: "bd_multiplier"
* criar um usuário pra autenticar na aplicação que será o mesmo pra utilizar no postman

### Passo 2

* Executar os comandos abaixo
  * composer install
  * php artisan migrate (criar as tabelas)
  * php artisan db:seed --class=ClientesTableSeeder (Popular a base de dados)
  * php artisan test (Efetuar teste unitário)

### Passo 3

* Inicializar o servidor
  * php artisan serve
