<script setup>
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";

import DashNav from "@/Components/DashNav.vue";
import DashDrop from "@/Components/DashDrop.vue";

const close_img = ref("/img/close.svg");

const emit = defineEmits(["close_emit"]);


const logo = ref("/img/logo.png");
</script>

<template>
    <div
        class="w-screen fixed top-0 left-0 h-screen bg-black bg-opacity-80 z-10 flex"
    >
       
        <div
            class="flex-1 h-full bg-gray2 px-7 py-5 z-20 flex flex-col gap-20"
        >
            <!-- Logo -->
            <Link :href="route('home')" class="flex items-center gap-2 px-3">
                <img :src="logo" alt="" class="h-7" />
                <h1 class="text-3xl font-semibold">Vinrecs</h1>
            </Link>

            <!-- navigation -->
            <div class="h-full flex flex-col gap-10 sticky left-0 top-0">
                <DashNav image="home" nav_name="Home" :href="route('home')" @click="$emit('close_emit')"/>
                <DashDrop image="project" nav_name="Projects">
                    <DashNav
                        image="webdev"
                        nav_name="Web Development"
                        :href="route('web-development.index')"
                        @click="$emit('close_emit')"
                        class="w-60"
                    />
                    <DashNav
                        image="design-icon"
                        nav_name="Ui Designs"
                        :href="route('ui-design.index')"
                        @click="$emit('close_emit')"
                        class="w-60"
                    />
                    <DashNav
                        image="schema"
                        nav_name="Database Schemas"
                        :href="route('home')"
                        @click="$emit('close_emit')"
                        class="w-60"
                    />
                </DashDrop>
                <DashNav
                    image="about"
                    nav_name="About"
                    :href="route('web-development.index')"
                    @click="$emit('close_emit')"
                />
                <DashNav
                    image="contact"
                    nav_name="Contact"
                    :href="route('ui-design.index')"
                    @click="$emit('close_emit')"
                />
            </div>
        </div>
        <div  class="w-[30%] h-full cursor-pointer " @click="$emit('close_emit')"></div>
    </div>
</template>
