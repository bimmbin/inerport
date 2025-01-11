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
    <div
        class="flex justify-between pt-28 h-[40rem] max-sm:flex-col max-sm:justify-start max-sm:items-center max-sm:pt-10 mt-20"
        id="home"
    >
        <div class="max-sm:text-center flex flex-col gap-2">
            <h1
                class="text-xl opacity-40 font-extralight max-xl:text-lg max-sm:text-base max-sm:font-extralight"
            >
                Delivering custom solutions that works.
            </h1>
            <p
                class="w-[40rem] text-[2.9rem] font-bold leading-[3.6rem] max-xl:text-[1.9rem] max-xl:w-[30rem] max-xl:leading-[2.5rem] max-sm:w-screen max-sm:px-5 max-sm:text-2xl"
            >
                <!-- Your <span class="text-main">website</span>, your success story
                let’s create a digital masterpiece that connects you with your
                valuable <span class="text-main">customers</span>. -->
                I design and <span class="text-main">build</span> scalable web
                applications that solve problems and deliver
                <span class="text-main">results.</span>
            </p>
            <div class="">
                <h1
                    class="text-md opacity-50 font-extralight max-xl:text-lg max-sm:text-base max-sm:font-extralight"
                >
                    Full stack web developer
                </h1>
                <h1
                    class="text-md opacity-50 font-extralight max-xl:text-lg max-sm:text-base max-sm:font-extralight"
                >
                    ~ Arvin Gomez
                </h1>
            </div>
        </div>
        <div
            class="w-[30rem] translate-y-[7rem] translate-x-[-3rem] max-sm:translate-y-0 max-sm:translate-x-0 max-sm:w-[22rem] max-sm:mt-10"
        >
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
