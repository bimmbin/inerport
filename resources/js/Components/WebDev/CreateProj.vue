<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const exit = ref("/img/exit.svg");
const remove = ref("/img/remove.svg");

const emit = defineEmits(["close_emit"]);

const inputTech = ref("");
const inputFeat = ref("");

const addTech = () => {
    if (inputTech.value.trim() !== "") {
        form.tech_used.push(inputTech.value);
        inputTech.value = ""; // Clear the input after adding
    }
};
const removeTech = (index) => {
    form.tech_used.splice(index, 1);
};

const addFeat = () => {
    if (inputFeat.value.trim() !== "") {
        form.web_feat.push(inputFeat.value);
        inputFeat.value = ""; // Clear the input after adding
    }
};
const removeFeat = (index) => {
    form.web_feat.splice(index, 1);
};

// upload picture
const url = ref([]);

const previewImage = (e) => {
    const file = e.target.files;

    url.value = []; //remove the recent items
    for (let i = 0; i < file.length; i++) {
        url.value.push(URL.createObjectURL(file[i]));
        // console.log(URL.createObjectURL(file[i]))
    }
};

const form = useForm({
    proj_title: "",
    proj_description: "",
    tech_used: [],
    web_feat: [],
    proj_description: "",
    github_link: "",
    live_link: "",
    image: [],
    img_thumbnail: "0",
    category: "web_dev",
    remember: false,
});

const submit = () => {
    form.post(route("web-development.store"), {
        onSuccess: () => emit("close_emit"),
    });
};
</script>

