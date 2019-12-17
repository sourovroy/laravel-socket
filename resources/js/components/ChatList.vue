<template>
    <div>
        <div class="alert alert-secondary" role="alert">
            A simple secondary alert—check it out!
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: []
            }
        }, // data

        mounted() {
            socketIo.on('chatting:SendMessage', ( message ) => {
                console.log(message);
                // vm.messages.push( message.username );
            });
        }
    }
</script>

<style scoped>
    input.form-control{
        width: calc(100% - 70px);
    }
</style>
