type Props = {
  onChange: (value: string, cheked: boolean) => void;
  label: string;
  value: string;
  checked: boolean;
};

const ColorCheckbox = (props: Props) => (
  <fieldset className="fieldset">
    <label className="fieldset-label cursor-pointer">
      <input
        value={props.value}
        onChange={(e) => {
          const {
            currentTarget: { value, checked },
          } = e;
          props.onChange(value, checked);
        }}
        type="checkbox"
        className="checkbox"
        checked={props.checked ?? false}
      />
      {props.label}
    </label>
  </fieldset>
);

export default ColorCheckbox;
