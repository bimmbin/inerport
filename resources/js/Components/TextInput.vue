<script setup>
import { onMounted, ref } from "vue";

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="border-none rounded-md shadow-sm bg-input_bg dark:text-gray-300 focus:border-main dark:focus:border-main focus:ring-main dark:focus:ring-main"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
