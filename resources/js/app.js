import "./bootstrap";

// import Alpine from "alpinejs";
import { createApp } from "vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import AdressForm from "./Components/AdressForm.vue";
import EditAdress from "./Components/EditAdress.vue";
import FormProfile from "./Components/FormProfile.vue";
import LoginDetail from "./Components/LoginDetail.vue";
import AddToCart from "./Components/AddToCart.vue";
import Cart from "./Components/Cart.vue";
import CartDetail from "./Components/CartDetail.vue";
import AddToCartDetail from "./Components/AddToCartDetail.vue";
import ShopList from "./Components/ShopList.vue";

// import icon
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faPhone,
    faShoppingCart,
    faEye,
    faArrowsRotate,
    faHeart,
} from "@fortawesome/free-solid-svg-icons";
library.add(faPhone, faShoppingCart, faEye, faArrowsRotate, faHeart);

createApp({})
    .component("AdressForm", AdressForm)
    .component("EditAdress", EditAdress)
    .component("CartDetail", CartDetail)
    .component("FormProfile", FormProfile)
    .component("LoginDetail", LoginDetail)
    .component("AddToCart", AddToCart)
    .component("AddToCartDetail", AddToCartDetail)
    .component("FontAwesomeIcon", FontAwesomeIcon)
    .component("ShopList", ShopList)
    .component("Cart", Cart)
    .mount("#app");
