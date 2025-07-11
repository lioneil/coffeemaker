<script setup>
import CoffeeCard from '@/components/coffees/CoffeeCard.vue';
import img from '@/assets/images/espresso.png';
import Flex from '@/components/containments/Flex.vue';
</script>

<template>
  <CoffeeCard :src="img" title="Double Espresso">
    <template #image>
      <Flex class="gap-0">
        <img :src="img" class="block h-30 w-28 object-contain" alt="Double Espresso" />
        <img :src="img" class="block h-30 w-28 object-contain" alt="Double Espresso" />
      </Flex>
    </template>
  </CoffeeCard>
</template>
