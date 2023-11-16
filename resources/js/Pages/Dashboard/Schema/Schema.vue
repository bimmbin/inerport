<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    layout: DashboardLayout,
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const wip = ref("/img/wip.png");
</script>

<template>
    <Head title="Database Schema" />
    <div class="max-md:mt-24 w-full h-fit">
        <h1 class="text-4xl font-semibold max-xl:text-3xl max-md:text-2xl">
            Database Schemas
        </h1>
        <div
            class="flex w-full h-full justify-center items-center mt-20"
        >
            <img :src="wip" class="h-[20rem] max-sm:h-[10rem]" />
        </div>
    </div>
</template>
