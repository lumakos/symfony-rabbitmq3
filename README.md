# configuration-files-for-the-symfony-project
It's templates of the configuration files (Dockerfile, docker-compose.yaml, nginx.conf, xdebug.ini) for creating new Symfony application.

### Run app in port 8088
```
docker-compose up -d
```

### Open RabbitMQ (username: guest, password: guest)
```
http://localhost:15672/#/
```

### Consume message
```
docker-compose exec php php bin/console messenger:consume async
```

### Send Message
```
http://127.0.0.1:8088/send-message
```
And check rabbitmq.
