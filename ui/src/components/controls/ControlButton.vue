<script setup>
import { useMergeClasses } from '@/composables/utils/useMergeClasses';

defineProps({
  primary: Boolean,
});
</script>

<template>
  <button
    v-bind="$attrs"
    :class="
      useMergeClasses(
        [
          'inline-flex cursor-pointer items-center gap-x-2',
          'rounded-lg border border-gray-200 bg-white px-4 py-3',
          'text-sm font-medium text-gray-800 shadow-2xs',
          'hover:bg-gray-50 hover:shadow-lg',
          'focus:bg-gray-50 focus:outline-hidden',
          'disabled:pointer-events-none disabled:opacity-50',
          'active:bg-gray-100 active:shadow',
          primary && 'border-gray-700 bg-black',
          primary && 'text-white',
          primary && 'hover:bg-gray-800',
          primary && 'focus:bg-gray-800',
          primary && 'active:bg-gray-900',
        ],
        $attrs.class,
      )
    "
    role="button"
  >
    <slot />
  </button>
</template>
