<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <div id="chat">

        <ul>
            <li v-for="message in messages">@{{ message }}</li>
        </ul>
        <form action="#" method="post" @submit.prevent="formSubmit">
            <input type="text" placeholder="Type something" v-model="message">
            <button type="submit">Send</button>
        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.min.js"></script>
    <script>
        var socket = io('http://localhost:8081');
        var vueApp = new Vue({
            el: "#chat",

            data: {
                message: '',
                messages: [],
            },

            methods: {
                formSubmit() {
                    socket.emit('chat.message', this.message);
                    this.message = '';
                }
            },

            mounted() {
                var vm = this;
                socket.on('test-channel:UserSignedUp', function( message ) {
                    vm.messages.push( message.username );
                });
            }
        });
    </script>
</body>
</html>
