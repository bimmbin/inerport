<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";

const close_img = ref("/img/close.svg");

const emit = defineEmits(['close_emit'])

defineProps({
    social_name: {
        type: String,
        required: true,
    },
    link: {
        type: String,
        required: true,
    },
});


const submit = () => {
  
    form.post(route('artist.event.store'), {
        onFinish: () => emit('close_emit'),
    });
};

</script>

<template>
    <div
        class="w-screen absolute top-0 left-0 h-screen px-4 py-5 bg-black bg-opacity-70 z-10"
    >
        <div class="bg-fanBg w-full rounded-md px-2 py-3">
            <!-- event details -->
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">Event Details</h2>
                <div
                    @click="$emit('close_emit')"
                    class="cursor-pointer flex items-center justify-center"
                >
                    <img :src="close_img" alt="" />
                </div>
            </div>

           
        </div>
    </div>
</template>
