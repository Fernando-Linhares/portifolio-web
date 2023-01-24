<script setup>


import { Head } from '@inertiajs/vue3';
import OverView from '@/Components/OverView.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    
    <Head>
        <title>Fernando Linhares</title>
       <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   </Head>
   
    <div>
        <OverView></OverView>           
    </div>
</template>
