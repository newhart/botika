<script setup>
import { defineProps, onMounted, ref } from "vue";

import axios from "axios";

const { datas, user } = defineProps({
    datas: {
        type: String,
    },
    user: {
        type: String,
    },
});
const form = ref({
    name: "",
    first_name: "",
    email: "",
    address: "",
    phone: "",
    type: "",
    pin_code: "",
});

const id = ref(null);

const close = () => {
    const close_button = document.getElementById("close");
    close_button.click();
    window.location.href = "/client";
};

const isSubmit = ref(false);

const handelSubmit = () => {
    isSubmit.value = true;
    if (
        form.name !== "" &&
        form.first_name !== "" &&
        form.email !== "" &&
        form.phone !== "" &&
        form.type !== "" &&
        form.pin_code !== "" &&
        form.address !== ""
    ) {
        axios
            .post(`/client/address/${id.value}/edit`, {
                author: form.value.name,
                first_name: form.value.first_name,
                type: form.value.type,
                phone: form.value.phone,
                pin_code: form.value.pin_code,
                email: form.value.email,
                address: form.value.address,
            })
            .then((res) => {
                console.log(res);
                if (res.data.success) {
                    close();
                }
            })
            .catch((error) => {
                console.log(error);
            });
    } else {
        return false;
    }
};

onMounted(() => {
    const fill = JSON.parse(datas);
    id.value = fill.id;
    form.value = {
        name: fill.author,
        first_name: fill.first_name,
        type: fill.type,
        pin_code: fill.pin_code,
        email: fill.email,
        address: fill.address,
        phone: fill.phone,
    };
});
</script>

<template>
    <form class="modal-content" method="POST" @submit.prevent="handelSubmit()">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">
                Update a new address
            </h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-4 theme-form-floating">
                <input
                    type="text"
                    :class="
                        isSubmit && form.name === ''
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="author"
                    placeholder="Enter First Name"
                    v-model="form.name"
                    name="author"
                />
                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.name === ''"
                >
                    the file name is required
                </div>
                <label for="author">First Name</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <input
                    type="text"
                    :class="
                        form.first_name === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="lname"
                    placeholder="Enter Last Name"
                    v-model="form.first_name"
                />

                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.first_name === ''"
                >
                    the file first name is required
                </div>
                <label for="lname">Last Name</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <input
                    v-model="form.email"
                    type="email"
                    :class="
                        form.email === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="email"
                    placeholder="Enter Email Address"
                />

                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.email === ''"
                >
                    the file email is required
                </div>
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <textarea
                    v-model.trim="form.address"
                    :class="
                        form.address === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    placeholder="Leave a comment here"
                    id="address"
                    style="height: 100px"
                ></textarea>

                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.address === ''"
                >
                    the file address is required
                </div>
                <label for="address">Enter Address</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <input
                    v-model="form.phone"
                    type="text"
                    :class="
                        form.phone === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="phpne"
                    placeholder="Enter your phone number"
                />

                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.phone === ''"
                >
                    the file phone is required
                </div>
                <label for="phone">Phone Number</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <input
                    type="text"
                    :class="
                        form.type === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="type"
                    placeholder="Example Home..."
                    v-model="form.type"
                />
                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.type === ''"
                >
                    the file type is required
                </div>
                <label for="type">Type</label>
            </div>

            <div class="form-floating mb-4 theme-form-floating">
                <input
                    type="text"
                    :class="
                        form.pin_code === '' && isSubmit
                            ? 'form-control is-invalid'
                            : 'form-control'
                    "
                    id="pin_code"
                    placeholder="Code pine"
                    v-model="form.pin_code"
                />
                <div
                    class="invalid-feedback"
                    v-if="isSubmit && form.pin_code === ''"
                >
                    the file pin code is required
                </div>
                <label for="pin_code">Code Pine</label>
            </div>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-secondary btn-md"
                data-bs-dismiss="modal"
                id="close"
            >
                Close
            </button>
            <button type="submit" class="btn theme-bg-color btn-md text-white">
                Save changes
            </button>
        </div>
    </form>
</template>
