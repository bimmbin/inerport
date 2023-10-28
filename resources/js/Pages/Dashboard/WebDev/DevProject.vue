<script>
import ProjectLayout from "@/Layouts/ProjectLayout.vue";

export default {
    layout: ProjectLayout,
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

import DialogOverlay from "@/Components/DialogOverlay.vue";

const exit = ref("/img/exit.svg");

const { project } = defineProps({
    project: Object,
});

const items = ["Item 1", "Item 2", "Item 3", "Item 4"];
</script>

<template>
    <DialogOverlay route_back="web-development.index">
        <div class="flex justify-between items-center w-full mb-5 max-sm:mb-2">
            <h2 class="text-4xl font-bold max-xl:text-3xl max-md:text-2xl">
                {{ project.proj_title }}
            </h2>
            <Link :href="route('web-development.index')">
                <img
                    :src="exit"
                    class="h-7 cursor-pointer select-none max-xl:h-6 max-md:h-5"
                />
            </Link>
        </div>


        <carousel
            :items-to-show="1"
            :wrap-around="true"
            :breakpoints="breakpoints"
        >
            <slide v-for="image in project.image_showcase" :key="image.id">
                <img
                    :src="image.img_path"
                    class="object-cover w-full h-[40rem] max-xl:h-[30rem] max-sm:h-[15rem] rounded-lg"
                />
            </slide>

            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>

        <p class="mt-5 max-sm:text-sm">sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd sadf sadf kljsdfsd lkjsdfsd kjsdf jsdkf jf ksdjfls asd </p>

        <!-- features -->
        <div class="mt-5 ">
          <h2 class="text-3xl font-semibold max-sm:text-xl">Features</h2>
          <div class="flex flex-wrap gap-2">
            <span v-for="feat in project.web_dev.web_feat" class="bg-main px-5 py-2 rounded-full font-semibold mt-2 max-sm:text-sm max-sm:px-3 max-sm:py-2">{{ feat.feat_name }}</span>
          </div>
        </div>

        <!-- tech used -->
        <div class="mt-5 ">
          <h2 class="text-3xl font-semibold">Technology Used</h2>
          <div class="flex flex-wrap gap-2">
            <span v-for="tech in project.web_dev.tech_used" class="bg-main px-5 py-2 rounded-full font-semibold mt-2 max-sm:text-sm max-sm:px-3 max-sm:py-2">{{ tech.tech_name }}</span>
          </div>
        </div>
    </DialogOverlay>
    <!-- Header -->
</template>

<style>
:root {
    --vc-clr-primary: #f15a24;
}

.carousel__prev,
.carousel__next {
    font-size: 10rem;
}
.carousel__slide {
    padding: 10px;
    background: black;
    border-radius: 15px;
}
.carousel__pagination-button:hover::after,
.carousel__pagination-button--active::after .carousel__prev:hover {
  background-color: red;
}
.carousel__next:hover {
    color: gray;
}
</style>
