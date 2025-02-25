import { useEffect, useState } from 'react';

export default function TermInput({
  onTermChange,
  onSearch,
  current = '',
}: {
  onTermChange: (term: string) => void;
  onSearch: () => void;
  current: string;
}) {
  const [value, setValue] = useState(current);

  useEffect(() => {
    setValue(current);
  }, [current]);

  return (
    <input
      className="input w-full"
      placeholder="Keywords..."
      value={value}
      onChange={(e) => {
        const {
          currentTarget: { value },
        } = e;

        setValue(value);
        onTermChange(value);
      }}
      onKeyUp={(e) => {
        if (e.code === 'Enter' && current !== value) {
          onSearch();
        }
      }}
      type="text"
    />
  );
}
