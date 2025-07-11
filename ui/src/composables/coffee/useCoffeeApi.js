import { useApi } from '@/composables/api/useApi';
import { useCoffeeMachineStore } from '@/stores/useCoffeeMachine';

export const useCoffeeApi = () => {
  const $store = useCoffeeMachineStore();

  const { $api } = useApi();

  const list = async () => {
    const { data } = await $api.get('/v1/coffee');
    console.log(11, data);
  }

  return {
    list,
  }
}
