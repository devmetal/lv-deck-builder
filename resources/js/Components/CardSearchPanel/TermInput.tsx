export default function TermInput({
  onTermChange,
  value = '',
}: {
  onTermChange: (term: string) => void;
  value: string;
}) {
  //const [value, setValue] = useState(current);

  return (
    <input
      className="input w-full"
      placeholder="Keywords..."
      value={value}
      onChange={(e) => {
        const {
          currentTarget: { value },
        } = e;

        onTermChange(value);
      }}
      type="text"
    />
  );
}
