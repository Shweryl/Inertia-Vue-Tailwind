<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import inputText from "../Components/inputText.vue";

let form = useForm({
    email: null,
    password: null,
    remember: false,
});

let submit = () => {
    form.post("/login", {
        onError: () => form.reset("password", "remember"), //reset only password and remember field if errors occcur
    });
};
</script>
<template>
    <Head title="Register" />
    <div class="mx-w-screen-lg flex justify-center mx-auto">
        <div class="w-1/3 bg-purple-200 mt-5 p-5 rounded-md shadow-md">
            <h1 class="text-center text-2xl font-bold">Login</h1>
            <div class="mt-3">
                <form action="" @submit.prevent="submit" class="space-y-3">
                    <inputText
                        name="Email"
                        type="email"
                        v-model="form.email"
                        :message="form.errors.email"
                    />
                    <inputText
                        name="Password"
                        type="password"
                        v-model="form.password"
                        :message="form.errors.password"
                    />
                    <div class="flex space-x-2 items-center">
                        <input name="remember" type="checkbox" class="border-purple-700 hover:ring-purple-500" v-model="form.remember">
                        <label for="">Remember me</label>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-semibold">
                            Need an account?
                            <Link :href="route('register')" class="text-purple-700">Register</Link>
                        </p>
                        <!-- disable buttom when submitting form -->
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="bg-purple-700 py-2 px-3 rounded-md text-white hover:bg-purple-800 hover:ring-purple-200"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
