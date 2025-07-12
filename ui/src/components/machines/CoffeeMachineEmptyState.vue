<script setup>
import Flex from '@/components/containments/Flex.vue';
import IconWarning from '@/components/icons/IconWarning.vue';
</script>

<template>
  <Flex class="flex-col items-center justify-center">
    <IconWarning class="size-10" />
    <h1 class="text-bold text-2xl">No coffee available!</h1>
    <p>Please run the migration seeders:</p>
    <code class="rounded-xl border-amber-200 bg-amber-50 px-6 py-5 text-amber-900">
      vendor/bin/sail artisan db:seed
    </code>
  </Flex>
</template>
