import Authenticated from '@/Layouts/AuthenticatedLayout';
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
            className="w-48 h-48 rounded-md shadow-md hover:shadow-2xl p-2 transition-shadow"
            style={{
              backgroundImage: `url(${DeckBg})`,
              backgroundSize: 'cover',
            }}
            key={deck.id}
          >
            <div className="w-full p-2 bg-white/10 backdrop-blur-[3px] text-sm font-semibold rounded-md">
              {deck.name}
            </div>
          </div>
        ))}
      </div>
    </Authenticated>
  );
}
