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
    <div class="mt-20 mb-40 max-sm:mt-0 max-sm:mb-10">
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
            class="mt-20 max-sm:mt-10 flex justify-evenly flex-wrap max-md:flex-col gap-2"
        >
            <div v-for="feat_project in feat_projects">
                <FeaturedProjects
                    stack="Laravel"
                    :projTitle="feat_project.proj_title"
                    :liveLink="feat_project.web_dev.live_link"
                    :detailsLink="feat_project.id"
                />
            </div>
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
    <div class="pt-40 pb-20 max-sm:pt-32 text-center">
        <h1
            class="font-bold text-5xl mb-10 max-md:mb-5 max-md:text-3xl max-sm:text-2xl"
        >
            About
        </h1>
        <div
            class="mt-20 max-md:mt-10 max-sm:mt-0 flex flex-wrap justify-between max-md:flex-col"
        >
            <!-- 1st card -->
            <AboutCard
                image="bulb"
                about_title="Turning Ideas into Reality"
                about_content="Hello, I'm Arvin Gomez, a web developer and designer. My
                    goal is to help you bring your app ideas to life. I use
                    various technologies like Laravel, Vue.js, Tailwind CSS,
                    HTML, CSS, and JavaScript to provide complete solutions for
                    your projects."
            />
            <!-- 2nd card -->
            <AboutCard
                image="design"
                about_title="User-Friendly Designs"
                about_content=" I specialize in making user interfaces that look great and
                    are easy to use. Whether it's for websites or mobile apps, I
                    design with your brand in mind to capture your audience's
                    attention and provide a smooth experience."
            />

            <!-- 3rd card -->
            <AboutCard
                image="record"
                about_title="Proven Track Record"
                about_content="You can count on me to get the job done. I've successfully
                    completed many projects, and I'm known for clear
                    communication, working closely with clients, and always
                    delivering on time."
            />

            <!-- 4th card -->
            <AboutCard
                image="handshake"
                about_title="Let's Work Together"
                about_content="If you're ready to turn your ideas into reality, let's chat.
                    Whether your project is well-defined or needs some refining,
                    I'm here to help you create a standout digital solution that
                    meets your goals."
            />
        </div>
    </div>

    <!-- footer section -->
    <div
        class="w-full pt-10 bg-gray1 absolute left-0 flex flex-col items-center overflow-hidden"
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
