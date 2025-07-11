<script setup>
import Flex from '@/components/containments/Flex.vue';
import IconGlassWater from '@/components/icons/IconGlassWater.vue';
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';

const $machine = useCoffeeMachine();
const { machine, loading } = $machine;
</script>

<template>
  <Flex class="items-center gap-1 text-sm text-gray-500">
    <span class="min-w-16 text-end">
      <span
        v-if="loading"
        class="inline-block h-3 w-3 animate-spin rounded-full border-1 border-black border-t-transparent"
      ></span>
      <span v-else class="font-bold text-gray-700">{{ machine.water_level_liters }}</span> /
      {{ machine.water_capacity_liters }} L
    </span>
    <IconGlassWater class="mb-1 size-4 text-gray-700" />
  </Flex>
</template>
