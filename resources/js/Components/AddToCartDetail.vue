<script setup>
// import 
import { ref, defineProps, onMounted } from 'vue'
// state
const quantity = ref(1)
const product_module = ref({});
const text_button = ref('Add to cart');
const is_submit = ref(false)

// all props
const { product, image_url, position } = defineProps({
    product: {
        type: String,
    },

    image_url: {
        type: String,
    },
    position: {
        type: String
    }
});
// methods 
const plusQuantity = () => {
    quantity.value++
}

const minusQuantity = () => {
    quantity.value--
    if (quantity.value == 0) {
        quantity.value = 1
    }
}

const showNotification = () => {
    const show = document.querySelector(".modal-backdrop");
    show?.classList?.add("show");
    $.notify(
        {
            icon: "fa fa-check",
            title: "Success!",
            message: "Item Successfully added in cart",
        },
        {
            element: "body",
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
};

const handelAddToCart = () => {
    is_submit.value = true
    text_button.value = 'Chargement...'
    // post the cart in api 
    axios
        .post("/cart/store", {
            id: product_module.value.id,
            name: product_module.value.name,
            price: product_module.value.price,
            slug: product_module.value.page_title,
            compare_at_price: product_module.value.compare_at_price,
            quantity: quantity.value,
            image: image_url,
        })
        .then((res) => {
            if (res.data.added) {
                showNotification();
                // rese to default  value 
                is_submit.value = false;
                text_button.value = 'Add to Cart'
            }
        })
        .catch((err) => {
            console.log(err);
        });
};

// lifeCycle
onMounted(() => {
    const product_parsed = JSON.parse(product);
    product_module.value = product_parsed;
});
</script>

<template>
    <form action="" method="POST" class="note-box product-packege">
        <div class="cart_qty qty-box product-qty">
            <div class="input-group">
                <button type="button" class="qty-right-plus" data-type="plus" data-field="" @click="plusQuantity()">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <input class="form-control input-number qty-input" type="text" name="quantity" :value="quantity">
                <button type="button" class="qty-left-minus" data-type="minus" @click="minusQuantity()" data-field="">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <button class="btn btn-md bg-dark cart-button text-white w-100" @click.prevent="handelAddToCart()">{{ text_button
        }}</button>
    </form>
</template>