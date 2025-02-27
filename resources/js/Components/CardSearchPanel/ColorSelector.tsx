import { useCallback } from 'react';
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
  value,
}: {
  onColorsChange: (colors: string[]) => void;
  value: string[];
}) {
  const onChange = useCallback(
    (color: string, isChecked: boolean) => {
      let nextState: string[];
      if (!isChecked) {
        nextState = value.filter((c) => c !== color);
      } else {
        if (color === 'C') {
          nextState = ['C'];
        } else {
          nextState = [...value, color].filter((c) => c !== 'C');
        }
      }
      onColorsChange(nextState);
    },
    [onColorsChange, value],
  );

  return (
    <div className="flex flex-row gap-4 items-center flex-wrap">
      {colors.map((color) => (
        <ColorCheckbox
          checked={value.includes(color.value)}
          label={color.label}
          value={color.value}
          onChange={onChange}
          key={color.value}
        />
      ))}
    </div>
  );
}
