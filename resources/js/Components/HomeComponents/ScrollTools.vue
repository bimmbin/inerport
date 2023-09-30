<script setup>
import { ref } from "vue";

const props = defineProps({
    imageSrc: {
        type: String,
        required: true,
    },
});

const path1 = ref("/img/");

</script>

<template>
    <div class="flex items-center gap-2">
        <img :src="path1 + props.imageSrc" class="inline-block h-14 max-lg:h-10" />
    </div>
</template>
