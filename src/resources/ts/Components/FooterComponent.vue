<script setup lang="ts">

const props = defineProps<{
    footer: Footer
}>()

const footer = [
    {
        name: "Enoteca Centrale",
        lines: [
            "Via IV Novembre, 59",
            "35035 Mestrino Padova",
            "Tel. +39 049 9004947",
            "Mobile +39 335 5717527 (WhatsApp)",
            "info@enotecacentrale.it"
        ]
    },
    {
        name: "News/Eventi",
        lines: [
            "Banqueting",
            "Eventi",
            "Events",
            "Foto Gallery Eventi",
            "News"
        ]
    },
    {
        name: "Contatti",
        lines: [
            "Dove siamo"
        ]
    },
    {
        name: "Orari apertura",
        lines: [
            "Lunedì - Sabato",
            "Aperitivo",
            "dalle 11:00 alle 15:00 e",
            "dalle 17:30 alle 23.30",
            "Servizio pranzo",
            "dalle 12:00 alle 14.30",
            "Servizio cena",
            "dalle 19:00 alle 23:30"
        ]
    }
]
</script>

<template>
    <footer class="footer flex flex-row space-x-10 justify-center my-28">
        <div v-for="section in ciao.sections">
            <div>
                {{ section.title }}
            </div>
            <hr class="w-full">
            <div>
                <p v-for="row in section.rows">
                    {{ row }}
                </p>
            </div>
        </div>
    </footer>
</template>
