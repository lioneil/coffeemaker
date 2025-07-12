<!--suppress CssUnusedSymbol -->
<script setup>
import ControlButton from '@/components/controls/ControlButton.vue';
import IconCheck from '@/components/icons/IconCheck.vue';
import IconError from '@/components/icons/IconError.vue';
import IconInfo from '@/components/icons/IconInfo.vue';
import IconWarning from '@/components/icons/IconWarning.vue';
import { computed, shallowRef } from 'vue';
import { storeToRefs } from 'pinia';
import { useDialogModalStore } from '@/stores/useDialogModal.js';
import Flex from '@/components/containments/Flex.vue';

const $store = useDialogModalStore();
const { content, context } = storeToRefs($store);

const $icons = shallowRef({
  warning: IconWarning,
  error: IconError,
  success: IconCheck,
  info: IconInfo,
});

const $icon = computed(() => $icons.value[content.value.context]);
</script>

<template>
  <div>
    <Transition name="backdrop">
      <div v-if="$store.shown" class="relative z-10" aria-labelledby="dialog-title" aria-modal="true" role="dialog">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" @click="$store.close()"></div>
      </div>
    </Transition>

    <Transition name="modal">
      <div
        v-if="$store.shown"
        class="fixed inset-0 z-10 flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
      >
        <div
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg"
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div
                :class="[context.bg]"
                class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full sm:mx-0 sm:size-10"
              >
                <component :is="$icon" :class="[context.text]" class="size-6" />
              </div>
              <Flex class="ml-4 w-full items-start justify-between gap-0 text-left">
                <Flex class="mt-0 w-full flex-col items-start gap-1">
                  <h3 id="dialog-title" :class="[context.text]" class="text-base font-semibold">{{ content.title }}</h3>
                  <p class="text-sm text-gray-500">
                    {{ content.text }}
                  </p>
                </Flex>
                <img
                  v-if="content.image"
                  :src="content.image"
                  :alt="content.title"
                  class="m-1 flex h-25 object-contain"
                />
              </Flex>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <ControlButton class="h-10" @click="$store.close()">
              {{ content.button }}
            </ControlButton>
          </div>
        </div>
      </div>
    </Transition>
  </div>
</template>

<style scoped>
/* Backdrop transition */
.backdrop-enter-active,
.backdrop-leave-active {
  transition: opacity 0.3s ease;
}
.backdrop-enter-from,
.backdrop-leave-to {
  opacity: 0;
}

/* Modal transition */
.modal-enter-active {
  transition: all 0.3s ease-out;
}
.modal-leave-active {
  transition: all 0.2s ease-in;
}
.modal-enter-from {
  opacity: 0;
  transform: translateY(1rem) scale(0.95);
}
.modal-enter-to {
  opacity: 1;
  transform: translateY(0) scale(1);
}
.modal-leave-from {
  opacity: 1;
  transform: translateY(0) scale(1);
}
.modal-leave-to {
  opacity: 0;
  transform: translateY(1rem) scale(0.95);
}

/* Responsive adjustments */
@media (min-width: 640px) {
  .modal-enter-from {
    transform: translateY(0) scale(0.95);
  }
  .modal-leave-to {
    transform: translateY(0) scale(0.95);
  }
}
</style>
