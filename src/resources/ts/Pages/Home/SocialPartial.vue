<script setup lang="ts">
import { images } from '@/Types/ImageHelper'
</script>

<template>
    <section
        class="sm:h-90 h-96 max-w-7xl w-full mx-auto relative"
        :aria-label="$t('follow_us_section_label')"
    >
        <!-- Background image -->
        <figure
            class="absolute rounded-2xl inset-0 opacity-80 h-full bg-repeat"
            :style="{
                'background-size': 'auto 130%',
                'background-image': 'url(' + images.wall_paper + ')',
            }"
            aria-hidden="true"
        ></figure>

        <!-- Social links -->
        <div
            class="flex-wrap absolute gap-7 inset-0 h-fit m-auto flex flex-row justify-around max-w-2xl"
        >
            <a
                class="bg-white my-auto max-sm:mx-auto h-fit w-fit p-3 rounded-xl"
                href="https://www.facebook.com/capricciosapizzerie/"
                target="_blank"
                rel="noopener noreferrer"
                :aria-label="$t('follow_us_facebook_label')"
            >
                <i
                    class="text-capricciosa_red pi pi-facebook"
                    style="font-size: 5rem"
                    aria-hidden="true"
                ></i>
            </a>
            <a
                class="bg-white my-auto max-sm:mx-auto h-fit w-fit p-3 rounded-xl"
                href="https://www.instagram.com/capricciosapizzerie/"
                target="_blank"
                rel="noopener noreferrer"
                :aria-label="$t('follow_us_instagram_label')"
            >
                <i
                    class="text-capricciosa_red pi pi-instagram"
                    style="font-size: 5rem"
                    aria-hidden="true"
                ></i>
            </a>
            <a
                class="bg-white my-auto max-sm:mx-auto h-fit w-fit p-3 rounded-xl"
                href="https://www.linkedin.com/company/capricciosa-pizzeria/"
                target="_blank"
                rel="noopener noreferrer"
                :aria-label="$t('follow_us_linkedin_label')"
            >
                <i
                    class="text-capricciosa_red pi pi-linkedin"
                    style="font-size: 5rem"
                    aria-hidden="true"
                ></i>
            </a>
        </div>
    </section>
</template>

<style scoped></style>
