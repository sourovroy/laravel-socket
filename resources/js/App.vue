<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/">Chat App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ user.name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <active-users></active-users>
                    </div>
                    <div class="col-md-8">
                        <chat-list></chat-list>
                        <chat-form></chat-form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import ChatForm from './components/ChatForm.vue';
    import ChatList from './components/ChatList.vue';
    import ActiveUsers from './components/ActiveUsers.vue';

    export default {
        components: {
            ChatForm,
            ActiveUsers,
            ChatList
        },

        data() {
            return {

            }
        }, // data

        created() {
            this.$store.dispatch('getAuthUser');
        },

        computed: {
            user() {
                return this.$store.getters.user;
            }
        }
    };
</script>

<style scoped>
    section{
        padding: 50px 0;
    }
</style>