<template>
    <div
        class="absolute top-0 left-0 w-full h-full z-50 flex flex-col overflow-y-auto"
    >
        <div
            @click="$emit('close_emit')"
            class="absolute top-0 left-0 bg-black bg-opacity-80 w-full h-28 max-xl:h-20 max-md:h-16 max-sm:h-14 backdrop-blur-lg"
        ></div>
        <div
            class="relative bg-gray2 w-full flex-1 rounded-t-3xl mt-20 max-xl:mt-16 max-md:mt-14 max-sm:mt-10"
        >
            <!-- Main content -->
            <div
                class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-full max-md:px-5 py-10 max-xl:py-8 max-md:py-5"
            >
                <!-- Header -->
                <div class="flex justify-between items-center w-full">
                    <h2
                        class="text-4xl font-bold max-xl:text-3xl max-md:text-2xl"
                    >
                        Create Project
                    </h2>
                    <img
                        :src="exit"
                        @click="$emit('close_emit')"
                        class="h-7 cursor-pointer select-none max-xl:h-6 max-md:h-5"
                    />
                </div>
                <!-- Input Forms -->
                <form
                    @submit.prevent="submit"
                    class="w-full mt-10 flex flex-col gap-5"
                >
                    <!-- Project Title -->
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

                    <!-- Project Description -->
                    <div class="">
                        <InputLabel
                            for="proj_description"
                            value="Description"
                            class="text-white"
                        />

                        <textarea
                            v-model="form.proj_description"
                            id="proj_description"
                            cols="30"
                            rows="6"
                            class="w-full bg-input_bg dark:text-gray-300 focus:border-main dark:focus:border-main focus:ring-main dark:focus:ring-main rounded-md shadow-sm border-none"
                        ></textarea>

                        <InputError
                            class="mt-2"
                            :message="form.errors.proj_description"
                        />
                    </div>

                    <!-- Input file image -->
                    <div class="">
                        <InputLabel
                            for="file"
                            value="Preview Images"
                            class="text-white"
                        />

                        <input
                            type="file"
                            id="file"
                            class="bg-input_bg px-3 py-2 w-full rounded-t-md"
                            @input="form.image = $event.target.files"
                            @change="previewImage"
                            multiple
                            accept="image/*"
                        />
                        <!-- {{ form.errors.image[0] }} -->
                        <div v-for="(error, index) in form.errors" :key="index">
                            <InputError class="mt-2" :message="error" />
                        </div>
                    </div>

                    <!-- image upload showcase -->
                    <div class="" v-if="url.length != 0">
                        <InputLabel
                            value="Select image thumbnail"
                            class="text-white"
                        />
                        <div
                            class="w-full bg-input_bg h-fit rounded-b-md py-3 px-3 flex flex-wrap gap-5 rounded-md"
                        >
                            <div v-for="(src, index) in url" class="h-36">
                                <input
                                    type="radio"
                                    :id="'image' + index"
                                    name="imageee"
                                    v-model="form.img_thumbnail"
                                    :value="index"
                                    class="hidden"
                                />
                                <label
                                    :for="'image' + index"
                                    class="relative cursor-pointer"
                                >
                                    <img
                                        :src="src"
                                        alt=""
                                        class="w-full h-full object-cover rounded-sm"
                                        :class="{
                                            hidden: !url,
                                            'outline outline-offset-2 outline-main ':
                                                form.img_thumbnail == index,
                                        }"
                                    />
                                    <div
                                        class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-main bg-opacity-70 text-xl text-black"
                                        :class="{
                                            hidden: form.img_thumbnail != index,
                                        }"
                                    >
                                        Selected
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Used -->
                    <div class="">
                        <InputLabel
                            for="tech_used"
                            value="Technology Used"
                            class="text-white"
                        />

                        <div class="flex items-end gap-1">
                            <TextInput
                                id="tech_used"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="inputTech"
                                autofocus
                                placeholder="Technology Used"
                                @keydown.enter="addTech"
                            />
                            <div
                                @click="addTech"
                                class="bg-main rounded-md h-fit px-3 py-2 cursor-pointer select-none"
                            >
                                Add
                            </div>
                        </div>

                        <InputError
                            class="mt-2"
                            :message="form.errors.tech_used"
                        />

                        <div class="mt-2 flex flex-wrap gap-2">
                            <div
                                v-for="(tech, index) in form.tech_used"
                                class="relative border-2 border-main w-fit py-1 px-3 rounded-full bg-input_bg"
                            >
                                {{ tech }}
                                <div class="absolute top-0 right-0 z-100">
                                    <img
                                        @click="removeTech(index)"
                                        :src="remove"
                                        class="h-5 translate-x-2.5 -translate-y-1.5 cursor-pointer select-none"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Web Features -->
                    <div class="">
                        <InputLabel
                            for="web_feat"
                            value="Features"
                            class="text-white"
                        />

                        <div class="flex items-end gap-1">
                            <TextInput
                                id="web_feat"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="inputFeat"
                                autofocus
                                placeholder="Features"
                                @keydown.enter="addFeat"
                            />
                            <div
                                @click="addFeat"
                                class="bg-main rounded-md h-fit px-3 py-2 cursor-pointer select-none"
                            >
                                Add
                            </div>
                        </div>

                        <InputError
                            class="mt-2"
                            :message="form.errors.web_feat"
                        />

                        <div class="mt-2 flex flex-wrap gap-2">
                            <div
                                v-for="(feat, index) in form.web_feat"
                                class="relative border-2 border-main w-fit py-1 px-3 rounded-full bg-input_bg"
                            >
                                {{ feat }}
                                <div class="absolute top-0 right-0 z-100">
                                    <img
                                        @click="removeFeat(index)"
                                        :src="remove"
                                        class="h-5 translate-x-2.5 -translate-y-1.5 cursor-pointer select-none"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2 max-sm:flex-col max-sm:gap-5">
                        <!-- Github Link -->
                        <div class="flex-1">
                            <InputLabel
                                for="github_link"
                                value="Github Link"
                                class="text-white"
                            />

                            <TextInput
                                id="github_link"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.github_link"
                                required
                                autofocus
                                placeholder="Github Link"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.github_link"
                            />
                        </div>

                        <!-- Live link -->
                        <div class="flex-1">
                            <InputLabel
                                for="live_link"
                                value="Live Link"
                                class="text-white"
                            />

                            <TextInput
                                id="live_link"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.live_link"
                                required
                                autofocus
                                placeholder="Link"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.live_link"
                            />
                        </div>
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
