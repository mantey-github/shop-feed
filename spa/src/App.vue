<template>
    <div id="app" class="container">
        <nav v-if="this.is_auth" class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link :to="{ name: 'dashboard' }" class="nav-link">Dashboard</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'business' }" class="nav-link">Businesses</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'feed' }" class="nav-link">Feeds</router-link>
                </li>
                <li class="nav-item">
                    <a v-on:click.stop.prevent="logout()" href="#" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <transition name="fade">
            <div class="gap">
                <router-view></router-view>
            </div>
        </transition>
    </div>


</template>

<script>
    /*eslint no-console: ["error", { allow: ["warn", "error"] }] */

    export default {
        name: 'app',

        methods: {
            logout: function () {
                localStorage.removeItem('user');
                localStorage.removeItem('token');

                this.$router.go();
            }
        }

    }

</script>

<style>

    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
        margin-top: 40px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }

    .gap {
        margin-top: 50px;
    }

</style>
