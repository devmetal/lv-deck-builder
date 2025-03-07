import CardSearchPanel from '@/Components/CardSearchPanel';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CardList from './Partials/CardList';
import Pagination from './Partials/Pagination';

export default function List({
  cards,
  sets,
  query,
  pagination,
}: {
  cards: App.Domain.Dto.FeCard[];
  sets: App.Domain.Dto.FeSet[];
  query?: App.Domain.Dto.BeSearch;
  pagination: App.Domain.Dto.FeCardPagination;
}) {
  return (
    <AuthenticatedLayout header="Cards">
      <Head title="Cards" />
      <CardSearchPanel query={query} sets={sets} disabled={false} />
      <CardList cards={cards} />
      {(pagination.prev_page_url !== null ||
        pagination.next_page_url !== null) && (
        <Pagination pagination={pagination} />
      )}
    </AuthenticatedLayout>
  );
}
