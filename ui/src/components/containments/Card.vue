<script setup>
import { useMergeClasses } from '@/composables/utils/useMergeClasses';
</script>

<template>
  <div
    :class="
      useMergeClasses(
        [
          'transition-shadow duration-200 ease-in-out',
          'rounded-lg border border-gray-300 bg-white shadow-sm',
          'p-5',
          'hover:bg-gray-100 hover:shadow-lg',
          'focus:bg-gray-200 active:bg-gray-300 active:shadow',
        ],
        $attrs.class,
      )
    "
  >
    <slot />
  </div>
</template>
