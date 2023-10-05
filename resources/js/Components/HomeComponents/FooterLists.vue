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
    <div
        class="flex items-center gap-2 opacity-50 font-extralight text-lg mt-1 max-xl:text-base max-sm:text-sm"
    >
        <p v-if="props.isLink" class="underline">
            <a :href="props.footLink" target="_blank">
                {{ props.listname }}
            </a>
        </p>
        <p v-else>{{ props.listname }}</p>
    </div>
</template>
