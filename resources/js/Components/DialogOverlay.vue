<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    route_back: {
        type: String,
    },
});
</script>

<template>
    <!-- Dialog overlay -->
    <div
        class="absolute top-0 left-0 w-full h-full z-10 flex flex-col overflow-y-auto"
    >
        <Link :href="route(route_back)"
            class="absolute top-0 left-0 bg-black bg-opacity-50 w-full h-28 max-xl:h-20 max-md:h-16 max-sm:h-14 backdrop-blur-md"
        ></Link>
        <div
            class="relative bg-gray2 w-full flex-1 rounded-t-3xl mt-20 max-xl:mt-16 max-md:mt-14 max-sm:mt-10"
        >
            <!-- Main content -->
            <div
                class="w-[1200px] mx-auto max-xl:w-[800px] max-lg:w-full max-lg:px-10 max-md:px-5 py-10 max-xl:py-8 max-md:py-5"
            >
                <slot></slot>
            </div>
        </div>
    </div>
</template>
