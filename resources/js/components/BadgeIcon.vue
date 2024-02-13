<template>
    <span class="badge badge-pill badge-warning align-top">{{ basketCount }}</span>
</template>

<script>
export default {
    name: "BadgeIcon",
    data(){
        return {
            basketCount: ''
        }
    },
    mounted() {
        this.emitter.on('changeBasketCount', (newBasketCount) => {
            this.basketCount = newBasketCount
        })
    }
}
</script>

<style>

</style>
