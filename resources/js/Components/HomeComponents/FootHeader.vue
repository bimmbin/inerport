<script setup>
const props = defineProps({
    listname: {
        type: String,
        required: true,
    },
    isLink: {
        type: Boolean,
    },
    footLink: {
        type: String,
    },
});

</script>

<template>
    <p class="text-3xl font-semibold mb-3 max-xl:text-2xl max-sm:text-xl">
        <slot></slot>
    </p>
</template>
