import { defineStore } from 'pinia';
import { computed, ref } from 'vue';

export const useDialogModalStore = defineStore('dialog.modal', () => {
  const shown = ref(false);
  const DEFAULT_CONTENT = {
    title: 'Error',
    text: 'An error has occurred.',
    button: 'Close',
    context: 'info',
  };

  const content = ref(DEFAULT_CONTENT);

  const context = computed(() => {
    switch (content.value.context) {
      case 'warning':
        return { bg: 'bg-yellow-500/20', text: 'text-yellow-500' };
      case 'error':
        return { bg: 'bg-red-500/20', text: 'text-red-500' };
      case 'success':
        return { bg: 'bg-green-500/20', text: 'text-green-500' };
      case 'info':
      default:
        return { bg: 'bg-blue-500/20', text: 'text-blue-500' };
    }
  });

  const open = (options = {}) => {
    shown.value = true;
    content.value = Object.assign(content.value, options);
  };

  const close = () => {
    shown.value = false;
    content.value = DEFAULT_CONTENT;
  };

  return {
    shown,
    content,
    context,
    open,
    close,
  };
});
