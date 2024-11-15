<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Authentication App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" aria-current="page">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/about" class="nav-link" aria-current="page">About</router-link>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <router-link v-if="isAuthenticated" to="/dashboard" class="btn btn-outline-success">Dashboard</router-link> &nbsp;
                    <!-- <a v-if="isAuthenticated" @click="logout" class="btn btn-outline-danger">Logout</a>  -->
                    <a v-if="isAuthenticated" @click="logout" role="button" class="btn btn-outline-danger">Logout</a> &nbsp;
                    <router-link v-if="!isAuthenticated" to="/login" class="btn btn-outline-primary">Login</router-link> &nbsp;
                    <router-link v-if="!isAuthenticated" to="/register" class="btn btn-outline-primary">Register</router-link> &nbsp;
                </form>
                </div>
            </div>
        </nav>
    </div>
    <router-view></router-view>
</template>

<script>

    import { mapGetters } from 'vuex';

    export default {

        mounted() {
            this.$store.dispatch('checkUserAuthenticationStatus');
            //console.log(this.authToken);
        },

        computed: {

            // Mapping the 'isAuthenticatedCheck' getter from the Vuex store to a computed property
            // ...mapGetters({
            //         isAuthenticated: 'isAuthenticatedCheck' // 1 Method to check user logged in status using getters
            //     }),

            isAuthenticated() {
                return this.$store.state.isAuthenticated //2 Method check user logged in status using state
                //return this.$store.getters.isAuthenticatedCheck // 3 Methodcheck user logged in status using getters
            },

            authToken() {
                return this.$store.state.token
            },
        },

        methods: {
            logout() {
                axios.post('api/logout')
                    .then( response => {
                        //console.log(response.data)

                        //dispatch logout from Store/index.js
                        this.$store.dispatch('logout');
                        this.$router.push({ name: 'login' });
                    })
                    .catch( error => {
                        console.error('Error logging out:', error);
                        alert('Failed to log out. Please try again.');
                    })
            }
        },
    }


</script>


