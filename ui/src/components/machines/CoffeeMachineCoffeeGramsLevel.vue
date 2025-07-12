<script setup>
import Flex from '@/components/containments/Flex.vue';
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';

const $machine = useCoffeeMachine();
const { machine, loading } = $machine;
</script>

<template>
  <Flex class="items-center gap-1 text-sm text-gray-500">
    <span class="w-[90px] text-end">
      <span
        v-if="loading"
        class="inline-block h-3 w-3 animate-spin rounded-full border-1 border-black border-t-transparent"
      ></span>
      <span v-else class="font-bold text-gray-700">{{
        machine.coffee_level_grams?.toLocaleString({
          minimumFractionDigits: 0,
          maximumFractionDigits: 2,
        })
      }}</span>
      / {{ machine.coffee_capacity_grams }} g
    </span>
    <IconCoffeeBean class="size-3 text-gray-700" />
  </Flex>
</template>
