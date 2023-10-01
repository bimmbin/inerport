<script setup>
import { ref } from "vue";

const props = defineProps({
    image: {
        type: String,
        required: true,
    },
    about_title: {
        type: String,
        required: true,
    },
    about_content: {
        type: String,
        required: true,
    },
});
const img_path = ref("/img/");
</script>

<template>
    <!-- 4th card -->
    <div
        class="w-[590px] max-xl:w-[390px] max-md:w-full px-10 max-sm:px-0 py-6 flex flex-col gap-3 max-xl:gap-2 mt-[10px] items-center"
    >
        <img :src="img_path + image + '.svg'" alt="" class="w-16 max-xl:w-12 max-md:w-10" />

        <p class="text-3xl max-xl:text-xl max-md:text-md font-semibold">
            {{ props.about_title }}
        </p>
        <p class="text-xl max-xl:text-base max-md:text-sm font-light leading-8">
            {{ props.about_content }}
        </p>
    </div>
</template>
