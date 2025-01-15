<script setup>
import { ref } from "vue";

const { name } = defineProps({
    name: String,
});

const hovered = ref(false);

const toggleHover = (bool) => {
    hovered.value = bool;
};
</script>
<template>
    <div
        @mouseenter="toggleHover(true)"
        @mouseleave="toggleHover(false)"
        class="w-28 flex flex-col items-center px-5 py-4 bg-background-secondary rounded-md gap-2 hover:bg-main-primary hover:bg-opacity-10"
    >
        <!-- SVG -->
        <div class="w-fit h-fit flex justify-center items-center">
            <div class="w-10 h-10">
                <slot />
            </div>
        </div>

        <!-- Name -->
        <span
            class="text-sm text-gray-400 cursor-default font-semibold"
            :class="{ 'text-main-primary ': hovered }"
            >{{ name }}</span
        >
    </div>
</template>
