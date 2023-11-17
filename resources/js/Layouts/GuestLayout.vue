<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import "typeface-poppins";

import MobileNav from "@/Components/MobileNav.vue";
import CurrentLink from "@/Components/CurrentLink.vue";

const logo = ref("/img/logo.png");
const burger = ref("/img/burger.svg");

const show_nav = ref(false);
</script>

<template>
    <div class="!font-pop bg-portbg text-white w-full overflow-x-hidden">
        <div
            class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-full max-md:px-5"
        >
            <!-- Header -->
            <div
                class="flex justify-between items-center bg-portbg h-20 text-white"
            >
                <img :src="logo" alt="" class="h-8" />
                <nav class="max-lg:hidden">
                    <ul class="flex gap-3">
                        <Link :href="route('home')">
                            <CurrentLink link_name="Home" route_name="home" />
                        </Link>
                        <Link :href="route('web-development.index')">
                            <CurrentLink link_name="Projects" route_name="project" />
                        </Link>

                        <li>
                            <CurrentLink link_name="About" route_name="about" />
                        </li>
                        <li>
                            <CurrentLink link_name="Contact" route_name="contact" />
                        </li>
                    </ul>
                </nav>
                <div class="max-lg:hidden">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="border border-main py-1.5 px-5 rounded-full"
                        >Logout</Link
                    >
                    <Link
                        v-else
                        :href="route('login')"
                        class="border border-main py-1.5 px-5 rounded-full"
                        >Login</Link
                    >
                </div>
                <div
                    class="lg:hidden cursor-pointer select-none"
                    @click="show_nav = !show_nav"
                >
                    <img :src="burger" alt="" class="h-6" />
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
