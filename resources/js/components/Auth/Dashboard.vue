<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Dashboard Page
                    </div>
                    <div class="card-body">
                        <p v-if="user" class="card-text">Hello, <strong>{{ user.name }}</strong> You are logged in!</p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</template>


<script>

    export default {
        data() {
        return {
            user: null
        }
    },

    mounted() {
        this.getUserDetails();
    },

    methods: {
        getUserDetails() {
            axios.get('api/user')
                .then( response => {
                    this.user = response.data;
                    //console.log("user:- " + this.user);
                })
                .catch( error => {

                })
        }
    }
}

</script>
