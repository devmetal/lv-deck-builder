import { useEffect, useState } from 'react';

export default function RaritySelector({
  onRarityChange,
  onSearch,
  current = '',
}: {
  onRarityChange: (rarity: string) => void;
  onSearch: () => void;
  current: string;
}) {
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
        onRarityChange(value);
      }}
      onKeyUp={(e) => {
        if (e.key === 'Enter') {
          onSearch();
        }
      }}
    >
      <option>Rarity</option>
      <option>common</option>
      <option>uncommon</option>
      <option>rare</option>
      <option>mythic</option>
      <option>special</option>
      <option>bonus</option>
    </select>
  );
}
