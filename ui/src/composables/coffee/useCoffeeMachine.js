import { useApi } from '@/composables/api/useApi';
import { useCoffeeMachineStore } from '@/stores/useCoffeeMachine';
import { storeToRefs } from 'pinia';
import { useDialogModalStore } from '@/stores/useDialogModal.js';

export const useCoffeeMachine = () => {
  const $modal = useDialogModalStore();

  const $store = useCoffeeMachineStore();
  const { loading, coffees, machine } = storeToRefs($store);
  const { $api } = useApi();

  const list = async () => {
    const { data } = await $api.get('/v1/coffees');
    $store.defineCoffees(data);
  };

  const make = async (coffee) => {
    $store.startLoading();
    $store.select(coffee);

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
          console.log('error', response.data);
        })
        .finally(() => {
          $store.unselect(coffee);
          $store.stopLoading();
        });

      $store.defineMachine(machine);
    }, 200);
  };

  const healthcheck = async () => {
    $store.startLoading();
    const { data: machine } = await $api.get('/v1/machine/healthcheck');
    $store.defineMachine(machine);
    $store.stopLoading();
  };

  return {
    loading,
    list,
    make,
    healthcheck,
    coffees,
    machine,
  };
};
