import Authenticated from '@/Layouts/AuthenticatedLayout';
import DeckViewsList from './Partials/DeckViewsList';
import EditDeckForm from './Partials/EditDeckForm';

export default function EditDeck({
  deck,
  views,
}: {
  deck: App.Domain.Dto.FeDeck;
  views: App.Domain.Dto.FeDeckView[];
}) {
  return (
    <Authenticated>
      <div className="flex flex-wrap justify-center gap-4 p-7">
        <div className="flex justify-center">
          <DeckViewsList views={views} />
        </div>
        <div className="flex justify-center">
          <EditDeckForm deck={deck} />
        </div>
      </div>
    </Authenticated>
  );
}
