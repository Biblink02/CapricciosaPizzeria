<script setup lang="ts">

const props = defineProps<{
    footer: Footer
}>()

const ciao = {
    sections: [
        {
            title: 'Eventi',
            rows: [
                'ciao'
            ]
        }
    ]
}
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
