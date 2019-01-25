var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var reidis = new Redis();
reidis.subscribe('test-channel');

reidis.on('message', function(channel, message){
    message = JSON.parse(message);
    io.emit( channel + ":" + message.event, message.data );
});

server.listen(8081);
