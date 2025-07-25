import { useApi } from '@/composables/api/useApi';
import { useCoffeeMachineStore } from '@/stores/useCoffeeMachine';
import { storeToRefs } from 'pinia';
import { useDialogModalStore } from '@/stores/useDialogModal.js';
import { computed } from 'vue';

export const useCoffeeMachine = () => {
  const $modal = useDialogModalStore();

  const $store = useCoffeeMachineStore();
  const { loading, coffees, machine } = storeToRefs($store);
  const { $api } = useApi();

  const selected = computed(() => coffees.value.find((coffee) => coffee.active));

  const list = async () => {
    const { data } = await $api.get('/v1/coffees');
    $store.defineCoffees(data);
  };

  const select = (target) => {
    $store.select(target);
  };

  const make = async (selected) => {
    if (!selected.value) {
      $modal.open({
        title: 'Forgot something?',
        text: 'Please select a coffee to brew.',
        context: 'warning',
      });
      return;
    }

    $store.startLoading();
    const coffee = selected.value;

    // Simulate brew time
    setTimeout(async () => {
      const { data: machine } = await $api
        .post(`/v1/coffees/${coffee.id}/brew`)
        .catch(({ response }) => {
          $modal.open({
            title: 'Oops!',
            text: response.data.message,
            context: 'error',
          });
        })
        .finally(() => {
          $store.unselect(coffee);
          $store.stopLoading();
        });

      $modal.open({
        title: 'Now serving',
        text: `Thank you for waiting. Here's your fresh ${coffee.name}!`,
        image: coffee.image,
        context: 'success',
        button: 'Okay',
      });

      $store.defineMachine(machine);
    }, 1100);
  };

  const refillWater = async (amount) => {
    await refill('water', amount);
  };

  const refillCoffee = async (amount) => {
    await refill('coffee', amount);
  };

  const refill = async (type, amount = 0) => {
    if (!amount?.length) {
      $modal.open({
        title: 'Oops!',
        text: `Please enter a valid ${type} amount.`,
        context: 'warning',
      });
      return;
    }

    $store.startLoading();

    const { data: machine } = await $api
      .post('/v1/machine/refill', { [type]: amount })
      .catch(({ response }) => {
        $modal.open({
          title: 'Refill failed!',
          text: response.data.message,
          context: 'error',
        });
      })
      .finally(() => {
        setTimeout(() => {
          $store.stopLoading();
        }, 800);
      });

    $modal.open({
      title: 'Refill successful!',
      text: `The ${type} has been refilled.`,
      context: 'success',
    });

    $store.defineMachine(machine);
  };

  const healthcheck = async (assertive = false) => {
    $store.startLoading();

    const { data: machine } = await $api.get('/v1/machine/healthcheck');

    if (assertive) {
      const water = Number(machine.water_level_liters).toLocaleString('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
      });

      const coffee = Number(machine.coffee_level_grams).toLocaleString('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
      });

      const waterCapacity = Number(machine.water_capacity_liters).toLocaleString('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
      });

      const coffeeCapacity = Number(machine.coffee_capacity_grams).toLocaleString('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
      });

      $modal.open({
        title: 'Machine Status',
        text: `The machine has ${water}L of water and ${coffee}g of coffee left, with capacities of ${waterCapacity}L water and ${coffeeCapacity}g coffee.`,
        context: 'info',
      });
    }

    $store.defineMachine(machine);

    setTimeout(() => {
      $store.stopLoading();
    }, 800);
  };

  return {
    loading,
    list,
    select,
    selected,
    make,
    healthcheck,
    coffees,
    machine,
    refillWater,
    refillCoffee,
  };
};
