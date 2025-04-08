import Authenticated from '@/Layouts/AuthenticatedLayout';

export default function EditDeck({ deck }: { deck: App.Domain.Dto.BeDeck }) {
  return (
    <Authenticated>
      <h1>Edit deck</h1>
      <pre>{JSON.stringify(deck, null, 2)}</pre>
    </Authenticated>
  );
}
