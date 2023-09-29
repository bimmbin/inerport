<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';

const logo = ref("/img/logo.png");
</script>

<template>
    <div class="font-pop bg-portbg text-white w-screen">
        <div class="w-[1200px] mx-auto">
            <!-- Header -->
            <div
                class="flex justify-between items-center bg-portbg h-20 text-white"
            >
                <img :src="logo" alt="" class="h-8" />
                <nav>
                    <ul class="flex gap-10">
                        <Link :href="route('home')">Home</Link>
                        <Link :href="route('home')">Projects</Link>

                        <li>About</li>
                        <li>Contact</li>
                    </ul>
                </nav>
                <div class="">
                    <p class="border border-main py-1.5 px-5 rounded-full">
                        Login
                    </p>
                </div>
            </div>

            <!-- Main content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>
