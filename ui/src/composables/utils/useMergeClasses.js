import { clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export const useMergeClasses = (...inputs) => {
    return twMerge(clsx(inputs));
};
