<script setup>
import ViewIcon from "@/Icons/ViewIcon.vue";
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
    imgSrc: {
        type: String,
        required: true,
    },
});

const hovered = ref(false);

const toggleHover = (bool) => {
    hovered.value = bool;
};
</script>

<template>
    <Link
        :href="route('web-development.show', props.detailsLink)"
        class="w-full h-60 relative rounded-md"
    >
        <div
            class="w-full h-full transition duration-300 ease-in-out"
            @mouseenter="toggleHover(true)"
            @mouseleave="toggleHover(false)"
            :class="{ 'scale-[1.02]': hovered }"
        >
            <img
                :src="props.imgSrc"
                alt=""
                class="object-cover w-full h-full opacity-80"
            />
        </div>
        <div
            class="w-full h-full absolute opacity-0 top-0 left-0 bg-gray1 bg-opacity-90 transition duration-300 ease-in-out scale-[1.02]"
            @mouseenter="toggleHover(true)"
            @mouseleave="toggleHover(false)"
            :class="{ 'opacity-100': hovered }"
        >
            <div
                class="h-full w-full px-10 py-6 flex flex-col gap-10 max-xl:gap-10 max-md:gap-5 justify-between max-md:px-6 cursor-pointer"
            >
                <div class="flex justify-between">
                    <p class="text-md max-md:text-sm font-light opacity-50">
                        {{ props.stack }}
                    </p>
                    <ViewIcon
                        class="w-20 h-20 opacity-30 absolute top-3 right-10"
                    />
                </div>

                <div class="flex flex-col gap-2">
                    <p
                        class="font-bold text-3xl max-xl:text-2xl max-md:text-xl"
                    >
                        {{ props.projTitle }}
                    </p>
                    <div
                        class="flex items-center gap-10 font-light max-xl:text-sm max-md:text-xs"
                    >
                        <!-- change this to routerLink -->
                        <div
                            class="flex items-center gap-2 text-sm text-gray-400"
                        >
                            <p>Click to view more details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Link>
</template>
