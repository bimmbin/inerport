<script setup>
import { Link } from "@inertiajs/vue3";
import DashNav from "@/Components/DashNav.vue";
import DashDrop from "@/Components/DashDrop.vue";

import "typeface-poppins";
</script>

<template>
    <div class="flex font-pop bg-portbg">
        <!-- navigation -->
        <div class="h-screen bg-gray1 px-6 py-20 flex flex-col gap-10">
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
        <div class="w-[1550px] mx-auto py-5 h-full text-white">
            <slot></slot>
        </div>
    </div>
</template>
