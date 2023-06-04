<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Configuração do ambiente

Para iniciar essa etapa de configuração do ambiente, é obrigatório ter o [Docker](https://docs.docker.com/desktop/ "Docker") instalado em sua máquina. 

Navegue até a pasta raíz do projeto e execute o comando: `$ docker-compose up -d` para inicializar o container.

Copie o arquivo .env.example e renomeie para .env dentro da pasta raíz da aplicação. Caso esteja usando o Linux, você pode usar o comando abaixo:

`$ cp .env.example .env`

Após a criação do arquivo .env, acesse o container da aplicação. 

Para isso, use o comando `$ docker exec -it vercan_test_app sh`.

Execute os comandos abaixo dentro do container:

```bash
$ cp .env.example .env  
$ composer install
$ php artisan key:generate
$ php artisan migrate --seed

```

Tudo certo para começar o teste! Após rodar os comandos listados acima seu ambiente estará pronto. 

Acesse localhost:8000 no seu navegador para visualizar a aplicação.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
