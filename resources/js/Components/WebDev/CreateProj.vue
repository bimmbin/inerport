<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const exit = ref("/img/exit.svg");

const form = useForm({
    email: "",
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
    <div class="absolute top-0 left-0 w-full h-full z-50 flex flex-col">
        <div
            @click="$emit('close_show')"
            class="absolute top-0 left-0 bg-black bg-opacity-80 w-full h-28 max-xl:h-20 max-md:h-16 max-sm:h-14 backdrop-blur-lg"
        ></div>
        <div
            class="relative bg-gray2 w-full h-screen rounded-t-3xl overflow-y-auto mt-20 max-xl:mt-16 max-md:mt-14 max-sm:mt-10"
        >
            <!-- Main content -->
            <div
                class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-screen max-md:px-5 py-10 max-xl:py-8 max-md:py-5"
            >
                <!-- Header -->
                <div class="flex justify-between items-center w-full">
                    <h2 class="text-4xl font-bold max-xl:text-3xl max-md:text-2xl">Create Project</h2>
                    <img :src="exit" @click="$emit('close_show')" class="h-7 cursor-pointer select-none max-xl:h-6 max-md:h-5" />
                </div>
                <!-- Input Forms -->
                <form
                    @submit.prevent="submit"
                    class="w-full mt-10 flex flex-col gap-5"
                >
                    <div class="">
                        <InputLabel
                            for="proj_title"
                            value="Project title"
                            class="text-white"
                        />

                        <TextInput
                            id="proj_title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.proj_title"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Project Title"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.proj_title"
                        />
                    </div>

                    <div class="">
                        <InputLabel
                            for="proj_title"
                            value="Project title"
                            class="text-white"
                        />

                        <textarea
                            v-model="form.proj_description"
                            id="event_description"
                            cols="30"
                            rows="6"
                            class="w-full bg-input_bg dark:text-gray-300 focus:border-main dark:focus:border-main focus:ring-main dark:focus:ring-main rounded-md shadow-sm border-none"
                        ></textarea>

                        <InputError
                            class="mt-2"
                            :message="form.errors.proj_title"
                        />
                    </div>

                    <div class="">
                        <InputLabel
                            for="file"
                            value="Preview Images"
                            class="text-white"
                        />

                        <input
                            type="file"
                            id="file"
                            class="bg-input_bg px-3 py-2 w-full rounded-md"
                        />
                    </div>

                    <div class="">
                        <InputLabel
                            for="proj_title"
                            value="Technology Used"
                            class="text-white"
                        />

                        <div class="flex items-end gap-1">
                            <TextInput
                                id="proj_title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.proj_title"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Project Title"
                            />
                            <div class=" bg-main rounded-md h-fit px-3 py-2 cursor-pointer select-none">Add</div>
                        </div>

                        <InputError
                            class="mt-2"
                            :message="form.errors.proj_title"
                        />
                    </div>

                    <div class="">
                        <InputLabel
                            for="proj_title"
                            value="Website Features"
                            class="text-white"
                        />

                        <div class="flex items-end gap-1">
                            <TextInput
                                id="proj_title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.proj_title"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Project Title"
                            />
                            <div class=" bg-main rounded-md h-fit px-3 py-2 cursor-pointer select-none">Add</div>
                        </div>

                        <InputError
                            class="mt-2"
                            :message="form.errors.proj_title"
                        />
                    </div>
                    <div class="flex mt-4 justify-center text-center">
                        <PrimaryButton
                            class="w-full flex justify-center py-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Submit
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
