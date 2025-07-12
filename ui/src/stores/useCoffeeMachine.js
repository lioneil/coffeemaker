import { ref } from 'vue';
import { defineStore } from 'pinia';
import { useLoadingState } from '@/composables/states/useLoadingState.js';

export const useCoffeeMachineStore = defineStore('coffee.machine', () => {
  const $loading = useLoadingState();
  const { loading } = $loading;

  const machine = ref({});
  const coffees = ref([]);

  const defineCoffees = (items) => (coffees.value = items.map((item, i) => defineCoffee(item, i)));

  const defineCoffee = (coffee, i) => ({
    loading: coffee.loading ?? false,
    active: coffee.active ?? false,
    id: i,
    disabled: false,
    price: false,
    ...coffee,
  });

  const defineMachine = (item) => (machine.value = item);

  const select = (target) => {
    coffees.value = coffees.value.map((coffee) => ({
      ...coffee,
      loading: false, //coffee.id === target.id,
      active: coffee.id === target.id,
    }));
  };

  const unselect = (target) => {
    coffees.value = coffees.value.map((coffee) => ({
      ...coffee,
      loading: coffee.id === target.id ? false : coffee.loading,
      active: coffee.id === target.id ? false : coffee.active,
    }));
  };

  const startLoading = () => $loading.start();
  const stopLoading = () => $loading.stop();

  return {
    loading,
    machine,
    coffees,
    defineCoffees,
    defineMachine,
    select,
    unselect,
    startLoading,
    stopLoading,
  };
});
