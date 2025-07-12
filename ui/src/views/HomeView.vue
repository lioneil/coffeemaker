<script setup>
import MainWindow from '@/components/containments/MainWindow.vue';
import DialogModal from '@/components/dialogs/DialogModal.vue';
import CoffeeMachine from '@/components/machines/CoffeeMachine.vue';
</script>

<template>
  <MainWindow>
    <DialogModal />
    <CoffeeMachine />
  </MainWindow>
</template>
