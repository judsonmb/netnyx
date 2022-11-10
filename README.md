# Instalação

- clone o projeto em seu computador

```
git clone https://github.com/judsonmb/netnyx.git
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
## CASO USE DOCKER

- Rode os comandos

```
docker run --rm -v $(pwd):/app composer install
```

```
docker-compose up -d
```

```
sudo chmod 777 -R storage
```

```
sh setup.sh
```

- Acesse com

```
localhost
ou
localhost:80
```

- Caso perceba que o banco não está funcionando, no docker-compose altere manualmente as seguintes variáveis com os seus respectivos valores inseridos no .env

```
MYSQL_DATABASE: ${DB_DATABASE}
MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
```

## CASO NÃO USE DOCKER

**Instalações prévias**

- php7.4;
- apache2;
- mysql;
- composer;

- Instalar as dependências necessárias para rodar o projeto

```
sudo apt install php7.4-{simplexml,zip,intl,mbstring,dom,curl,gd,mysql}
```

```
composer install
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

- caso não tenha recebido um e-mail com a api key, solicite via e-mail a judsonmelobandeira@gmail.com.br e edite a variável

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

- acesse com 

```
http://localhost:8000
```