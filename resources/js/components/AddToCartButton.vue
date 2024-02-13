<template>
    <a href="" @click.prevent="addToCart()"><i class="icon-shopping-cart2"></i> Add to cart</a>
</template>

<script>
export default {
    name: "AddToCartButton",
    props: {
        product: {
            required: true,
            type: Object
        }
    },
    methods: {
        async addToCart() {
            // console.log('product_id', this.product.id)
            let response = await axios.post('/cart', { 'product_id': this.product.id })
            this.emitter.emit('changeBasketCount', response.data.basket_count)
            console.log(response.data)
        }
    }
}
</script>

<style scoped>

</style>
