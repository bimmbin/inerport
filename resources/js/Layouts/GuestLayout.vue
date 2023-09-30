<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';
import "typeface-poppins";

const logo = ref("/img/logo.png");
const burger = ref("/img/burger.svg");
</script>

<template>
    <div class="!font-pop bg-portbg text-white w-screen overflow-x-hidden">
        <div class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-screen max-md:px-5">
            <!-- Header -->
            <div
                class="flex justify-between items-center bg-portbg h-20 text-white"
            >
                <img :src="logo" alt="" class="h-8" />
                <nav class="max-lg:hidden">
                    <ul class="flex gap-10">
                        <Link :href="route('home')">Home</Link>
                        <Link :href="route('home')">Projects</Link>

                        <li>About</li>
                        <li>Contact</li>
                    </ul>
                </nav>
                <div class="max-lg:hidden">
                    <p class="border border-main py-1.5 px-5 rounded-full">
                        Login
                    </p>
                </div>
                <div class="lg:hidden">
                  <img :src="burger" alt="" class="h-6 " />
                </div>
            </div>

            <!-- Main content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>
