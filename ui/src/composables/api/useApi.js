import axios from 'axios';

export const useApi = () => {
  const $api = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL || 'http://localhost/api',
    timeout: 10000,
    headers: {
      'Content-Type': 'application/json',
    },
  });

  return { $api };
};
