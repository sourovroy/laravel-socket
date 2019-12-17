import Vuex from 'vuex';
import socketClient from 'socket.io-client';

const store = new Vuex.Store({
    state: {
        user: {}
    },

    getters: {
        user( state ) {
            return state.user;
        }
    },

    mutations: {
        setAuthUser( state, payload ) {
            state.user = payload;
        }
    },
    actions: {
        getAuthUser( context ) {
            axios.get( '/me' ).then( (response) => {
                context.commit( 'setAuthUser', response.data );

                window.chatClient = socketClient('http://localhost:8081/chatting', {
                    query: { user_id: response.data.id }
                });
            });
        }, // getAuthUser
    }

});

export default store;
