<script setup>
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';

defineProps({
  loading: Boolean,
});
</script>

<template>
  <div class="relative h-full w-full cursor-not-allowed">
    <IconCoffeeBean
      v-if="loading"
      class="absolute top-1/2 left-1/2 z-10 size-10 -translate-x-1/2 -translate-y-1/2 text-center text-white"
    />
    <div
      v-if="loading"
      class="absolute top-1/2 left-1/2 h-40 w-36 -translate-x-1/2 -translate-y-1/2 animate-spin items-center rounded-full bg-black/80"
    />
    <slot />
  </div>
</template>
