<script setup>
import Card from '@/components/containments/Card.vue';
import { useMergeClasses } from '@/composables/utils/useMergeClasses.js';
import Flex from '@/components/containments/Flex.vue';

defineProps({
  src: [String, Object],
  title: String,
  active: Boolean,
  price: [String, Number],
});
</script>

<template>
  <Card
    :class="
      useMergeClasses(
        [
          'flex h-60 w-56 cursor-pointer flex-col items-center gap-3',
          active && 'box-border bg-stone-100 outline-4 hover:bg-stone-200 focus:bg-stone-200 active:bg-stone-300',
        ],
        $attrs.class,
      )
    "
    tabindex="0"
    role="button"
  >
    <slot name="image">
      <img :src="src" :alt="title" class="block size-30 object-contain" />
    </slot>
    <Flex class="flex-1 items-end justify-center gap-0">
      <Flex class="flex-col gap-0">
        <slot name="title">
          <h1 class="w-full font-bold">
            {{ title }}
          </h1>
        </slot>
        <p v-if="price" class="text-center text-xs font-bold text-stone-500">${{ price }}</p>
      </Flex>
    </Flex>
  </Card>
</template>
