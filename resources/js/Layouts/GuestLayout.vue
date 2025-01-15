<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/vue3";

import "@fontsource/manrope"; // Defaults to weight 400
import "@fontsource/manrope/200.css"; // Specify weight
import "@fontsource/manrope/300.css"; // Specify weight
import "@fontsource/manrope/400.css"; // Specify weight
import "@fontsource/manrope/500.css"; // Specify weight
import "@fontsource/manrope/600.css"; // Specify weight
import "@fontsource/manrope/700.css"; // Specify weight
import "@fontsource/manrope/800.css"; // Specify weight
// import "@fontsource/manrope/400-italic.css"; // Specify weight and style

import MobileNav from "@/Components/MobileNav.vue";
import CurrentLink from "@/Components/CurrentLink.vue";
import PillButton from "@/Components/UI/PillButton.vue";

const logo = ref("/img/logo.png");
const burger = ref("/img/burger.svg");

const show_nav = ref(false);
let scrolled = ref(false);

const logScroll = () => {
    if (window.scrollY !== 0) {
        scrolled.value = true;
    } else {
        scrolled.value = false;
    }
};

onMounted(() => {
    window.addEventListener("scroll", logScroll);
});
</script>

<template>
    <div class="!font-manrope bg-portbg text-white w-full overflow-x-hidden">
        <!-- Header -->
        <div
            class="transition-all duration-500 ease-in-out w-full flex items-center justify-between h-20 text-white fixed top-0 left-0 z-20"
            :class="{
                ' bg-[#141414] ': scrolled,
            }"
        >
            <!-- Logo and Corner button -->
            <div
                class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-full max-md:px-5"
            >
                <div
                    class="w-full grid grid-cols-3 items-center h-20 text-white"
                >
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <a href="#"> <img :src="logo" alt="" class="h-8" /></a>
                        <div class="flex flex-col">
                            <h1 class="font-extrabold">Arvin Gomez</h1>
                            <p class="text-xs text-gray-400">
                                Full Stack Web Developer
                            </p>
                        </div>
                    </div>

                    <!-- Centered Nav -->
                    <nav class="max-lg:hidden">
                        <ul class="flex justify-center gap-3">
                            <Link :href="route('home')">
                                <CurrentLink link_name="Home" />
                            </Link>
                            <li>
                                <CurrentLink
                                    link_name="Project"
                                    scroll_to="projects"
                                />
                            </li>
                            <li>
                                <CurrentLink link_name="Experience" />
                            </li>
                            <li>
                                <CurrentLink
                                    link_name="About"
                                    scroll_to="about"
                                />
                            </li>
                        </ul>
                    </nav>

                    <!-- Button -->
                    <div
                        class="flex justify-end items-center gap-5 max-lg:hidden"
                    >
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="border border-main py-1.5 px-5 rounded-full hover:bg-main-primary active:bg-[#673220]"
                            >Logout</Link
                        >
                        <Link
                            v-else
                            :href="route('login')"
                            class="text-sm text-gray-400 underline px-5 py-2 hover:text-white hover:bg-white hover:bg-opacity-5 rounded-md"
                            >Login</Link
                        >
                        <PillButton scroll_to="contact" name="Contact" />
                    </div>
                    <div
                        class="cursor-pointer select-none lg:hidden"
                        @click="show_nav = !show_nav"
                    >
                        <img :src="burger" alt="" class="h-6" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Nav -->
        <div v-if="show_nav">
            <MobileNav @close_emit="show_nav = !show_nav" />
        </div>

        <!-- Main content -->
        <main
            class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-full max-md:px-5"
        >
            <slot></slot>
        </main>
    </div>
</template>

<style>
html {
    scroll-behavior: smooth;
}
</style>
