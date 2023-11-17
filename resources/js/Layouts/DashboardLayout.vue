<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
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
            class="h-screen bg-gray1 px-6 flex flex-col gap-10 max-md:hidden sticky left-0 top-0"
        >
            <!-- Logo -->
            <Link :href="route('home')" class="flex items-center gap-2 px-3 py-5">
                <img :src="logo" alt="" class="h-7 max-md:h-6" />
                <h1 class="text-3xl max-md:text-2xl font-semibold text-white">Vinrecs</h1>
            </Link>

            <DashNav
                image="home"
                nav_name="Home"
                :href="route('home')"
                route_name="home"
            />
            <DashDrop image="project" nav_name="Projects">
                <div class="flex gap-2">
                    <div class="w-5"></div>
                    <DashNav
                        image="webdev"
                        nav_name="Web Development"
                        route_name="web-development.index"
                        :href="route('web-development.index')"
                        @click="$emit('close_emit')"
                        class="w-full"
                        :active="$page.component === 'Dashboard/WebDev/WebDev'"
                    />
                </div>
                <div class="flex gap-2">
                    <div class="w-5"></div>
                    <DashNav
                        image="design-icon"
                        nav_name="Ui Designs"
                        route_name="ui-design.index"
                        :href="route('ui-design.index')"
                        @click="$emit('close_emit')"
                        class="w-full"
                        :active="$page.component === 'Dashboard/Design/Design'"
                    />
                </div>

                <div class="flex gap-2">
                    <div class="w-5"></div>
                    <DashNav
                        image="schema"
                        nav_name="Database Schemas"
                        route_name="database-schema.index"
                        :href="route('database-schema.index')"
                        @click="$emit('close_emit')"
                        class="w-full"
                        :active="$page.component === 'Dashboard/Schema/Schema'"
                    />
                </div>
            </DashDrop>
            <DashNav
                image="about"
                nav_name="About"
                route_name="home"
                :href="route('web-development.index')"
            />
            <DashNav
                image="contact"
                nav_name="Contact"
                route_name="home"
                :href="route('web-development.index')"
            />

            <Link
                v-if="$page.props.auth.user"
                :href="route('logout')"
                method="post"
                as="button"
                class="text-white border border-main rounded-md py-3"
            >
                Logout
            </Link>
            <Link
                v-else
                :href="route('login')"
                as="button"
                class="text-white border border-main rounded-md py-3"
            >
                Login
            </Link>
        </div>
        <div
            class="w-[1180px] min-h-screen mx-auto max-2xl:w-[1000px] max-xl:w-[1000px] max-md:w-screen max-md:px-5 py-5 max-sm:py-0 text-white"
        >
            <!-- Header -->
            <div
                class="flex justify-between items-center bg-gray1 absolute z-10 top-0 left-0 w-screen py-5 px-5 text-white md:hidden"
            >
                <Link :href="route('home')">
                    <img :src="logo" alt="" class="h-8" />
                </Link>
                <div
                    class="lg:hidden cursor-pointer select-none"
                    @click="show_nav = !show_nav"
                >
                    <img :src="burger" alt="" class="h-6" />
                </div>
            </div>
            <!-- Responsive Nav -->
            <div v-if="show_nav">
                <MobileNav @close_emit="show_nav = !show_nav" />
            </div>
            <slot></slot>
        </div>
    </div>
</template>
