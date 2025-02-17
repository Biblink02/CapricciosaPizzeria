<script setup lang="ts">
import { images } from '@/Types/ImageHelper'
</script>

<template>
    <div class="sm:h-90 h-96 max-w-7xl w-full mx-auto relative">
        <div
            class="absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 100%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
        ></div>
        <div
            class="flex-wrap absolute inset-0 h-fit m-auto flex flex-row justify-around max-w-2xl"
        >
            <a
                class="bg-white mb-10 max-sm:mx-auto h-fit w-fit p-3 rounded-xl"
                href="https://www.facebook.com/capricciosapizzerie/"
                target="_blank"
            >
                <i
                    class="text-capricciosa_darker_green pi pi-facebook"
                    style="font-size: 5rem"
                ></i>
            </a>
            <a
                class="bg-white mb-10 max-sm:mx-auto h-fit w-fit p-3 rounded-xl"
                href="https://www.instagram.com/capricciosapizzerie/"
                target="_blank"
            >
                <i
                    class="text-capricciosa_darker_green pi pi-instagram"
                    style="font-size: 5rem"
                ></i>
            </a>
        </div>
    </div>
</template>
<style scoped></style>
