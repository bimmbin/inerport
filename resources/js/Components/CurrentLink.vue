<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    route_name: {
        type: String,
    },
    link_name: {
        type: String,
    },
});
</script>

<template>
    <div class="py-2 px-5 rounded-md hover:bg-gray2" :class="{ 'bg-gray2': route().current(route_name) }">{{ link_name }}</div>
</template>
