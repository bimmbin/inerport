<script setup>
import { onMounted, ref } from "vue";
import { LottieAnimation } from "lottie-web-vue";
import HeroMan from "@/lottiefiles/samp.json";

let anim = ref();

onMounted(() => {
    setTimeout(() => {
        anim.value;
    }, 500);
});

</script>

<template>
    <div class="flex justify-between pt-28 h-[40rem]">
        <div class="">
            <p class="w-[45rem] text-[2.50rem] font-bold leading-[3.5rem]">
                Your <span class="text-main">website</span>, your success story
                let’s create a digital masterpiece that connects you with your
                valuable <span class="text-main">customers</span>.
            </p>
            <h1 class="text-xl opacity-50 font-light">
                Full stack web developer
            </h1>
            <h1 class="text-xl opacity-50 font-light">~ Arvin Gomez</h1>
        </div>
        <div class="w-[40rem] translate-y-[7rem] translate-x-[-3rem]">
            <LottieAnimation
                :animation-data="HeroMan"
                :auto-play="true"
                :loop="true"
                :speed="1"
                ref="anim"
            />
        </div>
    </div>
</template>
