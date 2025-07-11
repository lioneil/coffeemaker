<script setup>
import CoffeeCard from '@/components/coffees/CoffeeCard.vue';
import img from '@/assets/images/americano.png';
</script>

<template>
  <CoffeeCard :src="img" title="Americano">
    <template #image>
      <img :src="img" class="block h-30 w-40 object-contain" alt="Americano" />
    </template>
  </CoffeeCard>
</template>
