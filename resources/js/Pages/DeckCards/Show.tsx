import Authenticated from '@/Layouts/AuthenticatedLayout';

export default function Show({
  deck,
  cards,
}: {
  deck: App.Domain.Dto.FeDeck;
  cards: Array<App.Domain.Dto.FeCard>;
}) {
  return (
    <Authenticated>
      <pre>{JSON.stringify(deck, null, 2)}</pre>
      <pre>{JSON.stringify(cards, null, 2)}</pre>
    </Authenticated>
  );
}
