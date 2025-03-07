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
      <option value="">-- Choose --</option>
      <option value="common">common</option>
      <option value="uncommon">uncommon</option>
      <option value="rare">rare</option>
      <option value="mythic">mythic</option>
      <option value="special">special</option>
      <option value="bonus">bonus</option>
    </select>
  );
}
