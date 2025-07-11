import { ref } from 'vue';

export const useForm = (initial = {}) => {
  const data = ref(initial);
  const reset = () => (data.value = initial);

  const form = {
    data,
    reset,
  };

  return new Proxy(form, {
    get(target, prop) {
      if (prop in target) {
        return target[prop];
      }

      return data.value[prop];
    },

    set(target, prop, value) {
      if (prop in target) {
        target[prop] = value;
        return true;
      }

      data.value[prop] = value;
      return true;
    },
  });
};
