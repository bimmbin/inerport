<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import "typeface-poppins";

import MobileNav from "@/Components/MobileNav.vue";
import CurrentLink from "@/Components/CurrentLink.vue";

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
    <div class="!font-pop bg-portbg text-white w-full overflow-x-hidden">
        <!-- Header -->
        <div
            class="transition-all duration-500 ease-in-out w-full flex items-center justify-between h-20 text-white bg-portbg fixed top-0 left-0 z-20"
            :class="{
                ' !bg-[#141414] ': scrolled,
            }"
        >
            <div
                class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-full max-md:px-5"
            >
                <div
                    class="w-full flex items-center justify-between h-20 text-white"
                >
                    <a href="#"> <img :src="logo" alt="" class="h-8" /></a>
                    <nav class="max-lg:hidden">
                        <ul class="flex gap-3">
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
                            <li>
                                <CurrentLink
                                    link_name="Contact"
                                    scroll_to="contact"
                                />
                            </li>
                        </ul>
                    </nav>
                    <div class="max-lg:hidden">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="border border-main py-1.5 px-5 rounded-full hover:bg-main active:bg-[#673220]"
                            >Logout</Link
                        >
                        <Link
                            v-else
                            :href="route('login')"
                            class="border border-main py-1.5 px-5 rounded-full hover:bg-[#673220] active:bg-[#673220]"
                            >Login</Link
                        >
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
