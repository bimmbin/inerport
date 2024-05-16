<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    username: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <div class="flex justify-center w-full h-screen mt-20 sm:mt-40">
            <form @submit.prevent="submit" class="w-full sm:w-[25rem]">
                <div>
                    <InputLabel
                        for="username"
                        value="Username"
                        class="text-white"
                    />

                    <input
                        id="username"
                        type="text"
                        class="mt-1 block w-full rounded-md shadow-sm bg-input_bg dark:text-gray-300 focus:border-main dark:focus:border-main focus:ring-main dark:focus:ring-main border-[#482A1F] px-3 py-2"
                        v-model="form.username"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Username"
                    />

                    <InputError class="mt-2" :message="form.errors.username" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password"
                        value="Password"
                        class="text-white"
                    />

                    <input
                        id="password"
                        type="password"
                        class="mt-1 block w-full rounded-md shadow-sm bg-input_bg dark:text-gray-300 focus:border-main dark:focus:border-main focus:ring-main dark:focus:ring-main border-[#482A1F] px-3 py-2"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="***********"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex justify-center mt-4 text-center">
                    <PrimaryButton
                        class="flex justify-center w-full py-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
