<template>
  <section id="home-area">
        <div class="container bg-white">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(basket, index) in basketList" :key="index">
                                <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" :src="'/images/'+ basket.product.image_name" style="height: 100px;"> </a>
                                    <div class="media-body ml-1">
                                        <h4 class="media-heading"><a href="#">Product name</a></h4>
                                        <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                    </div>
                                </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="email" class="form-control" id="exampleInputEmail1" :value="basket.qty">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{ formatPrice(basket.price)  }}</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{ formatPrice(basket.price * basket.qty) }}</strong></td>
                                <td class="col-sm-1 col-md-1">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong>{{ formatPrice(subtotal) }}</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Estimated shipping</h5></td>
                                <td class="text-right"><h5><strong>£2.95</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>{{ formatPrice(total) }}</strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </button></td>
                                <td>
                                <a href="/checkout" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Cart",
    data() {
        return {
            subtotal: ''
        }
    },
    props: {
        basketList: {
            required: true,
            type: Object,
        }
    },
    mounted() {
        let sum = 0
        for(let i = 0; i < this.basketList.length; i++) {
            sum += this.basketList[i].price * this.basketList[i].qty
        }
        this.subtotal = sum
    },
    computed: {
        total() {
            return this.subtotal + 2.95
        }
    },
    methods: {
        formatPrice(value) {
        return '£' + parseFloat(value).toFixed(2);
        },
    },
}
</script>

<style>

</style>
