<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import DashNav from "@/Components/DashNav.vue";
import DashDrop from "@/Components/DashDrop.vue";
import MobileNav from "@/Components/MobileNav.vue";

import "typeface-poppins";
const logo = ref("/img/logo.png");
const burger = ref("/img/burger.svg");

const show_nav = ref(false);

</script>

<template>
    <div class="flex font-pop bg-portbg">
        <!-- navigation -->
        <div
            class="h-screen bg-gray1 px-6 py-20 flex flex-col gap-10 max-md:hidden sticky left-0 top-0"
        >
            <DashNav image="home" nav_name="Home" :href="route('home')" />
            <DashDrop image="project" nav_name="Projects">
                <DashNav
                    image="webdev"
                    nav_name="Web Development"
                    :href="route('web-development.index')"
                    class="w-60"
                />
                <DashNav
                    image="design-icon"
                    nav_name="Ui Designs"
                    :href="route('ui-design.index')"
                    class="w-60"
                />
                <DashNav
                    image="schema"
                    nav_name="Database Schemas"
                    :href="route('home')"
                    class="w-60"
                />
            </DashDrop>
            <DashNav
                image="about"
                nav_name="About"
                :href="route('web-development.index')"
            />
            <DashNav
                image="contact"
                nav_name="Contact"
                :href="route('ui-design.index')"
            />
        </div>
        <div
            class="w-[1550px] mx-auto max-xl:w-[1000px] max-md:w-screen max-md:px-5 py-5 max-sm:py-0 min-h-full text-white"
        >
            <!-- Header -->
            <div
                class="flex justify-between items-center bg-gray1 absolute top-0 left-0 w-screen py-5 px-5 text-white md:hidden"
            >
                <Link :href="route('home')">
                    <img :src="logo" alt="" class="h-8" />
                </Link>
                <div class="lg:hidden cursor-pointer select-none" @click="show_nav = !show_nav">
                    <img :src="burger" alt="" class="h-6" />
                </div>
            </div>
            <!-- Responsive Nav -->
            <div v-if="show_nav">
                <MobileNav @close_emit="show_nav = !show_nav"/>
            </div>
            <slot></slot>
        </div>
    </div>
</template>
