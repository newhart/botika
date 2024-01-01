<script setup>
import { ref, defineProps, onMounted } from "vue";
import axios from "axios";
// all props
const { email_value, user_id } = defineProps({
    email_value: {
        type: String,
    },
    user_id: {
        type: String,
    },
});
// all state
const is_email_email = ref(false);
const model_email = ref("");
const model_password = ref("");
const is_password_update = ref(false);
const is_submit_email = ref(false);
const is_submit_password = ref(false);
const id = ref(null);
// lifecycle
onMounted(() => {
    if (is_submit_email === false) {
        model_email.value = email_value;
    }
    id.value = user_id;
});

// methods
const handelSubimitEmail = () => {
    is_submit_email.value = true;
    if (model_email.value !== "") {
        axios
            .post(`client/login-detail/${id.value}`, {
                email: model_email.value,
            })
            .then((res) => {
                console.log(res);
                if (res.data.success) {
                    is_email_email.value = false;
                    model_email.value = res.data.success;
                    // is_submit_email.value = false;
                }
            })
            .catch((err) => {
                console.log(err);
            });
    }
};

const handelSubmitPassword = () => {
    console.log("passwor chaged");
    is_submit_password.value = true;
    if (model_password.value !== "") {
        axios
            .post(`client/login-detail/${user_id}`, {
                password: model_password.value,
            })
            .then((res) => {
                console.log(res);
                if (res.data.success) {
                    is_password_update.value = false;
                    is_submit_password.value = false;
                }
            })
            .catch((err) => {
                console.log(err);
            });
    }
};
</script>

<template>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td>Email :</td>
                    <td>
                        <div class="flex gap-2 justify-between">
                            <a href="" v-if="is_email_email === false">{{
                                email_value
                            }}</a>
                            <input
                                v-if="is_email_email"
                                type="text"
                                :class="
                                    is_submit_email && model_email === ''
                                        ? 'form-control is-invalid'
                                        : 'form-control'
                                "
                                class="form-control"
                                v-model="model_email"
                            />
                            <!-- <div
                                    class="invalid-feedback"
                                    v-if="is_submit_email && model_email === ''"
                                >
                                    the field email is required
                                </div> -->
                            <span
                                v-if="is_email_email === false"
                                class="bg-slate-300 px-2 py-2 rounded-sm"
                                style="cursor: pointer"
                                @click="() => (is_email_email = true)"
                                >Edit</span
                            >

                            <span
                                v-if="is_email_email"
                                style="cursor: pointer"
                                class="bg-red-400 px-2 py-2 rounded-md text-white"
                                @click.prevent="handelSubimitEmail()"
                                >Submit</span
                            >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td>
                        <div class="flex justify-between gap-2">
                            <a href="" v-if="is_password_update === false"
                                >●●●●●●</a
                            >
                            <input
                                v-if="is_password_update"
                                type="password"
                                :class="
                                    is_submit_password && model_password === ''
                                        ? 'form-control is-invalid'
                                        : 'form-control'
                                "
                                placeholder="Enter your password"
                                v-model="model_password"
                            />
                            <span
                                style="cursor: pointer"
                                v-if="is_password_update === false"
                                @click="() => (is_password_update = true)"
                                class="bg-slate-300 px-2 py-2 rounded-mdcursor-pointer"
                                >Edit</span
                            >
                            <span
                                style="cursor: pointer"
                                v-if="is_password_update"
                                @click="handelSubmitPassword()"
                                class="bg-red-400 px-2 py-2 rounded-md text-white cursor-pointer"
                                >Submit</span
                            >
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
