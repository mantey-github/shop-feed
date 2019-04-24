<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Login or Register</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" v-on:submit.prevent="login()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" id="name" type="text"
                                       class="form-control" v-model.trim="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="email"
                                       class="form-control" v-model.trim="email" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Continue"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /*eslint no-console: ["error", { allow: ["warn", "error"] }] */

    export default {
        name: "Login",

        data: function () {
            return {
                name: '',
                email: ''
            }
        },

        methods: {
            login: function () {
                this.axios.post('/create/user', {
                    name: this.name,
                    email: this.email,

                }).then((response) => {

                    console.warn(response.data);

                    if (response.data.user) {
                        localStorage.setItem('user',JSON.stringify(response.data.user));
                        localStorage.setItem('token',response.data.token);

                        if (localStorage.getItem('token') != null){
                            this.$emit('loggedIn');
                            if(this.$route.params.nextUrl != null){
                                // this.$router.push(this.$route.params.nextUrl)
                                this.$router.go(-1);
                            }
                            else {
                                this.$router.go();
                            }
                        }

                        return
                    }

                    alert(response.data.errors);
                });
            },

            resetForm: function () {
                this.name = '';
                this.email = '';

            }


        }
    }
</script>

<style scoped>

</style>