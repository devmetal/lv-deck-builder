import { useCallback, useState } from 'react';
import ColorCheckbox from './ColorCheckbox';

type Color = {
  label: string;
  value: string;
};

const colors: Color[] = [
  { label: 'Red', value: 'R' },
  { label: 'Blue', value: 'U' },
  { label: 'Green', value: 'G' },
  { label: 'White', value: 'W' },
  { label: 'Black', value: 'B' },
  { label: 'Colorless', value: 'C' },
];

export default function ColorSelector({
  onColorsChange,
}: {
  onColorsChange: (colors: string) => void;
  current: string;
}) {
  const [checked, setChecked] = useState<string[]>([]);

  const onChange = useCallback(
    (color: string, isChecked: boolean) => {
      let nextState: string[];
      if (!isChecked) {
        nextState = checked.filter((c) => c !== color);
      } else {
        nextState = [...checked, color];
      }
      setChecked(nextState);
      onColorsChange(nextState.join(','));
    },
    [checked, onColorsChange],
  );

  return (
    <div className="flex flex-row gap-4 items-center flex-wrap">
      {colors.map((color) => (
        <ColorCheckbox
          checked={checked.includes(color.value)}
          label={color.label}
          value={color.value}
          onChange={onChange}
          key={color.value}
        />
      ))}
    </div>
  );
}
