<?php

return [

    /*
     * $httpHost HTTP hostname clients intend to connect to.
     * MUST match JS `new WebSocket('ws://$httpHost')`.
     */
    'httpHost'    => env('SOCKET_HTTP_HOST', 'localhost'),

    /*
     * Port to listen on. If 80, assuming production,
     * Flash on 843 otherwise expecting Flash to be proxied through 8843
     */
    'port'        => env('SOCKET_PORT', '8080'),

    /*
     * Public port for Nginx
     */
    'public_port' => env('SOCKET_PUBLIC_PORT', '443'),

    /*
     * IP address to bind to. Default is localhost/proxy only.
     * `0.0.0.0` for any machine.
     */
    'address'     => env('SOCKET_ADDRESS', '127.0.0.1'),
];
