export default function RaritySelector({
  onRarityChange,
  value = '',
}: {
  onRarityChange: (rarity: string) => void;
  value: string;
}) {
  return (
    <select
      className="select"
      value={value}
      onChange={(e) => {
        const {
          currentTarget: { value },
        } = e;
        onRarityChange(value);
      }}
    >
      <option>-- Choose --</option>
      <option>common</option>
      <option>uncommon</option>
      <option>rare</option>
      <option>mythic</option>
      <option>special</option>
      <option>bonus</option>
    </select>
  );
}
