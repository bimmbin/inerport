<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

export default {
    layout: DashboardLayout,
};
</script>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import CardProj from "@/Components/CardProj.vue";
</script>

<template>
    <Head title="Web Development" />
    <div class="w-full flex flex-wrap gap-2">
        <CardProj
            stack="Laravel"
            projTitle="Paperless Clearance Management System"
            liveLink="github.com/bimmbin/grading"
            detailsLink="facebook.com"
        />
        <CardProj
            stack="Laravel"
            projTitle="Automated Grading System"
            liveLink="github.com/bimmbin/grading"
            detailsLink="facebook.com"
        />
        <CardProj
            stack="Laravel"
            projTitle="Automated Grading System"
            liveLink="github.com/bimmbin/grading"
            detailsLink="facebook.com"
        />
        <CardProj
            stack="Laravel"
            projTitle="Automated Grading System"
            liveLink="github.com/bimmbin/grading"
            detailsLink="facebook.com"
        />
    </div>
</template>
