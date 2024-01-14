import "./bootstrap";

// import Alpine from "alpinejs";
import { createApp } from "vue";

import AdressForm from "./Components/AdressForm.vue";
import EditAdress from "./Components/EditAdress.vue";
import FormProfile from "./Components/FormProfile.vue";
import LoginDetail from "./Components/LoginDetail.vue";
import AddToCart from "./Components/AddToCart.vue";
import Cart from "./Components/Cart.vue";
import CartDetail from "./Components/CartDetail.vue";
import AddToCartDetail from "./Components/AddToCartDetail.vue";

// window.Alpine = Alpine;

// Alpine.start();

createApp({})
    .component("AdressForm", AdressForm)
    .component("EditAdress", EditAdress)
    .component("CartDetail", CartDetail)
    .component("FormProfile", FormProfile)
    .component("LoginDetail", LoginDetail)
    .component("AddToCart", AddToCart)
    .component("AddToCartDetail", AddToCartDetail)
    .component("Cart", Cart)
    .mount("#app");
