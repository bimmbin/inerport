<script setup>
import { ref } from "vue";
import { Collapse } from "vue-collapsed";
import DashNav from "@/Components/DashNav.vue";

defineProps({
    image: {
        type: String,
    },
    nav_name: {
        type: String,
    },
});

const img_path = ref("/img/");
const drop = ref("/img/drop.svg");

const show_details = ref(true);
</script>

<template>
    <!-- collapse header -->
    <div
        @click="show_details = !show_details"
        class="flex justify-between items-center cursor-pointer hover:bg-gray2 px-3 py-2 rounded-md"
    >
        <div class="flex justify-between items-center w-40">
            <div class="flex items-center gap-3">
                <img :src="img_path + image + '.svg'" class="w-5" />
                <span class="text-white text-lg">{{ nav_name }}</span>
            </div>

            <img
                :src="drop"
                class="w-6 h-6 select-none"
                :class="{ 'rotate-180': show_details }"
                alt=""
            />
        </div>
    </div>

    <!-- collapse details -->
    <Collapse
        :when="show_details"
        class="w-full overflow-hidden ml-8 flex flex-col gap-2 translate-y-[-1rem]"
    >
        <slot></slot>
    </Collapse>
</template>
