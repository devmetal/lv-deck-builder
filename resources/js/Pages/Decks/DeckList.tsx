import Authenticated from '@/Layouts/AuthenticatedLayout';
import { Link } from '@inertiajs/react';
import CreateDeckForm from './Partials/CreateDeckForm';
import DeckBg from './Partials/DeckBg.webp';

export default function DeckList({
  decks,
}: {
  decks: App.Domain.Dto.FeDeck[];
}) {
  return (
    <Authenticated>
      <div className="flex bg-base-300 px-7 py-3">
        <CreateDeckForm />
      </div>
      <div className="p-7 flex gap-6">
        {decks.map((deck) => (
          <div
            className="w-48 h-48 rounded-md shadow-md hover:shadow-2xl transition-shadow flex flex-col justify-between"
            style={{
              backgroundImage: `url(${DeckBg})`,
              backgroundSize: 'cover',
            }}
            key={deck.id}
          >
            <div className="w-full p-2 bg-white/10 backdrop-blur-[3px] text-md font-semibold rounded-t-md">
              <Link href={route('decks.show', { id: deck.id })}>
                {deck.name}
              </Link>
            </div>
            <div className="w-full p-2 bg-white/10 backdrop-blur-[3px] text-sm rounded-b-md">
              <Link
                className="underline"
                href={route('decks.edit', { id: deck.id })}
              >
                Edit
              </Link>
            </div>
          </div>
        ))}
      </div>
    </Authenticated>
  );
}
