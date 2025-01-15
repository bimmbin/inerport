<script setup>
import { ref, computed } from "vue";

const { scroll_to, name, primary } = defineProps({
    scroll_to: String,
    name: String,
});

const hovered = ref(false);

const toggleHover = (bool) => {
    hovered.value = bool;
};

const classes = computed(() =>
    hovered.value
        ? "py-2.5 px-7 bg-main-primary text-gray-200 rounded-full text-white"
        : "py-2.5 px-7 bg-gradient-to-b from-main-primary to-main-dark text-gray-200 rounded-full"
);
</script>
<template>
    <a
        @mouseenter="toggleHover(true)"
        @mouseleave="toggleHover(false)"
        :href="`#${scroll_to}`"
        :class="classes"
    >
        {{ name }}</a
    >
</template>
