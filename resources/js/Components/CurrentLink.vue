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
        ><div class="py-2 px-5 rounded-md hover:bg-gray2 cursor-pointer">
            {{ link_name }}
        </div></a
    >
</template>
