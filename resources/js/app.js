
import './bootstrap';
import { createApp } from 'vue';
import mitt from 'mitt';
const emitter = mitt();


const app = createApp({});

import BadgeIcon from './components/BadgeIcon.vue';
import AddToCartButton from './components/AddToCartButton.vue';
import Cart from './components/Cart.vue';
app.component('badge-icon', BadgeIcon);
app.component('add-to-cart-button', AddToCartButton);
app.component('cart', Cart);
app.config.globalProperties.emitter = emitter;


app.mount('#app');
