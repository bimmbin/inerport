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

const arrow = ref("/img/arrow.svg");

</script>

<template>
    <Head title="Home" />

    <HeroSection />

    <!-- Frameworks -->
    <div class="w-full h-20 bg-gray1 absolute left-0 flex items-center">
        <div class="w-[1200px] mx-auto flex items-center justify-around">
          <ScrollTools imageSrc="tailwind.png" imageLabel="tailwindcss" />
          <ScrollTools imageSrc="laravel.png" imageLabel="laravel" />
          <ScrollTools imageSrc="vue.png" imageLabel="Vue.js" />
        </div>
      </div>

      <!-- Featured Projects -->
      <div class="mt-20 mb-40">
        <div class="flex items-center justify-between pt-32">
          <h1 class="text-5xl font-bold">Featured Projects</h1>

          <div class="flex items-center gap-2">
            <img :src="arrow" alt="" class="w-6" />
            <p class="text-main text-lg underline">See all projects</p>
          </div>
        </div>
        <div class="mt-20 flex flex-wrap justify-between">
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
      <div class="w-full h-20 bg-gray1 absolute left-0 flex items-center">
        <div class="w-[1200px] mx-auto flex items-center justify-around">
          <ScrollStacks imageSrc="html.png" />
          <ScrollStacks imageSrc="css.png" />
          <ScrollStacks imageSrc="javascript.png" />
          <ScrollStacks imageSrc="php.png" />
        </div>
      </div>

      <!-- about section -->
      <div class="pt-40 pb-20 text-center">
        <h1 class="font-bold text-5xl mb-10">About</h1>
        <div
          class="flex flex-col font-light text-[1.8rem] gap-7 leading-[2.7rem]"
        >
          <p>
            Greetings! I'm Arvin Gomez, a passionate front-end web developer
            based in the vibrant city of Concepcion Tarlac. I take immense pride
            in announcing that I have recently completed my Bachelor of Science
            in Computer Science degree.
          </p>
          <p>
            Driven by my passion for website development, I immerse myself in
            the exciting world of coding while constantly seeking new avenues
            for growth and improvement.
          </p>
          <p>
            Vinrecs, my digital sanctuary, is an embodiment of my journey,
            combining the essence of my name with the concept of records, a
            reflection of my ever-evolving collection of remarkable projects.
          </p>
          <p>
            Join me on this incredible journey, and together, let's create
            exceptional web experiences that leave a lasting impact!
          </p>
        </div>
      </div>

      <!-- footer section -->
      <div class="w-full pt-10 bg-gray1 absolute left-0 flex flex-col items-center ">
        <div class="w-[1200px] mx-auto flex justify-between">
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
              <FooterLists listname="Web App Development" :isLink="false" />
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
        <div class="border-t-2 border-gray2 w-[1200px] flex justify-center items-center py-7 mt-9">
          <p>© 2023 Vinrecs. All rights reserved</p>
        </div>
      </div>
      <!-- asdfasdfsd -->
</template>
