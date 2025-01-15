<script>
import ProjectLayout from "@/Layouts/ProjectLayout.vue";

export default {
    layout: ProjectLayout,
};
</script>

<script setup>
import { useForm, Link, Head } from "@inertiajs/vue3";
import { Collapse } from "vue-collapsed";
import { ref } from "vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

import DialogOverlay from "@/Components/DialogOverlay.vue";
import EditProj from "@/Components/WebDev/EditProj.vue";
import SureDialog from "@/Components/SureDialog.vue";

const exit = ref("/img/exit.svg");
const live = ref("/img/live.svg");
const github = ref("/img/github.svg");
const edit = ref("/img/edit.svg");
const delete_icon = ref("/img/delete.svg");

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
const show_delete = ref(false);
const show_more_projects = ref(false);

const drop = ref("/img/drop.svg");

const getback = () => {
    window.history.back();
};

const form = useForm({
    proj_title: "",
});

const submit = () => {
    form.post(route("web-development.destroy", project.id));
};
</script>

<template>
    <Head :title="project.proj_title" />

    <div v-if="show_edit">
        <EditProj
            @close_emit="show_edit = !show_edit"
            :project="project"
        ></EditProj>
    </div>
    <div v-if="show_delete">
        <SureDialog
            :project="project"
            question="Are you sure you want to delete this project?"
            @close_sure="show_delete = !show_delete"
            @delete_emit="submit()"
        />
    </div>
    <DialogOverlay route_back="web-development.index">
        <div class="flex justify-between items-start w-full mb-5 max-sm:mb-2">
            <div class="flex flex-col gap-3">
                <h2
                    class="text-4xl font-bold max-xl:text-3xl max-md:text-2xl capitalize"
                >
                    {{ project.proj_title }}
                </h2>
                <div class="mr-10 flex gap-5 max-sm:gap-2 sm:hidden">
                    <div
                        v-if="$page.props.auth.user"
                        @click="show_delete = !show_delete"
                        class="cursor-pointer border-[2px] border-red-600 active:bg-red-400 rounded-full p-2 hover:bg-red-500 w-fit h-fit"
                    >
                        <img
                            :src="delete_icon"
                            class="cursor-pointer select-none max-xl:h-7 max-md:h-4"
                        />
                    </div>
                    <div
                        v-if="$page.props.auth.user"
                        @click="show_edit = !show_edit"
                        class="cursor-pointer border-[2px] border-gray-600 active:bg-main-primary rounded-full p-2 hover:bg-gray-600 w-fit h-fit"
                    >
                        <img
                            :src="edit"
                            class="cursor-pointer select-none max-xl:h-7 max-md:h-4"
                        />
                    </div>
                    <a
                        :href="'http://' + project.web_dev.live_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] border-gray-600 active:bg-main-primary rounded-full p-1 hover:bg-gray-600 w-fit h-fit"
                    >
                        <img
                            :src="live"
                            class="h-20 cursor-pointer select-none max-xl:h-7 max-md:h-6"
                        />
                    </a>
                    <a
                        :href="'http://' + project.web_dev.github_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] border-gray-600 active:bg-main-primary rounded-full p-1 hover:bg-gray-600 w-fit h-fit"
                    >
                        <img
                            :src="github"
                            class="h-20 cursor-pointer select-none max-xl:h-7 max-md:h-6"
                        />
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-5">
                <div class="mr-10 flex gap-5 max-sm:hidden">
                    <div
                        v-if="$page.props.auth.user"
                        @click="show_delete = !show_delete"
                        class="cursor-pointer border-[2px] border-red-600 active:bg-red-400 rounded-full p-2 hover:bg-red-500 w-fit h-fit"
                    >
                        <img
                            :src="delete_icon"
                            class="h-6 select-none max-xl:h- max-md:h-5"
                        />
                    </div>
                    <div
                        v-if="$page.props.auth.user"
                        @click="show_edit = !show_edit"
                        class="cursor-pointer border-[2px] border-gray-600 active:bg-main-primary rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="edit"
                            class="h-6 select-none max-xl:h-6 max-md:h-5"
                        />
                    </div>
                    <a
                        :href="'http://' + project.web_dev.live_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] active:bg-main-primary border-gray-600 rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="live"
                            class="h-6 select-none max-xl:h-6 max-md:h-5"
                        />
                    </a>
                    <a
                        :href="'http://' + project.web_dev.github_link"
                        target="_blank"
                        class="cursor-pointer border-[2px] active:bg-main-primary border-gray-600 rounded-full p-2 hover:bg-gray-600"
                    >
                        <img
                            :src="github"
                            class="h-6 cursor-pointer select-none max-xl:h-6 max-md:h-5"
                        />
                    </a>
                </div>

                <a href="#" @click="getback()">
                    <img
                        :src="exit"
                        class="h-7 cursor-pointer select-none max-xl:h-6 max-md:h-5 max-sm:mt-2"
                    />
                </a>
            </div>
        </div>

        <carousel :items-to-show="1" :wrap-around="true">
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

        <pre
            class="mt-5 text-lg font-light max-sm:text-sm w-full whitespace-pre-wrap font-manrope"
            >{{ project.proj_description }}</pre
        >

        <!-- features -->
        <div class="mt-5">
            <h2 class="text-3xl font-semibold max-sm:text-xl">Features</h2>
            <div class="flex flex-wrap gap-2 max-sm:gap-1 mt-2">
                <span
                    v-for="feat in project.web_dev.web_feat"
                    class="bg-main-primary_light px-5 py-2 rounded-full font-medium max-sm:text-sm max-sm:px-3 max-sm:py-2"
                    >{{ feat.feat_name }}</span
                >
            </div>
        </div>

        <!-- tech used -->
        <div class="mt-5">
            <h2 class="text-3xl font-semibold max-sm:text-xl">
                Technology Used
            </h2>
            <div class="flex flex-wrap gap-2 max-sm:gap-1 mt-2">
                <span
                    v-for="tech in project.web_dev.tech_used"
                    class="bg-main-primary_light px-5 py-2 rounded-full font-medium max-sm:text-sm max-sm:px-3 max-sm:py-2"
                    >{{ tech.tech_name }}</span
                >
            </div>
        </div>

        <div class="mt-5">
            <div
                class="w-full flex justify-between items-center hover:bg-gray1 cursor-pointer py-3"
                @click="show_more_projects = !show_more_projects"
            >
                <span class="text font-semibold">See other projects</span>
                <img
                    :src="drop"
                    class="w-6 h-6 select-none"
                    :class="{
                        '-rotate-180 transition ease-linear':
                            show_more_projects,
                    }"
                    alt=""
                />
            </div>
            <Collapse :when="show_more_projects">
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
                        <a
                            :href="route('web-development.show', rec_proj.id)"
                            class="relative w-80 max-sm:w-full min-h-40 box-border"
                        >
                            <img
                                :src="
                                    rec_proj.image_showcase[
                                        rec_proj.img_thumbnail
                                    ].img_path
                                "
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
                        </a>
                    </Slide>
                </Carousel>
            </Collapse>
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
