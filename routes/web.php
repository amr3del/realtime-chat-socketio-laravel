<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // 1. Publish event with redis
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'JohnDoe'
        ]
    ];
    Redis::publish('test-channel', json_encode($data));

    return 'Event has been sent!';
    // 2. node.js + redis subscribe to the channel
    // 3. use socket.io to emit to all clients
});

require __DIR__.'/auth.php';

