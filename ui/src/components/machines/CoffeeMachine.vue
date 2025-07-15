<script setup>
import Kiosk from '@/components/containments/Kiosk.vue';
import BrandLogo from '@/components/brand/BrandLogo.vue';
import { useCoffeeMachine } from '@/composables/coffee/useCoffeeMachine.js';
import { storeToRefs } from 'pinia';
import { useForm } from '@/composables/data/useForm.js';
import { onBeforeMount } from 'vue';
import CoffeeMachineEmptyState from '@/components/machines/CoffeeMachineEmptyState.vue';
import HorizontalRule from '@/components/typography/HorizontalRule.vue';
import Flex from '@/components/containments/Flex.vue';
import CoffeeMachineLoadingIndicator from '@/components/machines/CoffeeMachineLoadingIndicator.vue';
import CoffeeMachineCoffeeCard from '@/components/machines/CoffeeMachineCoffeeCard.vue';
import ControlRefillWaterInput from '@/components/controls/ControlRefillWaterInput.vue';
import ControlRefillCoffeeInput from '@/components/controls/ControlRefillCoffeeInput.vue';
import CoffeeMachineWaterLevel from '@/components/machines/CoffeeMachineWaterLevel.vue';
import CoffeeMachineCoffeeGramsLevel from '@/components/machines/CoffeeMachineCoffeeGramsLevel.vue';
import CoffeeMachineSerialCode from '@/components/machines/CoffeeMachineSerialCode.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import IconHeartPulse from '@/components/icons/IconHeartPulse.vue';

const $machine = useCoffeeMachine();
const { coffees, loading, selected } = storeToRefs($machine);

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
  <Kiosk border>
    <BrandLogo class="mb-1" />

    <template v-if="coffees.length">
      <span class="text-center text-sm font-bold text-gray-400 uppercase">Please select your coffee</span>
      <Flex
        class="overflow-x-unset w-full flex-wrap items-center justify-center gap-3 overflow-y-auto p-2 py-4 md:justify-start md:gap-5"
      >
        <template v-for="coffee in coffees" :key="coffee.value">
          <CoffeeMachineLoadingIndicator
            :loading="coffee.active && loading"
            class="h-auto w-[240px] max-w-[240px] min-w-[240px] flex-1 sm:w-auto"
          >
            <CoffeeMachineCoffeeCard
              :active="coffee.active"
              :disabled="coffee.disabled"
              :title="coffee.name"
              :price="coffee.price"
              :src="coffee.image"
              :water="coffee.water_ml"
              :coffee="coffee.coffee_grams"
              class="w-[240px] max-w-[240px] min-w-[240px] flex-1 place-self-center sm:w-auto md:place-self-auto"
              @click="$machine.select(coffee)"
            />
          </CoffeeMachineLoadingIndicator>
        </template>
      </Flex>
    </template>

    <CoffeeMachineEmptyState v-else />

    <div class="flex-1" />

    <Flex class="my-2 shrink-0 items-center justify-center">
      <ControlButton
        :disabled="selected.value === undefined || loading"
        class="h-[60px] px-8 text-xl font-black uppercase"
        primary
        @click="$machine.make(selected)"
      >
        Brew
      </ControlButton>
    </Flex>
    <HorizontalRule class="mb-4 shrink-0">Maintenance</HorizontalRule>
    <Flex class="flex-col gap-1">
      <Flex class="flex-col items-stretch justify-end gap-4 lg:flex-row lg:items-center lg:gap-2">
        <ControlRefillWaterInput v-model="$form.water" class="min-w-40" @click="$machine.refillWater($form.water)" />
        <ControlRefillCoffeeInput v-model="$form.coffee" @click="$machine.refillCoffee($form.coffee)" />
      </Flex>
      <Flex class="mt-4 flex-col items-center justify-between gap-1 sm:flex-row">
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
  </Kiosk>
</template>
