<script setup>
import { ref, defineProps, onMounted } from "vue";
import axios from "axios";
const { user } = defineProps({
    user: {
        type: String,
    },
});

//state
const form = ref({
    name: "",
    email: "",
    phone: "",
    address: "",
    address2: "",
    pin_code: "",
    genre: "",
    birth_date: "",
});

const is_submit = ref(false);
const user_id = ref(null);

// methods
const isValidEmail = (email) => {
    return !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email);
};

const close = () => {
    const close_button = document.getElementById("profile-close");
    close_button.click();
    window.location.href = "/client";
};

onMounted(() => {
    const fill = JSON.parse(user);
    user_id.value = fill.id;
    form.value = {
        name: fill.name,
        email: fill.email,
        phone: fill.phone || "",
        address: fill.profile?.addresse || "",
        address2: fill.profile?.addresse2 || "",
        pin_code: fill.profile?.pin_code || "",
        genre: fill.profile?.genre || "",
        birth_date: fill.profile?.birth_date || "",
    };
});

const handelSubmit = () => {
    is_submit.value = true;
    if (
        (form.name !== "" &&
            form.email !== "" &&
            form.phone !== "" &&
            form.address !== "",
        form.genre !== "")
    ) {
        axios
            .post(`client/profile/update/${user_id.value}`, {
                name: form.value.name,
                email: form.value.email,
                phone: form.value.phone,
                address: form.value.address,
                address2: form.value.address2,
                pin_code: form.value.pin_code,
                genre: form.value.genre,
                birth_date: form.value.birth_date,
            })
            .then((res) => {
                console.log(res);
                if (res.data.success) {
                    close();
                }
            })
            .catch((err) => {
                console.log(err);
            });
    }
};
</script>

<template>
    <div>
        <div class="modal-body">
            <form class="row g-4">
                <div class="col-xxl-12">
                    <div class="form-floating theme-form-floating">
                        <input
                            type="text"
                            :class="
                                is_submit && form.name === ''
                                    ? 'is-invalid form-control'
                                    : 'form-control'
                            "
                            id="name"
                            v-model="form.name"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="is_submit && form.name === ''"
                        >
                            file name is required
                        </div>
                        <label for="name">Full Name</label>
                    </div>
                    <div class="form-floating theme-form-floating mt-3">
                        <select
                            :class="
                                is_submit && form.genre === ''
                                    ? 'is-invalid form-select'
                                    : 'form-select'
                            "
                            v-model="form.genre"
                            aria-label="Default select example"
                        >
                            <option selected value="">Genre</option>
                            <option value="home">Home</option>
                            <option value="femme">Femme</option>
                        </select>
                        <div
                            class="invalid-feedback"
                            v-if="is_submit && form.genre === ''"
                        >
                            file genre is required
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="form-floating theme-form-floating">
                        <input
                            :class="
                                (is_submit && form.email === '') ||
                                (isValidEmail(form.email) && form.email)
                                    ? 'is-invalid form-control'
                                    : 'form-control'
                            "
                            class="form-control"
                            id="email1"
                            v-model="form.email"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="is_submit && form.name === ''"
                        >
                            file email is required
                        </div>

                        <div
                            class="invalid-feedback"
                            v-if="is_submit && isValidEmail(form.email)"
                        >
                            file email not validade
                        </div>
                        <label for="email1">Email address</label>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="form-floating theme-form-floating">
                        <input
                            :class="
                                is_submit && form.phone === ''
                                    ? 'is-invalid form-control'
                                    : 'form-control'
                            "
                            type="tel"
                            name="mobile"
                            id="mobile"
                            maxlength="10"
                            v-model="form.phone"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="is_submit && form.phone === ''"
                        >
                            file email is required
                        </div>
                        <label for="mobile">Phone number</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating theme-form-floating">
                        <input
                            type="text"
                            :class="
                                is_submit && form.address === ''
                                    ? 'form-control is-invalid'
                                    : 'form-control'
                            "
                            v-model="form.address"
                        />

                        <div
                            class="invalid-feedback"
                            v-if="is_submit && form.address === ''"
                        >
                            file addres is required
                        </div>
                        <label for="address1">Add Address</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating theme-form-floating">
                        <input
                            type="text"
                            class="form-control"
                            id="address2"
                            v-model="form.addres2"
                        />
                        <label for="address2">Add Address 2</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating theme-form-floating">
                        <input
                            type="text"
                            class="form-control"
                            v-model="form.pin_code"
                        />
                        <label for="address3">Pin Code</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating theme-form-floating">
                        <input
                            type="date"
                            class="form-control"
                            v-model="form.birth_date"
                        />
                        <label for="address3">Birth date</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                id="profile-close"
                class="btn-animation bg-red-400 text-white px-3 py-3"
                data-bs-dismiss="modal"
            >
                Close
            </button>
            <button
                type="button"
                class="btn theme-bg-color btn-md fw-bold text-light"
                @click.prevent="handelSubmit"
            >
                Save changes
            </button>
        </div>
    </div>
</template>
