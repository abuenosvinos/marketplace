
## Preparación

- Añadir al fichero /etc/hosts

127.0.0.1       marketplace.local

## Ejecución

```bash
docker-compose -f  ./docker/docker-compose.yml up -d --build
```

## Instalación

```bash
docker exec --user $(id -u):$(id -g) docker_marketplace_php_1 php composer.phar install
```

```bash
docker exec --user $(id -u):$(id -g) docker_marketplace_node_1 npm install
```

```bash
docker exec --user $(id -u):$(id -g) docker_marketplace_node_1 npm run build
```

## Tests

```bash
docker exec --user $(id -u):$(id -g) docker_marketplace_php_1 php composer.phar run-unit-tests
```

## Ejecución web

http://marketplace.local:8080/

## Ejecución "api"

En backend/tests/Postman/Marketplace.postman_collection.json puedes encontrar las urls para gestionar el carrito

## Finalización

```bash
docker-compose -f  ./docker/docker-compose.yml down
```

```bash
docker rm docker_marketplace_nginx_1 docker_marketplace_php_1 docker_marketplace_node_1
```

```bash
docker rmi docker_marketplace_nginx docker_marketplace_php docker_marketplace_node
```
