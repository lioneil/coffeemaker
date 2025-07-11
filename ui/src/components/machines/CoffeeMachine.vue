<script setup>
import BrandLogo from '@/components/brand/BrandLogo.vue';
import CoffeeAmericano from '@/components/coffees/CoffeeAmericano.vue';
import CoffeeCard from '@/components/coffees/CoffeeCard.vue';
import CoffeeDoubleEspresso from '@/components/coffees/CoffeeDoubleEspresso.vue';
import CoffeeEspresso from '@/components/coffees/CoffeeEspresso.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import ControlInput from '@/components/controls/ControlInput.vue';
import Flex from '@/components/containments/Flex.vue';
import HorizontalRule from '@/components/typography/HorizontalRule.vue';
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';
import IconHeartPulse from '@/components/icons/IconHeartPulse.vue';
import { onBeforeMount, shallowRef } from 'vue';
import { storeToRefs } from 'pinia';
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';
import IconBucketFill from '@/components/icons/IconBucketFill.vue';
import CoffeeMachineWaterLevel from '@/components/machines/CoffeeMachineWaterLevel.vue';
import CoffeeMachineCoffeeGramsLevel from '@/components/machines/CoffeeMachineCoffeeGramsLevel.vue';
import CoffeeMachineLoadingIndicator from '@/components/machines/CoffeeMachineLoadingIndicator.vue';
import DialogModal from '@/components/dialogs/DialogModal.vue';

const $machine = useCoffeeMachine();
const { coffees } = storeToRefs($machine);

const $cards = shallowRef({
  espresso: CoffeeEspresso,
  double_espresso: CoffeeDoubleEspresso,
  americano: CoffeeAmericano,
  fallback: CoffeeCard,
});

onBeforeMount(() => {
  $machine.healthcheck();
  $machine.list();
});
</script>

<template>
  <Flex class="m-3 flex-col gap-5 rounded-4xl border-5 p-10">
    <DialogModal />
    <BrandLogo class="mb-4" />

    <span class="text-center text-sm font-bold text-gray-400 uppercase">Please select your coffee</span>
    <Flex class="items-center justify-center">
      <template v-for="coffee in coffees" :key="coffee.value">
        <CoffeeMachineLoadingIndicator :loading="coffee.loading">
          <component
            :active="coffee.active"
            :is="$cards[coffee.value] ?? $cards.fallback"
            :title="coffee.name"
            :price="coffee.price"
            :src="coffee.image"
            :water="coffee.water_ml"
            :coffee="coffee.coffee_grams"
            @click="$machine.make(coffee)"
          />
        </CoffeeMachineLoadingIndicator>
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
            placeholder="Add milliliters"
            type="number"
            min="0.0"
            step="0.5"
            max="2.0"
          />
          <ControlButton class="inline-flex h-8 rounded-s-none" @click="$machine.fillWater()">
            <IconBucketFill class="size-4" />
            Refill Water
          </ControlButton>
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
          <ControlButton class="inline-flex h-8 rounded-s-none" @click="$machine.topUpCoffee()">
            <IconCoffeeBean class="size-3" />
            Add Coffee
          </ControlButton>
        </Flex>
      </Flex>
      <Flex class="items-center justify-end">
        <!--<CoffeeMachineSerialCode class="mt-1" />-->
        <CoffeeMachineWaterLevel />
        <CoffeeMachineCoffeeGramsLevel />
        <ControlButton class="h-8" @click="$machine.healthcheck()">
          <IconHeartPulse class="size-4" />
          Check Machine
        </ControlButton>
      </Flex>
    </Flex>
  </Flex>
</template>
