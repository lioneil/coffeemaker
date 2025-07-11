<script setup>
defineProps({
  hideLabel: Boolean,
});
</script>

<script>
export default {
  inheritAttrs: false,
};
</script>

<template>
  <div class="relative flex-1">
    <label :for="$attrs.name" :class="[hideLabel && 'sr-only', 'text-sm font-semibold']">{{ $attrs.label }}</label>
    <input
      v-bind="$attrs"
      :name="$attrs.name"
      :class="[$slots.prepend && 'ps-11']"
      class="peer block w-full rounded-s-md border border-gray-200 px-4 py-2.5 focus:z-10 focus:border-blue-500 focus:ring-blue-500 sm:py-3 sm:text-sm"
    />
    <div
      v-if="$slots.prepend"
      class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4 peer-disabled:pointer-events-none peer-disabled:opacity-50"
    >
      <slot name="prepend" />
    </div>
  </div>
</template>
