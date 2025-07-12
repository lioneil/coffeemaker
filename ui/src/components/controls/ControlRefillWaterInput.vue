<script setup>
import Flex from '@/components/containments/Flex.vue';
import ControlInput from '@/components/controls/ControlInput.vue';
import ControlButton from '@/components/controls/ControlButton.vue';
import IconBucketFill from '@/components/icons/IconBucketFill.vue';

const $emit = defineEmits(['click']);
const $model = defineModel();
</script>

<script>
export default {
  inheritAttrs: false,
};
</script>

<template>
  <Flex class="items-start gap-0 rounded-lg bg-white">
    <ControlInput
      id="water_capacity"
      v-model="$model"
      v-bind="$attrs"
      class="h-8 min-w-0 flex-1 border-e-0"
      name="water_capacity"
      hide-label
      label="Water Capacity"
      placeholder="Add milliliters"
      type="number"
      min="0.0"
      step="100"
      max="2000.0"
    />
    <span
      class="flex h-8 w-8 items-center justify-center border border-e-0 border-gray-200 px-1 text-sm font-bold text-gray-500"
      >ml</span
    >
    <ControlButton class="inline-flex h-8 rounded-s-none" @click="$emit('click')">
      <IconBucketFill class="size-4" />
      Refill Water
    </ControlButton>
  </Flex>
</template>
