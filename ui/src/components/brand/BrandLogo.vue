<script setup>
import Flex from '@/components/containments/Flex.vue';
import TextCurve from '@/components/typography/TextCurve.vue';
import Brandmark from '@/components/brand/Brandmark.vue';
import { useMergeClasses } from '@/composables/utils/useMergeClasses.js';
</script>

<template>
  <div>
    <Flex
      :class="
        useMergeClasses(
          'relative mx-auto h-[145px] w-[185px] flex-col items-center border-b-4 py-1 text-black',
          $attrs.class,
        )
      "
    >
      <Brandmark class="absolute top-10" />
      <TextCurve class="font-sans text-4xl font-extrabold">KOFFEEMAKER 9000</TextCurve>
    </Flex>
  </div>
</template>
