<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Students</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Students</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Students</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Students</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Currency: GHS</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">narch.shopfeed.com</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    Narch
                                </div>
                                <div class="mr-5">Students</div>
                            </div>
                            <a class="card-footer clearfix small z-1" href="#" style="color: #000000a1">
                                <span class="float-left">View Details</span>
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