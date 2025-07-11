<script setup>
import { useMergeClasses } from '@/composables/utils/useMergeClasses';
import Flex from '@/components/containments/Flex.vue';
</script>

<template>
  <Flex :class="useMergeClasses('items-center gap-1 text-gray-200', $attrs.class)">
    <hr class="flex-1" />
    <span v-if="$slots.default" class="px-3 text-sm font-bold text-gray-300 uppercase"><slot /></span>
    <hr class="flex-1" />
  </Flex>
</template>
