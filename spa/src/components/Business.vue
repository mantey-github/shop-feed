<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div v-for="shop in shops" :key="shop.id" class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    {{shop.shop_name}}
                                </div>
                                <div class="mr-5">{{shop.currency}}</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left"> {{shop.shop_url}}</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
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
        name: "Business",

        data: function () {
            return {
                shops: []
            }
        },

        mounted: function () {
            this.getShops();
        },

        methods: {
            getShops: function () {
                this.axios.get('/shops')
                    .then(response => {
                        this.shops = response.data.shops;
                    });
            },
        }
    }
</script>

<style scoped>

</style>