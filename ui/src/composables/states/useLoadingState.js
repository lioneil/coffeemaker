import { ref } from 'vue';

export const useLoadingState = () => {
  const loading = ref(false);

  const start = () => (loading.value = true);
  const stop = () => (loading.value = false);

  return {
    loading,
    start,
    stop,
  };
};
