<script setup lang="ts">

import {DisclosureButton} from "@headlessui/vue";

const elements = [
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
        <div v-for="element in elements">
            <div>
                {{ element.name }}
            </div>
            <hr class="w-full">
            <div>
                <p v-for="line in element.lines">
                    {{ line}}
                </p>
            </div>
        </div>
    </footer>
    <hr class="w-full">
    <div class="footer flex flex-row space-x-10 justify-center my-4" >
        ©Enoteca Centrale S.r.l. | Dati Societari | Privacy GDPR | Credits
    </div>
</template>


