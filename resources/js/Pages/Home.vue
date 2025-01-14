<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    layout: GuestLayout,
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import HeroSection from "@/Components/HomeComponents/HeroSection.vue";
import ScrollTools from "@/Components/HomeComponents/ScrollTools.vue";
import FeaturedProjects from "@/Components/HomeComponents/FeaturedProjects.vue";
import ScrollStacks from "@/Components/HomeComponents/ScrollStacks.vue";
import FooterLists from "@/Components/HomeComponents/FooterLists.vue";
import FootHeader from "@/Components/HomeComponents/FootHeader.vue";
import AboutCard from "@/Components/HomeComponents/AboutCard.vue";

const { feat_projects } = defineProps({
    feat_projects: Object,
});

const arrow = ref("/img/arrow.svg");
const bulb = ref("/img/bulb.svg");
const design = ref("/img/design.svg");
const record = ref("/img/record.svg");
const handshake = ref("/img/handshake.svg");
</script>

<template>
    <Head title="Home" />

    <HeroSection />

    <!-- Frameworks -->
    <div
        class="w-full h-20 bg-gray1 absolute left-0 flex items-center opacity-70"
    >
        <div class="w-full mx-auto flex items-center justify-around">
            <ScrollTools imageSrc="tailwind.png" imageLabel="tailwindcss" />
            <ScrollTools imageSrc="laravel.png" imageLabel="laravel" />
            <ScrollTools imageSrc="vue.png" imageLabel="Vue.js" />
        </div>
    </div>

    <!-- Featured Projects -->
    <div class="mt-20 mb-40 max-sm:mt-0 max-sm:mb-10" id="projects">
        <div class="flex items-center justify-between pt-32">
            <h1
                class="text-5xl font-bold max-xl:text-3xl max-md:text-2xl max-sm:text-xl"
            >
                Featured Projects
            </h1>

            <div class="flex items-center gap-2">
                <img :src="arrow" alt="" class="w-6 max-xl:w-5 max-md:w-4" />
                <Link
                    :href="route('web-development.index')"
                    class="text-main text-lg underline max-xl:text-md max-md:text-sm"
                >
                    See all projects
                </Link>
            </div>
        </div>
        <div
            class="mt-20 max-sm:mt-10 grid grid-cols-2 gap-4 max-md:grid-cols-1"
        >
            <!-- <div class="w-full h-60 bg-gray2"></div>
            <div class="w-full h-60 bg-gray2"></div>
            <div class="w-full h-60 bg-gray2"></div>
            <div class="w-full h-60 bg-gray2"></div> -->

            <FeaturedProjects
                v-for="feat_project in feat_projects"
                stack="Laravel"
                :projTitle="feat_project.proj_title"
                :liveLink="feat_project.web_dev.live_link"
                :detailsLink="feat_project.id"
                :imgSrc="
                    feat_project.image_showcase[feat_project.img_thumbnail]
                        .img_path
                "
            />
        </div>
    </div>

    <!-- scroll stacks -->
    <div
        class="w-full h-20 bg-gray1 absolute left-0 flex items-center opacity-70"
    >
        <div class="w-full mx-auto flex items-center justify-around">
            <ScrollStacks imageSrc="html.png" />
            <ScrollStacks imageSrc="css.png" />
            <ScrollStacks imageSrc="javascript.png" />
            <ScrollStacks imageSrc="php.png" />
        </div>
    </div>

    <!-- about section -->
    <div class="pt-40 pb-20 max-sm:pt-32 text-center" id="about">
        <h1
            class="font-bold text-5xl mb-10 max-md:mb-5 max-md:text-3xl max-sm:text-2xl"
        >
            About
        </h1>

        <div class="text-start flex justify-between gap-3">
            <div class="w-full space-y-5 bg-red-500 bg-opacity-10">
                <h1 class="text-xl">
                    I'm Arvin Gomez with 2 years of experience as a Full Stack
                    Web Developer, I specialize in crafting seamless and
                    efficient digital solutions. My expertise in Laravel,
                    Vue.js, and modern design frameworks like Tailwind CSS
                    allows me to deliver exceptional results that blend
                    functionality with aesthetic appeal.
                </h1>

                <h2 class="text-xl">
                    But it’s not just about writing code—it’s about solving
                    problems and delivering meaningful solutions. Whether it’s
                    optimizing system workflows, creating user-friendly
                    interfaces, or building scalable back-end architectures, I
                    thrive on turning challenges into opportunities that drive
                    success.
                </h2>
            </div>
            <div class="w-full bg-blue-500 bg-opacity-10 flex gap-5 flex-col">
                <h2 class="font-semibold text-2xl">Why Choose Me?</h2>
                <ul>
                    <li class="flex mb-2 flex-col">
                        <span class="font-semibold whitespace-nowrap"
                            >Adaptable Problem Solver:</span
                        >
                        <p>
                            I approach every project with a solution-oriented
                            mindset.
                        </p>
                    </li>
                    <li class="flex mb-2 flex-col">
                        <span class="font-semibold whitespace-nowrap"
                            >Collaborative Partner:</span
                        >
                        <p>
                            I tailor my work to meet unique needs and goals,
                            ensuring the best possible outcome.
                        </p>
                    </li>
                    <li class="flex mb-2 flex-col">
                        <span class="font-semibold whitespace-nowrap"
                            >User-Focused Approach:</span
                        >
                        <p class="">
                            From system design to user experience, my work is
                            always centered on delivering value.
                        </p>
                    </li>
                </ul>
                <p>
                    Let’s Build Together I’m passionate about leveraging my
                    skills to create impactful applications that make a
                    difference. Whether it's contributing to innovative teams or
                    building solutions that solve real-world challenges, I bring
                    dedication and expertise to every project. Let’s connect and
                    explore how we can work together to create something
                    exceptional!
                </p>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <div
        class="w-full pt-10 bg-gray1 absolute left-0 flex flex-col items-center overflow-hidden"
        id="contact"
    >
        <div
            class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-screen flex justify-between flex-wrap max-sm:items-center max-sm:text-center max-sm:gap-5"
        >
            <!-- reusable -->
            <div class="max-sm:w-full">
                <FootHeader> Sitemap </FootHeader>
                <div
                    class="flex flex-col items-start max-sm:items-center justify-center max-sm:gap-2"
                >
                    <!-- make these router links -->
                    <FooterLists listname="Home" :isLink="false" />
                    <FooterLists listname="Projects" :isLink="false" />
                    <FooterLists listname="About" :isLink="false" />
                    <FooterLists listname="Contact" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="max-sm:w-full">
                <FootHeader> Socials </FootHeader>
                <div
                    class="flex flex-col items-start max-sm:items-center justify-center max-sm:gap-2"
                >
                    <FooterLists
                        listname="LinkedIn"
                        :isLink="true"
                        footLink="https://www.linkedin.com/in/arvin-gomez-b51b91247/"
                    />
                    <FooterLists
                        listname="Upwork"
                        :isLink="true"
                        footLink="https://www.upwork.com/freelancers/~0179c9049558554817"
                    />
                    <FooterLists
                        listname="Facebook"
                        :isLink="true"
                        footLink="https://www.facebook.com/"
                    />
                    <FooterLists
                        listname="Github"
                        :isLink="true"
                        footLink="https://github.com/bimmbin"
                    />
                </div>
            </div>
            <!-- reusable -->
            <div class="max-sm:w-full">
                <FootHeader> Capabilities </FootHeader>
                <div
                    class="flex flex-col items-start max-sm:items-center justify-center max-sm:gap-2"
                >
                    <FooterLists
                        listname="Web App Development"
                        :isLink="false"
                    />
                    <FooterLists listname="Web Design" :isLink="false" />
                    <FooterLists listname="UI/UX" :isLink="false" />
                    <FooterLists listname="Database Design" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="max-sm:w-full">
                <FootHeader> Tools/Frameworks </FootHeader>
                <div
                    class="flex flex-col items-start max-sm:items-center justify-center max-sm:gap-2"
                >
                    <FooterLists listname="Tailwindcss" :isLink="false" />
                    <FooterLists listname="Laravel" :isLink="false" />
                    <FooterLists listname="Vue.js" :isLink="false" />
                    <FooterLists listname="Figma" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="max-sm:w-full">
                <FootHeader> Stacks </FootHeader>
                <div
                    class="flex flex-col items-start max-sm:items-center justify-center max-sm:gap-2"
                >
                    <FooterLists listname="HTML" :isLink="false" />
                    <FooterLists listname="CSS" :isLink="false" />
                    <FooterLists listname="Javascript" :isLink="false" />
                    <FooterLists listname="PHP" :isLink="false" />
                    <FooterLists listname="Mysql" :isLink="false" />
                </div>
            </div>
        </div>
        <div
            class="border-t-2 border-gray2 w-full flex justify-center items-center py-7 mt-9 max-xl:text-sm"
        >
            <p>© 2023 Vinrecs. All rights reserved</p>
        </div>
    </div>
    <!-- asdfasdfsd -->
</template>
