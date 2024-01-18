
import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import BadgeIcon from './components/BadgeIcon.vue';
import AddToCartButton from './components/AddToCartButton.vue';
app.component('badge-icon', BadgeIcon);
app.component('add-to-cart-button', AddToCartButton);


app.mount('#app');
