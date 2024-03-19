<script setup lang="ts">

const elements = [
    {
        name: "aaa",
        lines: [
            "aaa",
            "aaa"
        ]
    },
    {
        name: "bbb",
        lines: [
            "bbb",
            "bbb"
        ]
    },
    {
        name: "ccc",
        lines: [
            "ccc",
            "ccc"
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
                    {{line}}
                </p>
            </div>
        </div>
    </footer>
</template>
