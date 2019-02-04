# exercicio-symfony

1) Execute o "composer install";
2) Crie a base de dados "services" no MySQL;
3) Configure os dados de acesso ao MySQL no arquivo ".env".
   Exemplo: "DATABASE_URL=mysql://developer:dev123@127.0.0.1:3306/services"
4) Execute as migrations com o comando "php bin/console doctrine:migrations:migrate";
5) Execute o servidor Web do Symfony: "php bin/console server:run";
6) Acesse http://127.0.0.1:8001/home
