<script setup>
import Flex from '@/components/containments/Flex.vue';
</script>

<template>
  <Flex class="h-screen w-full flex-wrap justify-center overflow-y-auto bg-gray-100">
    <slot />
  </Flex>
</template>
