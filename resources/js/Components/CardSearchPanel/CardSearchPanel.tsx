import { Deferred, useForm } from '@inertiajs/react';
import { MagnifyingGlassIcon } from '@radix-ui/react-icons';
import { FormEventHandler } from 'react';
import ColorSelector from './ColorSelector';
import RaritySelector from './RaritySelector';
import SetSelector from './SetSelector';
import TermInput from './TermInput';

type BeSearch = App.Domain.Dto.BeSearch;

type FeSearch = {
  [P in keyof BeSearch]: NonNullable<BeSearch[P]>;
};

export default function CardSearch({
  disabled,
  sets,
  query,
  searchRoute,
  options,
}: {
  disabled: boolean;
  sets: App.Domain.Dto.FeSet[];
  query?: App.Domain.Dto.BeSearch;
  searchRoute: string;
  options: { only: string[] };
}) {
  const { data, setData, get } = useForm<FeSearch>({
    term: query?.term ?? '',
    colors: query?.colors ?? [],
    setId: query?.setId ?? '',
    rarity: query?.rarity ?? '',
  });

  const handleSearch: FormEventHandler = (e) => {
    e.preventDefault();

    get(searchRoute, {
      only: options.only,
    });
  };

  return (
    <form onSubmit={handleSearch}>
      <div className="card p-4 gap-4 flex flex-col bg-base-200 m-8 mx-16 md:mx-8">
        <TermInput
          value={data.term}
          onTermChange={(term) => {
            setData('term', term);
          }}
        />
        <ColorSelector
          value={data.colors}
          onColorsChange={(colors) => {
            setData('colors', colors);
          }}
        />
        <div className="flex flex-col sm:flex-row gap-4">
          <Deferred
            data="sets"
            fallback={<div className="skeleton w-60 h-10" />}
          >
            <SetSelector
              sets={sets}
              value={data.setId}
              onSelect={(set) => {
                setData('setId', set);
              }}
            />
          </Deferred>
          <RaritySelector
            value={data.rarity}
            onRarityChange={(rarity) => {
              setData('rarity', rarity);
            }}
          />
          <button type="submit" disabled={disabled} className="btn">
            Search
            <MagnifyingGlassIcon width={18} height={18} />
          </button>
        </div>
      </div>
    </form>
  );
}
