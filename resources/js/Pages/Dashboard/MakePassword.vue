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
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("admin.make.password.store"));
};
</script>

<template>
    <GuestLayout>
        <Head title="Make password" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="w-full h-screen flex justify-center mt-20 sm:mt-40">
            <form @submit.prevent="submit" class="w-full sm:w-[25rem]">
                <div>
                    <InputLabel
                        for="password"
                        value="New Password"
                        class="text-white"
                    />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="***********"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Repeat Password"
                        class="text-white"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="current-password"
                        placeholder="***********"
                    />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="flex mt-4 justify-center text-center">
                    <PrimaryButton
                        class="w-full flex justify-center py-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
