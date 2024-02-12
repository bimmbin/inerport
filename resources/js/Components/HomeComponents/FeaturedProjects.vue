<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    stack: {
        type: String,
        required: true,
    },
    projTitle: {
        type: String,
        required: true,
    },
    liveLink: {
        type: String,
        required: true,
    },
    detailsLink: {
        type: String,
        required: true,
    },
});
const link = ref("/img/link.svg");
const eye = ref("/img/eye.svg");
</script>

<template>
    <div
        class="h-full w-[595px] max-xl:w-[395px] max-md:w-full bg-gray2 px-10 py-6 flex flex-col gap-20 max-xl:gap-10 max-md:gap-5 mt-[10px] justify-between max-md:px-6"
    >
        <p class="text-xl max-xl:text-md max-md:text-sm font-light opacity-50">
            {{ props.stack }}
        </p>
        <div class="flex flex-col gap-2">
            <p class="font-bold text-3xl max-xl:text-2xl max-md:text-xl">
                {{ props.projTitle }}
            </p>
            <div
                class="flex items-center gap-10 opacity-50 font-light max-xl:text-sm max-md:text-xs"
            >
                <a
                    :href="'http://' + props.liveLink"
                    target="_blank"
                    class="flex items-center gap-2"
                >
                    <p>See live</p>
                    <img :src="link" alt="" class="max-xl:h-4 max-md:h-3" />
                </a>

                <!-- change this to routerLink -->
                <Link
                    :href="route('web-development.show', props.detailsLink)"
                    class="flex items-center gap-2"
                >
                    <p>View more details</p>
                    <img :src="eye" alt="" class="max-xl:h-4 max-md:h-3" />
                </Link>
            </div>
        </div>
    </div>
</template>
