# Da modularização aos microsserviços
## By Leonardo Tumadjian

Para rodar todo o projeto:

1. Criando uma network
```shell
$ docker create network my-network
```

2. Subindo os containers
Entre em 01-monolito
```shell
$ docker compose up -d
$ docker compose exec -u 1000:1000 server ash
$ composer install
$ artisan migrate:fresh --seed
```
3. Saia do container

4. Entre em 02-microsservicos
```shell
$ docker compose up -d
$ docker compose exec -u 1000:1000 payment ash
$ composer install
```
Para testar a comunicação entre em `01-monolito/requests.http`

Obrigado a todos que participaram, um abraço!