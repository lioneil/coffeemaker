<script setup>
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';
import { storeToRefs } from 'pinia';

const $machine = useCoffeeMachine();
const { machine } = storeToRefs($machine);
</script>

<template>
  <span class="text-sm text-gray-500">{{ machine.name }}</span>
</template>
