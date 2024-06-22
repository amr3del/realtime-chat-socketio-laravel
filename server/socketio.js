var app    = require('express')();
var server = require('http').Server(app);
var io     = require('socket.io')(server);
var Redis  = require('ioredis');
var redis  = new Redis();

redis.subscribe('chat', (err, count) => {
    if (err) {
        console.error('Failed to subscribe:', err);
    } else {
        console.log(`Subscribed to ${count} channel(s)`);
    }
});

redis.on('message',(channel, message) => {
    console.log('Message Received');
    message = JSON.parse(message);
    console.log(message);

    const sender = message.data.sender.id;
    const reciver = message.data.reciver.id;
    
    io.emit(`chat:${message.event}:${sender}:${reciver}`, message.data);
});

server.listen(3000,() => {
    console.log('listening on *:3000');
});

io.on('connection', (socket) => {
    console.log('Client connected');

    socket.on('disconnect', () => {
        console.log('Client disconnected');
    });
});
