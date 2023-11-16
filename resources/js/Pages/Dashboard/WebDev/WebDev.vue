<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    layout: DashboardLayout,
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";
import { ref, watch } from "vue";

import CardProj from "@/Components/CardProj.vue";
import CreateProj from "@/Components/WebDev/CreateProj.vue";

const { projects } = defineProps({
    projects: Object,
});

const show = ref(false);

watch(show, (newValue) => {
    if (newValue) {
        document.body.style.overflow = "hidden";
    } else {
        document.body.style.overflow = "visible";
    }
});

</script>

<template>
    <Head title="Web Development" />

    <!-- create proj component -->
    <div v-if="show">
        <CreateProj @close_emit="show = !show" />
    </div>

    <!-- Main content -->
    <div
        class="h-fit px-5 max-md:px-0 max-md:mt-24 max-md:overflow-y-hidden"
    >
        
        <div
            class="flex justify-between items-center mb-5 max-sm:flex-col max-sm:items-start"
        >
            <div class="flex gap-8 max-xl:gap-6 max-md:gap-3">
                <h1
                    class="text-4xl font-semibold max-xl:text-3xl max-md:text-2xl"
                >
                    Web Development
                </h1>
                <div
                    class="border-r border-gray-500"
                    v-if="$page.props.auth.user"
                ></div>
                <div
                    v-if="$page.props.auth.user"
                    @click="show = !show"
                    class="bg-main rounded-full px-5 py-2 cursor-pointer select-none max-sm:px-3"
                >
                    Create
                </div>
            </div>
            <!-- <span class="mr-[0.5%]">Sort by:</span> -->
        </div>
        <div
            class="w-full flex flex-wrap gap-3 max-xl:flex-nowrap max-xl:flex-col max-sm:px-0 justify-stretch"
        >
            <div v-for="project in projects">
                <!-- {{ project }} -->
                <CardProj :project="project" />
            </div>
        </div>
    </div>
</template>
