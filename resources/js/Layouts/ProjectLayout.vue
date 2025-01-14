<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import DashNav from "@/Components/DashNav.vue";
import DashDrop from "@/Components/DashDrop.vue";
import MobileNav from "@/Components/MobileNav.vue";

import "@fontsource/manrope"; // Defaults to weight 400
import "@fontsource/manrope/400.css"; // Specify weight
// import "@fontsource/manrope/400-italic.css"; // Specify weight and style
const logo = ref("/img/logo.png");
const burger = ref("/img/burger.svg");

const show_nav = ref(false);
</script>

<template>
    <div class="flex font-manrope bg-portbg">
        <!-- navigation -->
        <div
            class="h-screen bg-gray1 px-6 py-20 flex flex-col gap-10 max-md:hidden sticky left-0 top-0 w-60"
        ></div>
        <div
            class="w-[1180px] min-h-screen mx-auto max-2xl:w-[1000px] max-xl:w-[1000px] max-md:w-screen max-md:px-5 py-5 max-sm:py-0 text-white"
        >
            <div
                class="h-fit px-5 max-md:px-0 overflow-auto max-md:mt-24 max-md:overflow-y-hidden"
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
                    </div>
                </div>
            </div>

            <slot></slot>
        </div>
    </div>
</template>
