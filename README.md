<p align="center">
<a href="https://github.com/TheOrchid/Platform"><img height="120"  src="https://cloud.githubusercontent.com/assets/5102591/22400427/ecfae2ce-e5c5-11e6-8430-16eef73c01a5.png">
</a>
</p>




<p align="center">
Laravel  library for asynchronously serving WebSockets. <br> Build up your application through simple interfaces and re-use your application without changing any of its code just by combining different components.
</p>

<p align="center">
<a href="https://www.paypal.me/tabuna/10usd"><img src="https://img.shields.io/badge/Donate-PayPal-green.svg"></a>
<a href="https://insight.sensiolabs.com/projects/044d975d-c934-4d2a-9fb0-ffdf065db545"><img src="https://insight.sensiolabs.com/projects/044d975d-c934-4d2a-9fb0-ffdf065db545/mini.png?2"/></a>
<a href="https://styleci.io/repos/48105071"><img src="https://styleci.io/repos/48105071/shield?branch=master"/></a>
<a href="https://packagist.org/packages/orchid/socket"><img src="https://poser.pugx.org/orchid/socket/v/stable"/></a>
<a href="https://packagist.org/packages/orchid/socket"><img src="https://poser.pugx.org/orchid/socket/downloads"/></a>
<a href="https://packagist.org/packages/orchid/socket"><img src="https://poser.pugx.org/orchid/socket/license"/></a>
</p>



# Laravel WebSocket

Socket - full-duplex communication protocol over the TCP-connection for exchanging messages between the browser and web server in real time.

WebSocket is designed to implement in the web-browser and web-server, but it can be used for any client or server application.

Protocol WebSocket - an independent protocol based on the TCP protocol. It enables greater interaction between the browser and the web site, promoting the dissemination of interactive content and the creation of real-time games.





## Installation Laravel WebSocket

install package

```php
$ composer require orchid/socket
```

edit config/app.php service provider : (Laravel < 5.5)

```php
Orchid\Socket\Providers\SocketServiceProvider::class
```

structure

```php
php artisan vendor:publish
```


## Usage

### Creature :
	
To create a new listener, you need to	
```php
php artisan make:socket MyNameClass
```

In the folder `app/HTTP/Socket/Listener` create template Web listener socket

After creating a need to establish a route which Is located `routes/socket.php`

```php
//routing is based on an Symfony Routing Component
$socket->route('/myclass', new MyClass, ['*']);
```

To launch the web-socket, use the command:
```php
php artisan socket:serve
```

### FAQ



#### JavaScript

Connecting Web socket in JavaScript

```javascript
var socket = new WebSocket("ws://localhost");

socket.onopen = function() {
  alert("The connection is established.");
};

socket.onclose = function(event) {
  if (event.wasClean) {
    alert('Connection closed cleanly');
  } else {
    alert('Broken connections'); 
  }
  alert('Key: ' + event.code + ' cause: ' + event.reason);
};

socket.onmessage = function(event) {
  alert("The data " + event.data);
};

socket.onerror = function(error) {
  alert("Error " + error.message);
};


//To send data using the method socket.send(data).

//For example, the line:
socket.send("Hello");

```



#### Authorization

Example of installation numbers unique socket and session laravel
```php

public function onOpen(ConnectionInterface $conn)
{
    $this->clients->attach($conn);
    
    //take user id
    $userId = $this->getUserFromSession($conn);
    
    //Create a list of users connected to the server
    array_push($this->userList, $userId);
    
    //We tell everything that happened
    echo "New connection! user_id = ({$userId})\n";
}

public function getUserFromSession($conn)
{
    // Create a new session handler for this client
    $session = (new SessionManager(App::getInstance()))->driver();
    
    // Get the cookies
    $cookies = $conn->WebSocket->request->getCookies();
    
    // Get the laravel's one
    $laravelCookie = urldecode($cookies[Config::get('session.cookie')]);
    
    // get the user session id from it
    $idSession = Crypt::decrypt($laravelCookie);
    
    // Set the session id to the session handler
    $session->setId($idSession);
    
    // Bind the session handler to the client connection
    $conn->session = $session;
    $conn->session->start();
    
    //We take the user from a session
    $userId = $conn->session->get(Auth::getName());
    return $userId;
}

```


#### Nginx proxy

```nginx
    map $http_upgrade $connection_upgrade {
        default upgrade;
        '' close;
    }

    upstream websocket {
        server you-web-site.com:5300;
    }

    server {
        listen 443;
        location / {
            proxy_pass http://websocket;
            proxy_http_version 1.1;
            proxy_set_header Upgrade $http_upgrade;
            proxy_set_header Connection $connection_upgrade;


                proxy_set_header Host $host;
                proxy_set_header X-Real-IP $remote_addr;
                proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_set_header X-Forwarded-Proto https;
            proxy_redirect off;
        }
    }
```


#### Supervisor

```bash
[program:laravel-socket]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/your-path/artisan socket:serve
autostart=true
autorestart=true
user=root
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/your-path/storage/logs/socket.log
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
