<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
</script>

<template>
    <div class="absolute top-0 left-0 w-full h-full z-50 flex flex-col">
      <div @click="$emit('close_show')" class="bg-black bg-opacity-80 w-full h-28 max-xl:h-20 max-md:h-16 max-sm:h-14 backdrop-blur-lg"></div>
      <div class="bg-gray2 w-full h-full rounded-3xl -translate-y-5 overflow-y-auto">

        <!-- Main content -->
        <div class="w-[1200px] mx-auto max-xl:w-[800px] max-md:w-screen max-md:px-5">

        </div>
        
      </div>
    </div>
  
</template>
