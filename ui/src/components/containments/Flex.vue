<script setup>
import { useMergeClasses } from '@/composables/utils/useMergeClasses';
</script>

<template>
  <div :class="useMergeClasses('flex flex-nowrap gap-3', $attrs.class)">
    <slot />
  </div>
</template>
