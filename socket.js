var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redisClient = new Redis();

var Chatting = io.of('/chatting');

Chatting.on('connection', function (socket) {
    console.log('Chat connection added');
    // console.log("handshake ==== ", socket.handshake);

    if ( socket.handshake.query.user_id ) {
        redisClient.sadd('users:online', socket.handshake.query.user_id)
        .catch((error) => {
            console.log( "SADD Error:-> == ",  error );
        });
    }

    socket.on('disconnect', function () {
        redisClient.srem('users:online', socket.handshake.query.user_id)
        .catch((error) => {
            console.log( "SREM Error:-> == ",  error );
        });
    });
});

/*io.on('connection', function (socket) {
    console.log('New connection added on Default IO');
});*/

var redis = new Redis();
redis.subscribe('chatting');

redis.on('message', function(channel, message){
    // console.log(channel, message);
    message = JSON.parse(message);
    Chatting.emit( channel + ":" + message.event, message.data );
});


server.listen(8081);
