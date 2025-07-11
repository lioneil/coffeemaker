export const useToFloat = (value) => {
  if (Number.isInteger(value)) {
    return value.toString();
  }

  const rounded = Math.round(value * 100) / 100;

  return rounded.toFixed(2).replace(/\.?0+$/, '');
};
