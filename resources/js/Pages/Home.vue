<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    layout: GuestLayout,
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

import HeroSection from "@/Components/HomeComponents/HeroSection.vue";
import ScrollTools from "@/Components/HomeComponents/ScrollTools.vue";
import FeaturedProjects from "@/Components/HomeComponents/FeaturedProjects.vue";
import ScrollStacks from "@/Components/HomeComponents/ScrollStacks.vue";
import FooterLists from "@/Components/HomeComponents/FooterLists.vue";
import FootHeader from "@/Components/HomeComponents/FootHeader.vue";
import AboutCard from "@/Components/HomeComponents/AboutCard.vue";

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
    <div class="w-full h-20 bg-gray1 absolute left-0 flex items-center opacity-70">
        <div class="w-full mx-auto flex items-center justify-around">
            <ScrollTools imageSrc="tailwind.png" imageLabel="tailwindcss" />
            <ScrollTools imageSrc="laravel.png" imageLabel="laravel" />
            <ScrollTools imageSrc="vue.png" imageLabel="Vue.js" />
        </div>
    </div>

    <!-- Featured Projects -->
    <div class="mt-20 mb-40">
        <div class="flex items-center justify-between pt-32">
            <h1 class="text-5xl font-bold max-xl:text-3xl max-md:text-2xl">
                Featured Projects
            </h1>

            <div class="flex items-center gap-2">
                <img :src="arrow" alt="" class="w-6 max-xl:w-5 max-md:w-4" />
                <p
                    class="text-main text-lg underline max-xl:text-md max-md:text-sm"
                >
                    See all projects
                </p>
            </div>
        </div>
        <div class="mt-20 flex flex-wrap justify-between max-md:flex-col">
            <FeaturedProjects
                stack="Laravel"
                projTitle="Paperless Clearance Management System"
                liveLink="github.com/bimmbin"
                detailsLink="facebook.com"
            />
            <FeaturedProjects
                stack="Laravel"
                projTitle="Automated Grading System"
                liveLink="github.com/bimmbin"
                detailsLink="facebook.com"
            />
            <FeaturedProjects
                stack="Vue.js/Laravel"
                projTitle="Personal Portfolio"
                liveLink="github.com/bimmbin"
                detailsLink="facebook.com"
            />
            <FeaturedProjects
                stack="PHP"
                projTitle="Blog Website"
                liveLink="github.com/bimmbin"
                detailsLink="facebook.com"
            />
        </div>
    </div>

    <!-- scroll stacks -->
    <div class="w-full h-20 bg-gray1 absolute left-0 flex items-center opacity-70">
        <div class="w-full mx-auto flex items-center justify-around">
            <ScrollStacks imageSrc="html.png" />
            <ScrollStacks imageSrc="css.png" />
            <ScrollStacks imageSrc="javascript.png" />
            <ScrollStacks imageSrc="php.png" />
        </div>
    </div>

    <!-- about section -->
    <div class="pt-40 pb-20 text-center">
        <h1 class="font-bold text-5xl mb-10 max-md:mb-5 max-md:text-3xl">About</h1>
        <div class="mt-20 max-md:mt-10 flex flex-wrap justify-between max-md:flex-col">
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
            class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-screen flex justify-between"
        >
            <!-- reusable -->
            <div class="">
                <FootHeader> Stacks </FootHeader>
                <div class="">
                    <FooterLists listname="HTML" :isLink="false" />
                    <FooterLists listname="CSS" :isLink="false" />
                    <FooterLists listname="Javascript" :isLink="false" />
                    <FooterLists listname="PHP" :isLink="false" />
                    <FooterLists listname="Mysql" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="">
                <FootHeader> Tools/Frameworks </FootHeader>
                <div class="">
                    <FooterLists listname="Tailwindcss" :isLink="false" />
                    <FooterLists listname="Laravel" :isLink="false" />
                    <FooterLists listname="Vue.js" :isLink="false" />
                    <FooterLists listname="Figma" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="">
                <FootHeader> Capabilities </FootHeader>
                <div class="">
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
            <div class="">
                <FootHeader> Sitemap </FootHeader>
                <div class="">
                    <!-- make these router links -->
                    <FooterLists listname="Home" :isLink="false" />
                    <FooterLists listname="Projects" :isLink="false" />
                    <FooterLists listname="About" :isLink="false" />
                    <FooterLists listname="Contact" :isLink="false" />
                </div>
            </div>
            <!-- reusable -->
            <div class="">
                <FootHeader> Socials </FootHeader>
                <div class="">
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
        </div>
        <div
            class="border-t-2 border-gray2 w-full flex justify-center items-center py-7 mt-9"
        >
            <p>© 2023 Vinrecs. All rights reserved</p>
        </div>
    </div>
    <!-- asdfasdfsd -->
</template>
