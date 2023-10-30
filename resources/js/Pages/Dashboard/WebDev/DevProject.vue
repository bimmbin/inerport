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
import EditProj from "@/Components/WebDev/EditProj.vue";

const exit = ref("/img/exit.svg");
const live = ref("/img/live.svg");
const github = ref("/img/github.svg");
const edit = ref("/img/edit.svg");

const { project, recommend_projects } = defineProps({
    project: Object,
    recommend_projects: Object,
});

let item_count = ref();

//current state
if (window.innerWidth <= 400) {
    item_count.value = 1;
} else if (window.innerWidth <= 700) {
    item_count.value = 2;
} else if (window.innerWidth <= 1280) {
    item_count.value = 3;
} else {
    item_count.value = 5;
}

//responsive state
function handleResize() {
    const innerWidth = window.innerWidth;
    console.log(`Window innerWidth: ${innerWidth}px`);
    if (innerWidth <= 400) {
        item_count.value = 1;
    } else if (innerWidth <= 700) {
        item_count.value = 2;
    } else if (innerWidth <= 1280) {
        item_count.value = 3;
    } else {
        item_count.value = 5;
    }
}

window.addEventListener("resize", handleResize);

const show_edit = ref(false);
</script>

<template>
    <div v-if="show_edit">
        <EditProj @close_emit="show_edit = !show_edit" :project="project"></EditProj>
    </div>
    <DialogOverlay route_back="web-development.index">
        <div class="flex justify-between items-start w-full mb-5 max-sm:mb-2">
            <div class="flex flex-col gap-3">
                <h2 class="text-4xl font-bold max-xl:text-3xl max-md:text-2xl">
                    {{ project.proj_title }}
                </h2>
                <div class="mr-10 flex gap-5 max-sm:gap-2 sm:hidden">
                    <a
                        :href="'https://www.' + project.web_dev.live_link"
                        target="_blank"
                        class="bg-red-500"
                    >
                        <img
                            :src="live"
                            class="h-20 cursor-pointer select-none max-xl:h-7 max-md:h-6"
                        />
                    </a>
                    <a
                        :href="'https://www.' + project.web_dev.github_link"
                        target="_blank"
                        class="bg-red-500"
                    >
                        <img
                            :src="github"
                            class="h-20 select-none max-xl:h-7 max-md:h-6"
                        />
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-5">
                <div class="mr-10 flex gap-5 max-sm:hidden">
                    <div
                        @click="show_edit = !show_edit"
                        class="cursor-pointer border-[2px] border-gray-600 active:bg-main rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="edit"
                            class="h-6 select-none max-xl:h-6 max-md:h-5"
                        />
                    </div>
                    <a
                        :href="'https://www.' + project.web_dev.live_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] active:bg-main border-gray-600 rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="live"
                            class="h-6 select-none max-xl:h-6 max-md:h-5"
                        />
                    </a>
                    <a
                        :href="'https://www.' + project.web_dev.github_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] active:bg-main border-gray-600 rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="github"
                            class="h-6 cursor-pointer select-none max-xl:h-6 max-md:h-5"
                        />
                    </a>
                </div>
                <Link :href="route('web-development.index')">
                    <img
                        :src="exit"
                        class="h-7 cursor-pointer select-none max-xl:h-6 max-md:h-5 max-sm:mt-2"
                    />
                </Link>
            </div>
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

        <p class="mt-5 max-sm:text-sm">{{ project.proj_description }}</p>

        <!-- features -->
        <div class="mt-5">
            <h2 class="text-3xl font-semibold max-sm:text-xl">Features</h2>
            <div class="flex flex-wrap gap-2">
                <span
                    v-for="feat in project.web_dev.web_feat"
                    class="bg-main px-5 py-2 rounded-full font-semibold mt-2 max-sm:text-sm max-sm:px-3 max-sm:py-2"
                    >{{ feat.feat_name }}</span
                >
            </div>
        </div>

        <!-- tech used -->
        <div class="mt-5">
            <h2 class="text-3xl font-semibold">Technology Used</h2>
            <div class="flex flex-wrap gap-2">
                <span
                    v-for="tech in project.web_dev.tech_used"
                    class="bg-main px-5 py-2 rounded-full font-semibold mt-2 max-sm:text-sm max-sm:px-3 max-sm:py-2"
                    >{{ tech.tech_name }}</span
                >
            </div>
        </div>

        <div class="mt-5">
            <span class="text font-semibold">Other projects</span>

            <Carousel
                :items-to-show="item_count"
                :autoplay="5000"
                :wrap-around="true"
            >
                <Slide
                    v-for="rec_proj in recommend_projects"
                    :key="rec_proj.id"
                    class="pr-2"
                >
                    <div class="relative w-80 min-h-40 box-border">
                        <img
                            :src="rec_proj.img_thumbnail"
                            class="object-cover w-full h-40"
                        />
                        <div
                            class="absolute bottom-0 left-0 z-10 w-full h-fit bg-black bg-opacity-80 py-3 px-4"
                        >
                            <h2 class="text-lg font-semibold">
                                {{ rec_proj.proj_title }}
                            </h2>
                            <h2 class="font-extralight text-sm opacity-60">
                                Web Development
                            </h2>
                        </div>
                    </div>
                </Slide>
            </Carousel>
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
/* .carousel__slide {
    padding: 10px;
    background: black;
    border-radius: 15px;
} */
.carousel__pagination-button:hover::after,
.carousel__pagination-button--active::after .carousel__prev:hover {
    background-color: red;
}
.carousel__next:hover {
    color: gray;
}

.carousel {
    text-align: start;
}
</style>
