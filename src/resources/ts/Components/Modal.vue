<script setup lang="ts">
import {ref} from 'vue';
import {XMarkIcon} from '@heroicons/vue/24/solid';
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue';

const shown = ref(false);

const open = () => {
    shown.value = true;
};

const close = () => {
    shown.value = false;
};

defineExpose({
    open,
    close
});
</script>

<template>
    <TransitionRoot
        as="template"
        :show="shown"
    >
        <Dialog
            as="div"
            class="relative z-10"
            @close="close"
        >
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="max-sm:w-full relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6"
                        >
                            <header class="w-full h-fit flex flex-row justify-between h-5 mb-5">
                                <DialogTitle
                                    as="h3"
                                    class="w-fit text-2xl font-bold leading-6 text-gray-900"
                                >
                                    <slot name="title" />
                                </DialogTitle>
                                <div class="h-fit w-fit p-1 flex rounded-full cursor-pointer hover:bg-gray-100">
                                    <XMarkIcon
                                        class="text-gray-500 my-auto h-5 hover:text-gray-600"
                                        @click="close()"
                                    />
                                </div>
                            </header>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    <slot name="main" />
                                </p>
                            </div>
                            <slot name="buttons" />
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
