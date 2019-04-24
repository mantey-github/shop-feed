<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Shop Feeds</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Feed as CSV</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="feed in feeds" :key="feed.id">
                                        <th scope="row">{{ feed.id }}</th>
                                        <td>{{ feed.product_name }}</td>
                                        <td>{{ feed.product_brand }}</td>
                                        <td>{{ feed.product_pricing }}</td>
                                        <td><a v-bind:href="getFeedUrl(feed.id)" download="">Get Feed</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /*eslint no-console: ["error", { allow: ["warn", "error"] }] */

    export default {
        name: "Feed",

        data: function () {
            return {
                feeds: [],
            }
        },

        mounted: function () {
            this.getFeeds()
        },

        methods: {
            getFeeds: function () {
                this.axios.get('/feeds')
                    .then(response => {
                        this.feeds = response.data.feeds;
                    });
            },

            getFeedUrl: function (id) {
                return this.axios.defaults.baseURL + '/feeds/' + id;
            }
        }
    }
</script>

<style scoped>

</style>