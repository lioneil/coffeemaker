<script setup>
import Card from '@/components/containments/Card.vue';
import { useMergeClasses } from '@/composables/utils/useMergeClasses.js';
import Flex from '@/components/containments/Flex.vue';
import IconGlassWater from '@/components/icons/IconGlassWater.vue';
import IconCoffeeBean from '@/components/icons/IconCoffeeBean.vue';

defineProps({
  src: [String, Object],
  title: String,
  active: Boolean,
  price: [String, Number],
  water: String,
  coffee: String,
});
</script>

<template>
  <Card
    :class="
      useMergeClasses(
        [
          'flex h-auto w-56 cursor-pointer flex-col items-center gap-1 p-3',
          active && 'box-border bg-stone-100 outline-4 hover:bg-stone-200 focus:bg-stone-200 active:bg-stone-300',
        ],
        $attrs.class,
      )
    "
    tabindex="0"
    role="button"
  >
    <slot name="image">
      <img :src="src" :alt="title" class="block size-[100px] object-contain" />
    </slot>
    <Flex class="flex-1 items-end justify-center gap-0">
      <Flex class="flex-col gap-0">
        <slot name="title">
          <h1 class="w-full text-sm font-bold">{{ title }}</h1>
        </slot>
        <p v-if="price" class="text-center text-lg font-bold text-stone-500">${{ price }}</p>
      </Flex>
    </Flex>
    <Flex class="items-center gap-1">
      <Flex v-if="water" class="items-center gap-0.5 text-center text-xs text-stone-500">
        {{
          parseFloat(water)?.toLocaleString({
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
          })
        }}ml <IconGlassWater class="size-[10px] text-gray-600" />
      </Flex>
      <Flex v-if="coffee" class="items-center gap-0.5 text-center text-xs text-stone-500">
        {{
          parseFloat(coffee)?.toLocaleString({
            minimumFractionDigits: 0,
            maximumFractionDigits: 2,
          })
        }}g <IconCoffeeBean class="size-[8px] text-gray-500" />
      </Flex>
    </Flex>
  </Card>
</template>
