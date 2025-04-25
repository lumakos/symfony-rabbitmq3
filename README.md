## Symfony 7 Boilerplate framework with RabbitMQ3
It's templates of the configuration files (Dockerfile, docker-compose.yaml, nginx.conf, xdebug.ini) for creating new Symfony application.
Default Repository 

https://github.com/Tanya-WebDev/configuration-files-for-the-symfony-project

https://www.youtube.com/watch?v=tsqliJ3tFnk 

### DDD
https://github.com/Tanya-WebDev/mail-component

### Run app in port 8088 && Start Worker (Run Consumer) as background service
```
docker-compose up -d --scale consumer=3
```

### Open RabbitMQ (username: guest, password: guest)
```
http://localhost:15672/#/
```

### OPTIONAL: Start Worker (async)
```
docker-compose exec php php bin/console messenger:consume async
```

### Send Message
```
http://127.0.0.1:8088/send-message
```
And check rabbitmq and "message_log" DB.

### Packages
```
composer require symfony/messenger
composer require symfony/amqp-messenger
```

## What is RabbitMQ?
```
RabbitMQ is a message broker: it acts as an intermediary for sending messages between applications, 
systems, or services. It implements the Advanced Message Queuing Protocol (AMQP) and helps in asynchronous 
communication and decoupling of microservices.
```

### About "messenger:consume"
```
Imagine a restaurant:

- The controller is the waiter taking the order.
- RabbitMQ is the kitchen's order queue.
- The worker (messenger:consume) is the chef grabbing orders and cooking.

If the chef isn’t in the kitchen (you don’t run the command), food (messages) will just sit there and get cold (unprocessed).
```

### Entities
1. `Create new Entity`
2. `docker-compose exec php php bin/console make:migration`
3. `docker-compose exec php php bin/console doctrine:migrations:migrate`

```
$log = new MessageLog("Hello World!");
$this->entityManager->persist($log); // Track this object
$this->entityManager->flush();       // Write it to the DB now
```