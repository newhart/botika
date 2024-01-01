<script setup>
// import
import { ref, onMounted } from "vue";
import axios from "axios";

// all state
const count = ref(0);
const carts = ref([]);
let datas = [];

// all methods
const fetchData = () => {
    axios
        .get("/cart/counts")
        .then((res) => {
            console.log(res);
            count.value = res.data.counts;
            carts.value = res.data.carts;
            datas = res.data.carts;
        })
        .catch((error) => {
            console.log(error);
        });
};

const castArray = (val) => (Array.isArray(val) ? val : [val]);

const removeToCart = (id) => {
    carts.value = castArray(datas).filter((item) => item.id !== id);
    // axios
    //     .post(`/cart/remove/${id}`)
    //     .then((res) => {
    //         console.log(res);
    //         if (res.data.removed) {
    //             fetchData();
    //         }
    //     })
    //     .catch((error) => {
    //         console.log(error);
    //     });
};

// lifeCyle
onMounted(() => {
    fetchData();
});
</script>
<template>
    <div class="onhover-dropdown header-badge">
        <button type="button" class="btn p-0 position-relative header-wishlist">
            <i data-feather="shopping-cart"></i>
            <span
                class="position-absolute top-0 start-100 translate-middle badge"
            >
                {{ count }}
                <span class="visually-hidden">unread messages</span>
            </span>
        </button>

        <div class="onhover-div">
            <ul class="cart-list">
                <li
                    class="product-box-contain"
                    v-for="(cart, index) in carts"
                    :key="index"
                >
                    <div class="drop-cart">
                        <a href="#" class="drop-image">
                            <img
                                :src="cart.attributes.image"
                                class="blur-up lazyload"
                                alt=""
                            />
                        </a>

                        <div class="drop-contain">
                            <a href="#">
                                <h5>{{ cart.name }}</h5>
                            </a>
                            <h6>
                                <span>{{ cart.quantity }} x</span> ${{
                                    cart.price
                                }}
                            </h6>
                            <button
                                class="close-button close_button"
                                @click="removeToCart(cart.id)"
                            >
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="price-box">
                <h5>Total :</h5>
                <h4 class="theme-color fw-bold">$234</h4>
            </div>

            <div class="button-group">
                <a href="#" class="btn btn-sm cart-button">View Cart</a>
                <a
                    href="checkout.html"
                    class="btn btn-sm cart-button theme-bg-color text-white"
                    >Checkout</a
                >
            </div>
        </div>
    </div>
</template>
