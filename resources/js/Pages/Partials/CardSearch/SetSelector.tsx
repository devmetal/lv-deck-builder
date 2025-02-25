import { useEffect, useState } from 'react';

type Props = {
  onSelect: (code: string) => void;
  onSearch: () => void;
  current: string;
  sets: App.Domain.Dto.FeSet[];
};

export default function SetSelector({
  onSelect,
  onSearch,
  sets,
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
      <option value="">Set</option>
      {sets.map((set) => (
        <option key={set.id} value={set.id}>
          {set.name}
        </option>
      ))}
    </select>
  );
}
