<template>
    <section id="home-area">
        <div class="container bg-white p-5">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                    </div>
                </form>
                </div>
                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Valid last name is required.
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                        <option value="">Choose...</option>
                        <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                        Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                        <option value="">Choose...</option>
                        <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                        Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                        Zip code required.
                        </div>
                    </div>
                    </div>

                    <hr class="mb-4">

                    <div class="border rounded row p-1 mt-1 mb-2" style="margin-left:1px;">
                        <div class="col-2 p-0 m-0">
                            <img src="/images/visa.png" width="100%" class="float-right">
                        </div>
                        <div class="col-8 p-0 m-0">
                            <div class="" style="margin-top:20px;">

                            </div>
                        </div>
                        <div class="col-2" style="margin-top:20px;">
                            <a href="#">Remove</a>
                        </div>
                    </div>

                    <h4 class="mb-3">Payment</h4>
                    <div class="row">
                    <div class="col-md-9 mb-3">
                        <div ref="card" class="form-control" height="2.4em" padding-top=".7em"></div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-success" @click.prevent="submitPaymentMethod">Save</button>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Place Order</button>
                </form>
                </div>
            </div>
            </div>
    </section>
</template>

<script>
import {loadStripe} from '@stripe/stripe-js';
const stripe = await loadStripe('ysk_test_51JgSqXLC3QbVFvyu1O4sBQl7fBPhCkDZlZ8CWstykRJPhZ6Q0dcViZtwwoOUjXxzn4ccCgh6Ah5uDaRuxgQU1UhK007Tz92DO6');
let elements = stripe.elements()

export default {
    name: "Checkout",
    data() {
        return {
            card: '',
        }
    },
    mounted() {
        this.loadIntent()
        this.card = elements.create('card')
        this.card.mount(this.$refs.card)
    },
    methods: {
        async loadIntent() {
            let response = await axios.get('/user/setup-intent')
            this.intentToken = response.data
            console.log(this.intentToken)
        },
        async loadPaymentMethods() {
            let response = await axios.get('/user/payment-methods')
        },
        submitPaymentMethod() {

        }
    }
}
</script>

<style>

</style>
