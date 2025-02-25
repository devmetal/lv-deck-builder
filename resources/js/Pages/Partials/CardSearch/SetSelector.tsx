import { useEffect, useState } from 'react';

type Props = {
  onSelect: (code: string) => void;
  onSearch: () => void;
  current: string;
};

export default function SetSelector({
  onSelect,
  onSearch,
  current = '',
}: Props) {
  const [value, setValue] = useState(current);

  useEffect(() => {
    setValue(current);
  }, [current]);

  return (
    <select
      className="select"
      value={value}
      onChange={(e) => {
        const {
          currentTarget: { value },
        } = e;
        setValue(value);
        onSelect(value);
      }}
      onKeyDown={(e) => {
        if (e.key === 'Enter') {
          onSearch();
        }
      }}
    >
      <option>Set</option>
    </select>
  );
}
