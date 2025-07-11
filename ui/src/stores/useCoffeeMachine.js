import { ref } from 'vue';
import { defineStore } from 'pinia';

export const useCoffeeMachineStore = defineStore('coffee.machine', () => {
  const coffees = ref([]);

  const defineCoffees = (items) => (coffees.value = items.map((item) => defineCoffee(item)));

  const defineCoffee = (coffee) => ({
    active: coffee.active ?? false,
    ...coffee,
  });

  const select = (target) => {
    coffees.value = coffees.value.map(coffee => ({
      ...coffee,
      active: coffee.id === target.id
    }));
  };

  return {
    coffees,
    defineCoffees,
    select,
  };
});
