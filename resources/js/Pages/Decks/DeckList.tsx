import Authenticated from '@/Layouts/AuthenticatedLayout';
import CreateDeckForm from './Partials/CreateDeckForm';

export default function DeckList() {
  return (
    <Authenticated>
      <div className="flex bg-base-300 px-7 py-3">
        <CreateDeckForm />
      </div>
      <h1>Deck list</h1>
    </Authenticated>
  );
}
