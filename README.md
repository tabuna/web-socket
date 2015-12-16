# socket
Socket Server for Laravel 5 


[![Latest Stable Version](https://poser.pugx.org/orchid/socket/v/stable)](https://packagist.org/packages/orchid/settings)
[![Total Downloads](https://poser.pugx.org/orchid/socket/downloads)](https://packagist.org/packages/orchid/settings)
[![License](https://poser.pugx.org/orchid/socket/license)](https://packagist.org/packages/orchid/settings)




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

1. create settings table

	```php
	php artisan vendor:publish
	```

## Usage

```php
// start socket serve
php artisan socket:serve


// make listener
php artisan make:socket



Desc add Later...


```
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
