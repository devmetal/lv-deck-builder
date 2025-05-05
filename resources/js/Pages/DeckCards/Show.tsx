import CardList from '@/Components/CardList';
import Pagination from '@/Components/CardList/Pagination';
import CardSearchPanel from '@/Components/CardSearchPanel';
import Authenticated from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Show({
  deck,
  query,
  sets,
  cards,
}: {
  deck: App.Domain.Dto.FeDeckCards;
  query?: App.Domain.Dto.BeSearch;
  sets: App.Domain.Dto.FeSet[];
  cards: App.Domain.Dto.FeCardPagination;
}) {
  return (
    <Authenticated>
      <Head title={deck.name} />
      <pre>{JSON.stringify(deck, null, 2)}</pre>

      <h1>Search cards to your deck</h1>
      <CardSearchPanel
        searchRoute={route('deck.cards', { id: deck.id })}
        options={{ only: ['query', 'cards'] }}
        query={query}
        sets={sets}
        disabled={false}
      />
      <CardList
        cards={cards.data}
        renderCardActions={(card) => (
          <button className="w-full btn btn-accent">Add to deck</button>
        )}
      />
      {(cards.prev_page_url !== null || cards.next_page_url !== null) && (
        <Pagination links={cards.links} />
      )}
    </Authenticated>
  );
}
