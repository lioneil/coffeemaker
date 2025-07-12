<script setup>
import Flex from '@/components/containments/Flex.vue';
import ControlInput from '@/components/controls/ControlInput.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';

const $emit = defineEmits(['click']);
const $model = defineModel();
</script>

<script>
export default {
  inheritAttrs: false,
};
</script>

<template>
  <Flex class="gap-0 rounded-lg bg-white">
    <ControlInput
      id="coffee_capacity"
      v-model="$model"
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
    <span
      class="flex h-8 w-8 items-center justify-center border border-e-0 border-gray-200 px-1 text-sm font-bold text-gray-500"
      >g</span
    >
    <ControlButton class="inline-flex h-8 rounded-s-none" @click="$emit('click')">
      <IconCoffeeBean class="size-3" />
      Add Coffee
    </ControlButton>
  </Flex>
</template>
