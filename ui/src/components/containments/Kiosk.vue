<script setup>
import Flex from '@/components/containments/Flex.vue';
import { useMergeClasses } from '@/composables/utils/useMergeClasses.js';

defineProps({
  border: Boolean,
});
</script>

<template>
  <Flex
    :class="useMergeClasses(['h-full w-screen flex-1 flex-col items-center overflow-hidden p-4 md:p-5'], $attrs.class)"
  >
    <Flex :class="[border && 'border-5']" class="max-w-4xl flex-1 flex-col overflow-hidden rounded-4xl px-8 pt-6 pb-8">
      <slot />
    </Flex>
  </Flex>
</template>
