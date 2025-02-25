import { MagnifyingGlassIcon } from '@radix-ui/react-icons';
import ColorSelector from './ColorSelector';
import RaritySelector from './RaritySelector';
import SetSelector from './SetSelector';
import TermInput from './TermInput';

export default function CardSearch({ disabled }: { disabled: boolean }) {
  const handleSearch = () => {
    console.log('search initiated');
  };

  return (
    <div className="card p-4 gap-4 flex flex-col bg-base-300 m-8 mx-16 md:mx-8">
      <TermInput current="" onTermChange={() => {}} onSearch={handleSearch} />
      <ColorSelector current="" onColorsChange={() => {}} />
      <div className="flex flex-col sm:flex-row gap-4">
        <SetSelector current="" onSelect={() => {}} onSearch={handleSearch} />
        <RaritySelector
          current=""
          onRarityChange={() => {}}
          onSearch={handleSearch}
        />
        <button disabled={disabled} onClick={handleSearch} className="btn">
          Search
          <MagnifyingGlassIcon width={18} height={18} />
        </button>
      </div>
    </div>
  );
}
