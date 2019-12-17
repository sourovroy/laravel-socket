<template>
    <form action="#" method="post" @submit.prevent="onSubmit">
        <div class="form-inline">
            <input class="form-control mr-sm-2" placeholder="Type your message" v-model="message">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        }, // data

        methods: {
            onSubmit() {
                axios.post('/chat/send', {message: this.message}).then((response) => {
                    if ( response.data.success ) {
                        this.message = '';
                    }
                });
            }
        }, // methods
    };
</script>

<style scoped>
    input.form-control{
        width: calc(100% - 70px);
    }
</style>
