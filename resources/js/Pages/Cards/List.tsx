import CardList from '@/Components/CardList';
import CardSearchPanel from '@/Components/CardSearchPanel';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Pagination from './Partials/Pagination';

export default function List({
  sets,
  query,
  cards,
}: {
  sets: App.Domain.Dto.FeSet[];
  query?: App.Domain.Dto.BeSearch;
  cards: App.Domain.Dto.FeCardPagination;
}) {
  return (
    <AuthenticatedLayout header="Cards">
      <Head title="Cards" />
      <CardSearchPanel
        searchRoute={route('card.list')}
        options={{ only: ['query', 'cards'] }}
        query={query}
        sets={sets}
        disabled={false}
      />
      <CardList cards={cards.data} />
      {(cards.prev_page_url !== null || cards.next_page_url !== null) && (
        <Pagination links={cards.links} />
      )}
    </AuthenticatedLayout>
  );
}
