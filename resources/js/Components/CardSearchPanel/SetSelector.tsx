type Props = {
  onSelect: (id: string) => void;
  value: string;
  sets: App.Domain.Dto.FeSet[];
};

export default function SetSelector({ onSelect, sets, value = '' }: Props) {
  return (
    <select
      className="select"
      value={value}
      onChange={(e) => {
        const {
          currentTarget: { value },
        } = e;
        onSelect(value);
      }}
    >
      <option value="">-- Choose a set --</option>
      {sets.map((set) => (
        <option key={set.id} value={set.id}>
          {set.name}
        </option>
      ))}
    </select>
  );
}
