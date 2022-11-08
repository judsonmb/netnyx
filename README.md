# Instalação (ambiente linux)

**Instalações prévias**

- php7.4;
- apache2;
- mysql;
- composer;

**Instalar as dependências php necessárias para rodar o projeto**

```
sudo apt install php7.4-{simplexml,zip,intl,mbstring,dom,curl,gd,mysql}
```

**Instalando o projeto github** 

- clone o projeto em seu computador

- entre na pasta do projeto instale as dependências:

```
composer install
```

- criar arquivo .env

```
cp .env.example .env
```

- crie um banco de dados e edite o arquivo .env com as suas informações locais em:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

- rode a migração e os dados de teste

```
php artisan migrate && php artisan db:seed
```

- as informações de teste são

```
fulano@email.com
12345678
(usuário do tipo admin)
```

```
beltrano@email.com
12345678
(usuário do tipo cliente)
```

```
ciclano@email.com
12345678
(usuário do tipo cliente)
```

- caso não tenha recebido um e-mail com a url da api e a api key, solicite via e-mail a judsonmelobandeira@gmail.com.br e com as informações edite a variável

```
API_KEY=keyhere
```

- gere a chave pública

```
php artisan key:gen
```
- rode a aplicação

```
php artisan serve
```

- acesse com http://localhost:8000