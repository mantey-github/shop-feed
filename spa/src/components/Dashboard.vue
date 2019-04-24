<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Create a Business</h3>
                    </div>
                    <div class="card-body">
                        <form  class="form-horizontal" v-on:submit.prevent="createBusiness()">
                            <div class="form-group">
                                <label for="shop_name">Shop Name:</label>
                                <input name="shop_name" id="shop_name" type="text"
                                       class="form-control" v-model.trim="shop_name" required/>
                            </div>
                            <div class="form-group">
                                <label for="shop_url">Shop Domain (URL):</label>
                                <input name="shop_url" id="shop_url" type="text"
                                       class="form-control" v-model.trim="shop_url" required/>
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency:</label>
                                <input name="currency" id="currency" type="text"
                                       class="form-control" v-model.trim="currency" required placeholder="GHS"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save"/>
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
        name: "CreateBusiness",

        data: function () {
            return {
                shop_name: '',
                shop_url: '',
                currency: '',
            }
        },

        methods:  {
            createBusiness: function () {

                console.warn(this.axios.defaults);

                this.axios.post('/shop', {
                    shop_name: this.shop_name,
                    shop_url: this.shop_url,
                    currency: this.currency,

                }).then((response) => {

                    console.warn(response.data)

                });
            },


        }
    }
</script>

<style scoped>

</style>