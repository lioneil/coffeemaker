<script setup>
import { onBeforeMount, shallowRef } from 'vue';
import { storeToRefs } from 'pinia';
import { useCoffeeMachineStore } from '@/stores/useCoffeeMachine.js';
import BrandLogo from '@/components/brand/BrandLogo.vue';
import CoffeeAmericano from '@/components/coffees/CoffeeAmericano.vue';
import CoffeeDoubleEspresso from '@/components/coffees/CoffeeDoubleEspresso.vue';
import CoffeeEspresso from '@/components/coffees/CoffeeEspresso.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import ControlInput from '@/components/controls/ControlInput.vue';
import Flex from '@/components/containments/Flex.vue';
import HorizontalRule from '@/components/typography/HorizontalRule.vue';
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';
import IconGlassWater from '@/components/icons/IconGlassWater.vue';
import IconHeartPulse from '@/components/icons/IconHeartPulse.vue';
import { useCoffeeApi } from '@/composables/coffee/useCoffeeApi';
import CoffeeCard from '@/components/coffees/CoffeeCard.vue';

const $machine = useCoffeeApi();

onBeforeMount(() => {
  $machine.list();
});

const $store = useCoffeeMachineStore();
const { coffees } = storeToRefs($store);

const $cards = shallowRef({
  espresso: CoffeeEspresso,
  double_espresso: CoffeeDoubleEspresso,
  americano: CoffeeAmericano,
  fallback: CoffeeCard,
});

$store.defineCoffees([
  { title: 'Espresso', price: '1.00', description: '', value: 'espresso' },
  { title: 'Double Espresso', price: '1.00', description: '', value: 'double_espresso' },
  { title: 'Americano', price: '1.00', description: '', value: 'americano' },
]);
</script>

<template>
  <Flex class="m-3 flex-col gap-5 rounded-4xl border-5 p-10">
    <BrandLogo class="mb-4" />

    <span class="text-center text-sm font-bold text-gray-400 uppercase">Please select your coffee</span>
    <Flex class="items-center justify-center">
      <template v-for="coffee in coffees" :key="coffee.value">
        <component
          :active="coffee.active"
          :is="$cards[coffee.value] ?? $cards.fallback"
          :price="coffee.price"
          @click="$store.select(coffee)"
        />
      </template>
    </Flex>

    <Flex class="mt-10 flex-col">
      <HorizontalRule class="mb-4">Maintenance</HorizontalRule>
      <Flex class="items-center justify-center">
        <Flex class="flex-1 items-start gap-0 rounded-lg bg-white">
          <ControlInput
            id="water_capacity"
            class="h-8 min-w-50 border-e-0"
            name="water_capacity"
            hide-label
            label="Water Capacity"
            placeholder="Add liters"
            type="number"
            min="0.0"
            step="0.5"
            max="2.0"
          />
          <ControlButton class="inline-flex h-8 rounded-s-none"
            ><IconGlassWater class="size-4" />Refill Water</ControlButton
          >
        </Flex>
        <Flex class="flex-1 gap-0 rounded-lg bg-white">
          <ControlInput
            id="coffee_capacity"
            class="h-8 min-w-50 border-e-0"
            name="coffee_capacity"
            hide-label
            label="Coffee Capacity"
            placeholder="Add grams"
            type="number"
            min="50"
            step="50"
            max="500"
          />
          <ControlButton class="inline-flex h-8 rounded-s-none"
            ><IconCoffeeBean class="size-4" />Add Coffee</ControlButton
          >
        </Flex>
      </Flex>
      <Flex class="items-center justify-end">
        <ControlButton class="h-8"><IconHeartPulse class="size-4" />Check Machine</ControlButton>
      </Flex>
    </Flex>
  </Flex>
</template>
