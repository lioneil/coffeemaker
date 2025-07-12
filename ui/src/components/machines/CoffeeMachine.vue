<script setup>
import BrandLogo from '@/components/brand/BrandLogo.vue';
import CoffeeMachineCoffeeCard from '@/components/machines/CoffeeMachineCoffeeCard.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import Flex from '@/components/containments/Flex.vue';
import HorizontalRule from '@/components/typography/HorizontalRule.vue';
import IconHeartPulse from '@/components/icons/IconHeartPulse.vue';
import { onBeforeMount } from 'vue';
import { storeToRefs } from 'pinia';
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';
import CoffeeMachineWaterLevel from '@/components/machines/CoffeeMachineWaterLevel.vue';
import CoffeeMachineCoffeeGramsLevel from '@/components/machines/CoffeeMachineCoffeeGramsLevel.vue';
import CoffeeMachineLoadingIndicator from '@/components/machines/CoffeeMachineLoadingIndicator.vue';
import CoffeeMachineEmptyState from '@/components/machines/CoffeeMachineEmptyState.vue';
import { useForm } from '@/composables/data/useForm.js';
import ControlRefillWaterInput from '@/components/controls/ControlRefillWaterInput.vue';
import ControlRefillCoffeeInput from '@/components/controls/ControlRefillCoffeeInput.vue';

const $machine = useCoffeeMachine();
const { coffees } = storeToRefs($machine);

const $form = useForm({
  water: '',
  coffee: '',
});

onBeforeMount(() => {
  $machine.healthcheck();
  $machine.list();
});
</script>

<template>
  <Flex class="m-3 max-w-6xl flex-col gap-5 rounded-4xl border-5 p-8 md:p-10">
    <BrandLogo class="mb-4" />

    <template v-if="coffees.length">
      <span class="text-center text-sm font-bold text-gray-400 uppercase">Please select your coffee</span>
      <Flex class="w-full flex-wrap items-center justify-center gap-3 md:gap-5">
        <template v-for="coffee in coffees" :key="coffee.value">
          <CoffeeMachineLoadingIndicator
            :loading="coffee.loading"
            class="h-auto w-full min-w-[240px] flex-shrink-0 sm:w-auto"
          >
            <CoffeeMachineCoffeeCard
              :active="coffee.active"
              :title="coffee.name"
              :price="coffee.price"
              :src="coffee.image"
              :water="coffee.water_ml"
              :coffee="coffee.coffee_grams"
              class="w-full flex-shrink-0 sm:w-auto"
              @click="$machine.make(coffee)"
            />
          </CoffeeMachineLoadingIndicator>
        </template>
      </Flex>

      <Flex class="mt-6 flex-col md:mt-10">
        <HorizontalRule class="mb-4">Maintenance</HorizontalRule>
        <Flex class="flex-col items-stretch justify-end gap-4 lg:flex-row lg:items-center lg:gap-2">
          <ControlRefillWaterInput v-model="$form.water" class="min-w-40" @click="$machine.refillWater($form.water)" />
          <ControlRefillCoffeeInput v-model="$form.coffee" @click="$machine.refillCoffee($form.coffee)" />
        </Flex>
        <Flex class="mt-4 flex-col items-center justify-between gap-3 sm:flex-row">
          <Flex class="flex-wrap items-center gap-2 sm:gap-4">
            <!--<CoffeeMachineSerialCode class="mt-1" />-->
            <CoffeeMachineWaterLevel />
            <CoffeeMachineCoffeeGramsLevel />
          </Flex>
          <ControlButton class="h-8 text-xs sm:text-sm" @click="$machine.healthcheck(true)">
            <IconHeartPulse class="size-4" />
            Check Machine
          </ControlButton>
        </Flex>
      </Flex>
    </template>

    <CoffeeMachineEmptyState v-else />
  </Flex>
</template>
