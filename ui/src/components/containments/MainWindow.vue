<script setup>
import Flex from '@/components/containments/Flex.vue';
</script>

<template>
  <Flex class="h-screen w-screen flex-wrap justify-center overflow-y-auto bg-gray-100 p-0">
    <slot />
  </Flex>
</template>
