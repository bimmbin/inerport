<script setup>
import { onMounted, ref } from "vue";
import { LottieAnimation } from "lottie-web-vue";
import StackContainer from "../StackContainer.vue";
import HtmlIcon from "@/Icons/HtmlIcon.vue";
import CssIcon from "@/Icons/CssIcon.vue";
import JavascriptIcon from "@/Icons/JavascriptIcon.vue";
import PhpIcon from "@/Icons/PhpIcon.vue";
import LaravelIcon from "@/Icons/LaravelIcon.vue";
import VueIcon from "@/Icons/VueIcon.vue";
import TailwindcssIcon from "@/Icons/TailwindcssIcon.vue";
import PillButton from "../UI/PillButton.vue";

let anim = ref();

onMounted(() => {
    setTimeout(() => {
        anim.value;
    }, 500);
});
</script>

<template>
    <div
        class="flex max-sm:flex-col max-sm:pt-10 bg-opacity-10 relative justify-center py-48"
        id="home"
    >
        <div
            class="w-[30rem] h-[30rem] blur-[400px] opacity-50 -translate-y-1/2 rounded-full bg-main-primary absolute top-0 left-1/2 -translate-x-1/2"
        ></div>
        <div class="flex flex-col text-center items-center w-[60rem] gap-5">
            <!-- Open to work -->
            <div
                class="flex items-center justify-center gap-2 py-2 px-5 rounded-full bg-white bg-opacity-5"
            >
                <div class="relative w-3 h-3 bg-green-300 rounded-full">
                    <div
                        class="animate-ping absolute z-10 w-3 h-3 bg-green-300 rounded-full"
                    ></div>
                </div>
                <h2>Open to work</h2>
            </div>

            <!-- heading -->
            <h2 class="text-[4rem] leading-[4rem] font-bold">
                Enhancing businesses <br />with custom web solutions.
            </h2>
            <p class="text-lg text-gray-400 font-normal">
                I build custom web solutions design to achieve goals and deliver
                results. <br />
                Whether it’s building functional, user-friendly application or
                solving real world challenges.
            </p>

            <!-- call to action buttons -->
            <div class="flex gap-5 items-center font-medium">
                <PillButton scroll_to="projects" name="Projects" />
                <button
                    class="p-1px bg-gradient-to-l from-gray-500 rounded-full"
                >
                    <div
                        class="bg-background-secondary py-3 px-8 rounded-full text-gray-400 hover:text-white"
                    >
                        Contact
                    </div>
                </button>
            </div>

            <!-- Stacks -->
            <div class="flex items-center gap-5 mt-5">
                <StackContainer name="HTML5"><HtmlIcon /></StackContainer>
                <StackContainer name="CSS"><CssIcon /></StackContainer>
                <StackContainer name="Javascript">
                    <JavascriptIcon />
                </StackContainer>
                <StackContainer name="PHP"><PhpIcon /></StackContainer>
                <StackContainer name="Laravel"><LaravelIcon /></StackContainer>
                <StackContainer name="Vue.js"><VueIcon /></StackContainer>
                <StackContainer name="TailwindCss">
                    <TailwindcssIcon />
                </StackContainer>
            </div>
        </div>
    </div>
</template>
