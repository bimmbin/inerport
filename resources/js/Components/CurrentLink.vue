<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    scroll_to: {
        type: String,
    },
    link_name: {
        type: String,
    },
});
</script>

<template>
    <a :href="`#${scroll_to}`"
        ><div
            class="py-2 text-sm px-5 rounded-md text-gray-400 hover:text-white hover:bg-white hover:bg-opacity-5 cursor-pointer"
        >
            {{ link_name }}
        </div></a
    >
</template>
