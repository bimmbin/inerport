<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  projTitle: {
    type: String,
    required: true,
  },
  liveLink: {
    type: String,
    required: true,
  },
  detailsLink: {
    type: String,
    required: true,
  },
});
const proj = ref("/img/proj.png");
const link = ref("/img/link.svg");
const eye = ref("/img/eye.svg");
</script>

<template>
    <div class="w-[49.5%] max-xl:w-[495px] max-md:w-screen h-80 max-sm:h-60 bg-gray2 flex flex-col justify-between">
      <div class="h-48 max-sm:h-32">
        <img :src="proj" alt="" class="object-cover w-full h-full opacity-60">
      </div>
      <div class="flex flex-col gap-2 px-10 py-5">
          <p class="font-bold text-3xl max-xl:text-2xl max-md:text-xl">{{ props.projTitle }}</p>
          <div class="flex items-center gap-10 opacity-50 font-light max-xl:text-sm max-md:text-xs">
            <a :href="'https://www.' + props.liveLink" target="_blank" class="flex items-center gap-2">
              <p>See live</p>
              <img :src="link" alt="" class="max-xl:h-4 max-md:h-3"/>
            </a>

            <!-- change this to routerLink -->
            <a :href="props.detailsLink" target="_blank" class="flex items-center gap-2">
              <p>View more details</p>
              <img :src="eye" alt="" class="max-xl:h-4 max-md:h-3"/>
            </a>
          </div>
        </div>
    </div>
</template>
