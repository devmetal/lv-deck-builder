import { useCallback, useEffect, useRef } from 'react';

export default function useOutsideClick<T extends HTMLElement>({
  onOutsideClick,
}: {
  onOutsideClick: () => void;
}) {
  const element = useRef<T | null>(null);

  const clickHandler = useCallback(
    (event: MouseEvent) => {
      const { current } = element;
      const { target } = event;

      if (!current || current === target) {
        return;
      }

      if (!current.contains(target as Node)) {
        onOutsideClick();
      }
    },
    [onOutsideClick],
  );

  useEffect(() => {
    document.addEventListener('click', clickHandler);

    return () => {
      document.removeEventListener('click', clickHandler);
    };
  }, [clickHandler]);

  return element;
}
