<script setup>
import { ref } from 'vue';

const emit = defineEmits(["close_sure", "delete_emit"]);

const warning = ref("/img/warning.svg");

defineProps({
    question: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div
        class="w-screen h-screen absolute top-0 left-0 px-10 max-sm:px-5 py-5 z-50 bg-black bg-opacity-70 flex items-center justify-center"
    >
        <div class="bg-white_light w-fit rounded-md px-20 max-md:px-10 max-sm:px-5 py-6">
            <!-- event details -->
            <div class="flex flex-col justify-between items-center gap-5">
                <img :src="warning" alt="" />
                <h2
                    class="text-lg font-semibold text-center whitespace-normal text-black"
                >
                    {{ question }}
                </h2>
                <div
                    class="cursor-pointer flex items-center justify-center gap-2 select-none"
                >
                    <div
                        @click="$emit('delete_emit')"
                        class="px-5 py-2 bg-red-800 text-white rounded-md active:bg-red-600"
                    >
                        Yes, delete it
                    </div>
                    <div
                        @click="$emit('close_sure')"
                        class="px-5 py-2 bg-gray-300 rounded-md text-black"
                    >
                        No
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
