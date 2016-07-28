# Socket
WebSocket Server for Laravel 5 


[![Latest Stable Version](https://poser.pugx.org/orchid/socket/v/stable)](https://packagist.org/packages/orchid/socket)
[![Total Downloads](https://poser.pugx.org/orchid/socket/downloads)](https://packagist.org/packages/orchid/socket)
[![License](https://poser.pugx.org/orchid/socket/license)](https://packagist.org/packages/orchid/socket)




## Installation

1. install package

	```php
    composer require orchid/socket
	```

1. edit config/app.php

	service provider :

	```php
	Orchid\Socket\Providers\SocketServiceProvider::class
	```

1. structure

	```php
	php artisan vendor:publish
	```


## Usage

1. create socket listener

```php
// Create a new socket listener class
php artisan make:socket MyNameClass

//It will be created in the app/Socket/Listener
```

1. add socket route

```php
You will define most of the routes for your application in the app/Http/Socket/routes.php file
```

1. start socket server

```php
php artisan socket:serve
```



## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
