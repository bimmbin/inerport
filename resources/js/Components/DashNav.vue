<script setup>
import { ref, computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    image: {
        type: String,
    },
    nav_name: {
        type: String,
    }, 
    href: {
        type: String,
    }, 
    active: {
        type: Boolean,
    },
});
const classes = computed(() =>
    props.active
        ? 'flex items-center gap-3 hover:bg-gray2 px-3 py-2 rounded-md bg-gray2'
        : 'flex items-center gap-3 hover:bg-gray2 px-3 py-2 rounded-md'
);
const img_path = ref("/img/");
</script>

<template>
    <Link :href="href" :class="classes">
        <img
            :src="img_path + image + '.svg'"
            class="w-5 h-5" 
        />
        <span class="text-white text-lg whitespace-nowrap">{{ nav_name }}</span>
    </Link>
</template>
